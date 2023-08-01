<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\InstituicaoController;
use App\Http\Controllers\API\EncarregadosController;

//Studantes
Route::get('/getAllStudents', [StudentController::class, 'getAllStudents']);
Route::post('/createStudent', [StudentController::class, 'create']);
Route::get('/readStudent/{id}', [StudentController::class, 'read']);
Route::put('/updateStudent/{id}', [StudentController::class, 'update']);
Route::delete('/deleteStudent/{id}', [StudentController::class, 'delete']);

//Instituicaoes
Route::get('/getAllInstitution', [InstituicaoController::class, 'getAllInstitution']);
Route::post('/createInstitution', [InstituicaoController::class, 'create']);
Route::get('/readInstitution/{id}', [InstituicaoController::class, 'read']);
Route::put('/updateInstitution/{id}', [InstituicaoController::class, 'update']);
Route::delete('/deleteInstitution/{id}', [InstituicaoController::class, 'delete']);

//Encarregados
Route::get('/getAllIncharge', [EncarregadosController::class, 'getAllIncharge']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
