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
        //Backend
        // $this->mapBackendRoutes();
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

    protected function mapBackendRoutes()
    {
        $this->mapModuleRoutes($this->getInit('Backend'));
    }
    /**
     * 获取module配置
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    protected function getInit($id)
    {
        // 配置view的目录 模版中间件使用
        config(['modules.views.path' => 'views/'.strtolower($id)]); 

        return [
            // 模版中间件，修改模版目录
            'middleware_view' => 'App\\'.ucwords($id).'\\'.'Middleware\View::class',
            // 控制器命名空间
            'controllers' => 'App\\'.ucwords($id).'\\'.'Controllers',
            // 路由前缀
            'router_prefix' => strtolower($id),
            // 路由配置文件
            'router' => base_path('app/'.ucwords($id).'/'.strtolower($id).'.php'),
        ];
    }
    /**
     * 配置module路由
     * @param  [type] $init [description]
     * @return [type]     [description]
     */
    protected function mapModuleRoutes($init)
    {
        Route::prefix($init['router_prefix'])
             ->middleware($init['middleware_view'])
             ->namespace($init['controllers'])
             ->group($init['router']);
        return ;
    }

}
