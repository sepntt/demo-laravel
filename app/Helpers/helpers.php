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
		$modules = app('config')['modules.id'];
		if($modules) {
			return __(ucwords($modules) . '::' . $lang . '.' . $str);
		}
		return trans($str);
	}
}
