<?php

namespace App\Backend\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Module Id
     * @var string
     */
    public $id;

    /**
     * namespace
     * @var [type]
     */
    public $namespace;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->_init();

    }
    /**
     * init register
     * @return [type] [description]
     */
    public function _init()
    {
        $this->registerConfig();
        $this->registerView();
    }
    /**
     * Get Module Namespace
     * @return [type] [description]
     */
    public function getModuleNamespace()
    {
        $root = '\App\\@id\\';
        $this->namespace = str_replace('@id', $this->id, $root);
        return $this->namespace;
    }
    /**
     * Get ServiceProvider
     * @param  string $class Providers Class Name
     * @return [type]        [description]
     */
    public function getServiceProvider($class = 'ConfigServiceProvider')
    {
        return $this->getModuleNamespace().'Providers\\'.$class;
    }
    /**
     * Register Config ServiceProvider
     * @return [type] [description]
     */
    public function registerConfig()
    {
        $this->app->register(ConfigServiceProvider::class);
        $this->id = 'Backend';$this->app['config']['module.id'];
    }
    /**
     * Register View ServiceProvider
     * @return [type] [description]
     */
    public function registerView()
    {
        $this->app->register($this->getServiceProvider('ViewServiceProvider'));
    }


}
