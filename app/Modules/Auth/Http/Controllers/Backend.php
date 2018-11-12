<?php

namespace App\Modules\Auth\Http\Controllers;

use Illuminate\Http\Request;

trait Backend
{
    public function getBackend()
    {
    	$this->getMiddleware();
    	
    }

    public function getMiddleware()
    {
    	$this->middleware('auth');
    }
}
