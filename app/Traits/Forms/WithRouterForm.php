<?php

namespace App\Traits\Forms;

use App\Models\Router;
use Filament\Forms\Components\{TextInput, Textarea};
use Filament\Forms\Form;
use Livewire\Attributes\Computed;

trait WithRouterForm
{
    public $input = [];

    public $showingForm = false;

    public $routerId;

    #[Computed]
    public function router()
    {
        return Router::find($this->routerId);
    }

    public function routerForm(Form $form)
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->validationAttribute('Name')
                    ->required()
                    ->string()
                    ->unique(Router::class, 'name', fn () => $this->router)
                    ->rules(['max:255'])
                    ->autofocus()
                    ->columnSpan(2),
                TextInput::make('model')
                    ->validationAttribute('Model')
                    ->required()
                    ->string()
                    ->rules(['max:255']),
                TextInput::make('host')
                    ->validationAttribute('Host')
                    ->required()
                    ->string()
                    ->rules(['max:255']),
                TextInput::make('username')
                    ->validationAttribute('Username')
                    ->required()
                    ->string()
                    ->rules(['max:255']),
                TextInput::make('password')
                    ->validationAttribute('Password')
                    ->required()
                    ->string()
                    ->rules(['max:255']),
                Textarea::make('remarks')
                    ->validationAttribute('Remarks')
                    ->rules(['nullable', 'string'])
                    ->columnSpan(2),
            ])->statePath('input')
            ->columns(2);
    }
}
