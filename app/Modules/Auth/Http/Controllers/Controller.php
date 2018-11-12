<?php

namespace App\Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

class Controller extends \App\Http\Controllers\Controller
{
	use Backend;
	use Frontend;

	public $modules;

    public function __construct()
    {
    	$this->init();
    	$this->auth();
    }

    public function init()
    {
    	$this->getModules();
    }

    public function auth()
    {
    	$status = 'Backend';
    	$key = '__STATUS';
    	if(Cookie::has($key)) {
    		$status = Cookie::get($key);
    	}
    	$method = 'get'.$status;
    	if(!method_exists($this, $method)) {
    		$method = 'getBackend';
    	}
    	$this->$method();
    }

    public function setAuth($status = 'Backend')
    {
    	$key = '__STATUS';
    	Cookie::make($key, $status, 86400*30);
    	// return redirect(mUrl());
    }
    /**
     * 返回模版
     * @param  [type]  $inputs [description]
     * @param  boolean $view   [description]
     * @return [type]          [description]
     */
    public function render($inputs, $view = false)
    {
    	$controller = $this->modules->controller;
		$action = $this->modules->action;
		$module = $this->modules->module;    	
        // Backend::home.index
        $view_path = strtolower(substr($controller, 0, -10));
        $view_path = $view ? $view_path.'.'.$view : $view_path.'.'.$action;
        $view_path = $module.'::'.$view_path;
        // Backend 模版前缀
        $inputs['__module'] = function($str) use ($module) {
        	return $module.'::'.$str;
        };
        $inputs = $this->getInputs($inputs);
        return view($view_path, $inputs);
    }

    public function getInputs($inputs)
    {
    	return $inputs;
    }

    public function getModules()
    {
    	$this->modules = new \stdClass;
    	// [0 => "App\Modules\Backend\Http\Controllers\HomeController", 1 => "index"]
        $this->modules->router = explode('@', Route::currentRouteAction());
        // [0 => "App", 1 => "Modules", 2 => "Backend", 3 => "Http", 4 => "Controllers", 5 => "HomeController"]
        $this->modules->namespace = explode('\\', $this->modules->router[0]);
        // Backend
        $this->modules->module = $this->modules->namespace[2];
        // HomeController
        $this->modules->controller = end($this->modules->namespace);
        // index
        $this->modules->action = $this->modules->router[1];
        return $this->modules;
    }
}
