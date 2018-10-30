<?php

namespace App\Backend\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\FileViewFinder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('backend.view');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = 'name111';
        return $this->render(['name' => $name],'index');
    }
}
