<?php

namespace App\Modules\Auth\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

trait Auth
{
	/**
	 * 加载对应模块auth
	 * @return [type] [description]
	 */
    public function _auth()
    {
        $this->_getMiddleware();
    	// $status = $this->_getStatus();;
    	// $key = '__STATUS';
    	// if(Cookie::has($key)) {
    	// 	$status = Cookie::get($key);
    	// }
    	// $this->_authMethod();
    }
    
    // /**
    //  * 设置auth到cooike
    //  * @param string $status [description]
    //  */
    // public function _setAuth()
    // {
    // 	$key = '__STATUS';
    // 	Cookie::make($key, $status, 86400*30);
    // }

}
