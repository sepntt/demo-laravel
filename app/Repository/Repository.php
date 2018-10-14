<?php

namespace App\Repository;

use Illuminate\Support\Facades\Storage;

class Repository
{

	public $app;
	public $Storage;

    public $singletons = [
        'App\Repository\Blog\PostsInterface' => 'App\Repository\Blog\PostsRepository',
    	'App\Repository\Todolist\TodolistInterface' => 'App\Repository\Todolist\TodolistRepository',
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
