<?php

use App\Http\Controllers\{TicketController, TicketTemplateController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('routers', \App\Livewire\Routers\Index::class)->name('routers.index');

    Route::group([
        'as' => 'router-configs.',
        'prefix' => 'router-configurations',
    ], function () {
        Route::get('', \App\Livewire\RouterConfigs\Index::class)->name('index');
        Route::get('create', \App\Livewire\RouterConfigs\Create::class)->name('create');
        Route::get('{routerConfig}', \App\Livewire\RouterConfigs\Update::class)->name('update');
    });

    Route::group([
        'as' => 'device-groups.',
        'prefix' => 'users',
    ], function () {
        Route::get('create', \App\Livewire\DeviceUserGroups\Create::class)->name('create');
    });

    Route::get('ticket-templates', [TicketTemplateController::class, 'index'])->name('ticket-template.index');

    Route::group([
        'as' => 'ticket.',
        'prefix' => 'tickets',
        'controller' => TicketController::class,
    ], function () {
        Route::get('', ['as' => 'index', 'uses' => 'index']);
        Route::get('{ticket}', ['as' => 'show', 'uses' => 'show']);
    });
});
