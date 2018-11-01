<?php

namespace App\Modules\Backend\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = 'name';
        return $this->render(['name' => $name],'index');
    }
}
