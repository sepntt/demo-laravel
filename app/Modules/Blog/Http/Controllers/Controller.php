<?php

namespace App\Modules\Blog\Http\Controllers;

use Illuminate\Http\Request;

class Controller extends \App\Modules\Auth\Http\Controllers\Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->setAuth($this->modules->module);
    }
}
