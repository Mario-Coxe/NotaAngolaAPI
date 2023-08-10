<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\InstituicaoController;
use App\Http\Controllers\API\EncarregadosController;
use App\Http\Controllers\API\ProfessoresController;

//Studantes
Route::get('/studentInstitution/{id}', [StudentController::class, 'getAllStudentsInstitution']);


Route::get('/studentIncharge/{id}', [StudentController::class, 'getStudentIncharge']);
Route::post('/createStudent', [StudentController::class, 'create']);
Route::get('/readStudent/{id}', [StudentController::class, 'read']);
Route::put('/updateStudent/{id}', [StudentController::class, 'update']);
Route::delete('/deleteStudent/{id}', [StudentController::class, 'delete']);

//Instituicaoes
Route::post('/createInstitution', [InstituicaoController::class, 'create']);
Route::get('/readInstitution/{id}', [InstituicaoController::class, 'read']);
Route::put('/updateInstitution/{id}', [InstituicaoController::class, 'update']);
Route::delete('/deleteInstitution/{id}', [InstituicaoController::class, 'delete']);

//Encarregados
Route::get('/getAllIncharge', [EncarregadosController::class, 'getAllIncharge']);
Route::post('/createIncharge', [EncarregadosController::class, 'create']);



//ADM
Route::get('/getAllInstitution', [InstituicaoController::class, 'getAllInstitution']);
Route::get('/getAllStudents', [StudentController::class, 'getAllStudents']);
Route::get('/getAllTeachers', [InstituicaoController::class, 'getAllTeachers']);



//Teacher
Route::post('/createTeacher', [ProfessoresController::class, 'create']);
Route::get('/readTeacher/{id}', [ProfessoresController::class, 'read']);
Route::put('/updateTeacher/{id}', [ProfessoresController::class, 'update']);
Route::delete('/deleteTeacher/{id}', [ProfessoresController::class, 'delete']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});