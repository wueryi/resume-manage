<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource("skill", "SkillController");
    $router->resource('experience', 'ExperienceController');
    $router->resource('evaluate', 'EvaluateController');
    $router->resource('work', 'WorkController');
    $router->resource('info', 'InfoController');
});
