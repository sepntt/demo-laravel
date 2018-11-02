<?php

namespace App\Modules\Backend\Providers;

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
        $this->loadConfigsFrom(__DIR__.'/../config');
        // dd(app('config')['modules.id']);
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', app('config')['modules.id']);
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', app('config')['modules.id']);
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', app('config')['modules.id']);
        $this->loadFactoriesFrom(__DIR__.'/../Database/Factories');
        require base_path('app/Helpers/helpers.php');
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
