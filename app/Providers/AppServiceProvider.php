<?php

namespace App\Providers;

use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationGroup;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                    ->label('Product')
                    ->icon('heroicon-s-shopping-cart'),
                NavigationGroup::make()
                    ->label('News')
                    ->icon('heroicon-s-pencil'),

            ]);
        });
    }
}
