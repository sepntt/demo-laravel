<?php

/**
 * 和Modules有关
 */
if( !function_exists('__lang') ) {
	/**
	 * Module 获取多语言函数，lang文件默认存储在Modules/{moduel}/Resources/Lang/{lang}/lang.php
	 * @param  [type] $str    [字符串]
	 * @param  [type] $lang   [翻译文件]
	 * @return [type]         [description]
	 */
	function __lang($str, $lang = 'lang')
	{
		$modules = ucwords(app('config')['modules.id']);
		if($modules) {
			return __($modules . '::' . $lang . '.' . $str);
		}
		return trans($str);
	}
}

if( !function_exists('mUrl') ) {

	function mUrl($url)
	{
		$modules = strtolower(app('config')['modules.id']);
		return url($modules.'/'.$url);
	}
}

if( !function_exists('mUrlRes') ) {

	function mUrlRes($route, $id)
	{
		$modules = strtolower(app('config')['modules.id']);
		switch ($route) {
			case 'index':
				# code...
				break;
			
			default:
				# code...
				break;
		}
		return url($modules.'/'.$route);
	}
}
if( !function_exists('mUrlIndex') ) {

	function mUrlIndex()
	{
		$modules = strtolower(app('config')['modules.id']);
		return url($modules.'/index');
	}
}
if( !function_exists('mUrlShow') ) {

	function mUrlShow($id)
	{
		$modules = strtolower(app('config')['modules.id']);
		return url($modules.'/'.$id);
	}
}
if( !function_exists('mUrlEdit') ) {

	function mUrlEdit($id)
	{
		$modules = strtolower(app('config')['modules.id']);
		return url($modules.'/'.$id.'/edit');
	}
}
if( !function_exists('mUrlUpdate') ) {

	function mUrlUpdate($id)
	{
		$modules = strtolower(app('config')['modules.id']);
		return url($modules.'/'.$id.'/update');
	}
}
if( !function_exists('mUrlDestroy') ) {

	function mUrlDestroy($id)
	{
		$modules = strtolower(app('config')['modules.id']);
		return url($modules.'/'.$id.'/destroy');
	}
}