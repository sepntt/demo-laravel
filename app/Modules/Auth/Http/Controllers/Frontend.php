<?php

namespace App\Modules\Auth\Http\Controllers;

trait Frontend
{
	public function _getLayouts($layouts = false)
	{
		$trait = explode('\\', __TRAIT__);

		return $layouts ? $layouts : end($trait);
	}
	
    public function _getMiddleware()
    {
    	
    }
}
