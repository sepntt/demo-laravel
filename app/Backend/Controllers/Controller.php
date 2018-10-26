<?php

namespace App\Backend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Illuminate\View\FileViewFinder;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('backend.view');
    }

    /**
     * 返回模版
     * @param  [type]  $params [description]
     * @param  boolean $view   [description]
     * @return [type]          [description]
     */
    public function render($params, $view = false)
    {
        $router = explode('@', Route::currentRouteAction());
        $namespace = explode('\\', $router[0]);
        $controller = end($namespace);
        $action = $router[1];
        $view_path = strtolower(substr($controller, 0, -10));
        $view_path = $view ? $view_path.'.'.$view : $view_path.'.'.$action;
        // if(!view()->exists($view_path)) {
            
        // }
        return view($view_path, $params);
    }
}
