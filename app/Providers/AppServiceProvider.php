<?php

namespace App\Providers;

use App\Http\Responses\LoginResponse;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(LoginResponseContract::class, LoginResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Super-admin & is_admin bypass all permission checks
        Gate::before(function ($user, $ability) {
            if ($user->is_admin || (method_exists($user, 'hasRole') && $user->hasRole('super-admin'))) {
                return true;
            }
        });
    }
}
