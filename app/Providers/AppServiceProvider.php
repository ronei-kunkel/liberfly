<?php

namespace App\Providers;

use App\Core\Application\Service\Auth\AuthServiceInterface;
use App\Core\Infra\Auth\TymonJwtAuth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthServiceInterface::class, TymonJwtAuth::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
