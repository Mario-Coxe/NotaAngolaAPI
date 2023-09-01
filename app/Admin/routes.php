<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\InstituicaoControllerAdmin;
use App\Admin\Controllers\EncarregadosControllerAdmin;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('instituicaos', InstituicaoControllerAdmin::class);
    $router->resource('encarregados', EncarregadosControllerAdmin::class);

});
