<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('manager-production', function (User $user) {
            return Auth::user()->role == 'Manager Production';
        });

        Gate::define('operator', function (User $user) {
            return Auth::user()->role == 'Operator';
        });

        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }
}
