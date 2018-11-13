<?php

namespace App\Repository;

use Illuminate\Support\Facades\Storage;

class Repository
{

	public $app;
	public $Storage;

    public $singletons = [
        'App\Repository\Blogs\PostsInterface' => 'App\Repository\Blogs\PostsRepository',
        'App\Repository\Todolist\TodolistInterface' => 'App\Repository\Todolist\TodolistRepository',
        'App\Repository\Backend\UsersInterface' => 'App\Repository\Backend\UsersRepository',
    	'App\Repository\Backend\MenusInterface' => 'App\Repository\Backend\MenusRepository',
    ];


    public function __construct($app)
    {
    	$this->app = $app;
    	$this->storage = Storage::disk('repository');
    }

    public function register()
    {
    	foreach ($this->singletons as $key => $value) {
    		$this->app->singleton($key, $value);
    	}
    }
}
