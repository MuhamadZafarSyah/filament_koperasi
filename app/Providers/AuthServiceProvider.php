<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Filament\Facades\Filament;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            if (auth()->check() && auth()->user()->role == 'user') {
                abort(403);
            }
        });

        $this->registerPolicies();

        //
    }
}
