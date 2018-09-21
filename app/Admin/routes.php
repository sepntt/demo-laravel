<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('blog/blog', 'BlogController');
    $router->resource('blog/blog_messages_notice', 'BlogMessagesNoticeController');


    $router->post('blog/upload', 'BlogController@upload');
    $router->resource('todolist', 'TodolistController');

});
