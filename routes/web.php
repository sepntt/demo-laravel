<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/','/blog');

Auth::routes();

// Registration Routes...//关闭注册
Route::get('register', function () {
	return redirect('home');
})->name('register');
Route::post('register', function () {
	return redirect('home');
});
Route::get('password/reset', function () {
	return redirect('home');
})->name('password.request');
Route::post('password/email', function () {
	return redirect('home');
})->name('password.email');
Route::get('password/reset/{token}', function () {
	return redirect('home');
})->name('password.reset');
Route::post('password/reset', function () {
	return redirect('home');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/home', '/blog');


Route::group(['prefix'=>'blog'], function () {
	Route::get('/','BlogController@index');
	Route::get('/show/{id}','BlogController@show');
});

Route::group(['prefix'=>'todolist'], function () {
	Route::get('/','TodolistController@index');
});