<?php

namespace App\Providers;

use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Builder::macro('sortQuery', function ($sort) {
            return $this->when($sort['column'] && in_array(strtolower($sort['direction']), ['ascending', 'descending']), function ($query) use ($sort) {
                return $query->orderBy($sort['column'], [
                    'ascending' => 'asc',
                    'descending' => 'desc',
                ][strtolower($sort['direction'])]);
            });
        });

        FilamentColor::register([
            'primary' => Color::Indigo,
        ]);
    }
}
