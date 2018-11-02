<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class Controller extends \App\Http\Controllers\Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * 返回模版
     * @param  [type]  $params [description]
     * @param  boolean $view   [description]
     * @return [type]          [description]
     */
    public function render($params, $view = false)
    {
    	// [0 => "App\Modules\Backend\Http\Controllers\HomeController", 1 => "index"]
        $router = explode('@', Route::currentRouteAction());
        // [0 => "App", 1 => "Modules", 2 => "Backend", 3 => "Http", 4 => "Controllers", 5 => "HomeController"]
        $namespace = explode('\\', $router[0]);
        // Backend
        $module = $namespace[2];
        // HomeController
        $controller = end($namespace);
        // index
        $action = $router[1];
        // Backend::home.index
        $view_path = strtolower(substr($controller, 0, -10));
        $view_path = $view ? $view_path.'.'.$view : $view_path.'.'.$action;
        $view_path = $module.'::'.$view_path;
        // Backend 模版前缀
        $params['__module'] = function($str) use ($module) {
        	return $module.'::'.$str;
        };
        return view($view_path, $params);
    }
}
