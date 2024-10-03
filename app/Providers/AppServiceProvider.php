<?php

namespace App\Providers;

use larvel\Fortify\Contracts\RegisterViewResponse;
use App\Http\Controllers\Auth\RegisterViewResponse as RegisterViewResponseController;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(RegisterViewResponse::class, RegisterViewResponseController::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
