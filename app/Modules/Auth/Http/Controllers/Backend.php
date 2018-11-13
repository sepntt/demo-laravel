<?php

namespace App\Modules\Auth\Http\Controllers;

trait Backend
{

	public function _getLayouts($layouts = false)
	{
		$trait = explode('\\', __TRAIT__);

		return end($trait);
	}
	
    public function _getMiddleware()
    {
    	$this->middleware('auth');
    }
}
