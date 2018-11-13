<?php

namespace App\Modules\Auth\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'Auth');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'Auth');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'Auth');
        $this->loadConfigsFrom(__DIR__.'/../config');
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
