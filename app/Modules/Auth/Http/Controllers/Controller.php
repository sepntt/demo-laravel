<?php

namespace App\Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class Controller extends \App\Http\Controllers\Controller
{
	use Auth;
	use View;

	private $modules;

    public function __construct()
    {
    	$this->_init();
    	$this->_auth();
    }

    private function _init()
    {
    	$this->_getModules();
    }
    
    /**
     * 设置模块基本信息
     * @return [type] [description]
     */
    private function _getModules()
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
        $this->modules->layouts = $this->_getLayouts(!is_null($this->layouts) ? $this->layouts : $this->modules->module);
        return $this->modules;
    }
}
