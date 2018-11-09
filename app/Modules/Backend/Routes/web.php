<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'backend'], function () {
    Route::get('/', function () {
    	return redirect('backend/home');
    	// return view('Backend::home.index');
        dd('This is the Backend module index page. Build something great!');
    });

    Route::resource('users','UsersController');

    Route::get('/auth/users', 'UsersController@index');//Route::get('/user/index', 'UserController@index');

});