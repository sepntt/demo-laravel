<?php

namespace App\Backend\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Http\Kernel;

class ViewServiceProvider extends ServiceProvider
{
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
        //注册中间件
        $Kernel = app('Illuminate\Contracts\Http\Kernel');
        $Kernel->pushMiddleware('App\Backend\Middleware\View::class');
        $this->mapBackendRoutes();
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
             // ->middleware($init['middleware_view'])
             ->namespace($init['controllers'])
             ->group($init['router']);
        return ;
    }
}
