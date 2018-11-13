<?php

namespace App\Modules\Blogs\Providers;

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
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'Blogs');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'Blogs');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'Blogs');
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
