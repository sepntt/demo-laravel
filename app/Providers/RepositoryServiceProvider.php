<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\Repository;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        // (new Repository($this->app))->boot();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        (new Repository($this->app))->register();
    }
}
