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
 * php artisan make:module backend
 * php artisan make:module:controller backend HomeController\n
 * 修改routes->web.php->prefix->backend
*/

Route::group(['prefix' => 'backend'], function () {

    Route::get('/', 'HomeController@index');

    Route::resource('users','UsersController');
});

Route::get('/auth/users', 'UsersController@index');//Route::get('/user/index', 'UserController@index');
