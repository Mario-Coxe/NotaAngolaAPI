<?php

use Illuminate\Routing\Router;
use App\Admin\Controllers\InstituicaoControllerAdmin;
use App\Admin\Controllers\EncarregadosControllerAdmin;
use App\Admin\Controllers\ProfessorControllerAdmin;
use App\Admin\Controllers\DisciplinaControllerAdmin;
use App\Admin\Controllers\StudentControllerAdmin;
use App\Admin\Controllers\TurmaControllerAdmin;
use App\Admin\Controllers\NotaControllerAdmin;

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
    $router->resource('professors', ProfessorControllerAdmin::class);
    $router->resource('disciplinas', DisciplinaControllerAdmin::class);
    $router->resource('students', StudentControllerAdmin::class);
    $router->resource('turmas', TurmaControllerAdmin::class);
    $router->resource('notas', NotaControllerAdmin::class);

});
