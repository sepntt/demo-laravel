<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //Backend
        // $this->mapBackendRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
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
            'router' => base_path('routes/'.strtolower($id).'.php'),
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
