<?php

namespace App\Modules\Auth\Http\Controllers;

trait View
{
	public $layouts;

    /**
     * 获取layouts
     * @param  boolean $layouts [description]
     * @return [type]           [description]
     */
    public function _getLayouts($layouts = false)
	{
		return $layouts;
	}
    /**
     * 返回模版
     * @param  [type]  $inputs [description]
     * @param  boolean $view   [description]
     * @return [type]          [description]
     */
    public function render($inputs = [], $view = false)
    {
    	$controller = $this->modules->controller;
		$action = $this->modules->action;
		$module = $this->modules->module;    	
        // Backend::home.index
        $view_path = strtolower(substr($controller, 0, -10));
        $view_path = $view ? $view_path.'.'.$view : $view_path.'.'.$action;
        $view_path = $module.'::'.$view_path;
        // helpers匿名函数
        // 模块的 模版前缀
        $inputs['__module'] = function($str) use ($module) {
        	return $module.'::'.$str;
        };
        // 模块的layouts
        $layouts = $this->modules->layouts;
        $inputs['__layouts'] = function($str) use ($layouts) {
        	return $layouts.'::'.$str;
        };
        $inputs['__lang'] = function($str, $lang = 'lang') use ($module) {
            return __(ucwords($module) . '::' . $lang . '.' . $str);
        };
        $inputs['__url'] = function($url = '') use ($module) {
            return url(strtolower($module).'/'.$url);
        };
        //参数
        $inputs = $this->_getInputs($inputs);
        return view($view_path, $inputs);
    }
    /**
     * 获取模版自定义参数
     * @param  [type] $inputs [description]
     * @return [type]         [description]
     */
    public function _getInputs($inputs)
    {
    	return $inputs;
    }
}
