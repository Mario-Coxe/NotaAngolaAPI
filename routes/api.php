<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\InstituicaoController;
use App\Http\Controllers\API\EncarregadosController;
use App\Http\Controllers\API\ProfessoresController;
use App\Http\Controllers\API\TurmaController;

//Studantes
Route::get('/studentInstitution/{instituicaoId}', [StudentController::class, 'getAllStudentsInstitution']); //estudantes de uma determinada  instituicao


Route::get('/studentIncharge/{studentId}', [StudentController::class, 'getStudentIncharge']); //encarregado do student
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
Route::post('/createIncharge', [EncarregadosController::class, 'create']);
Route::get('/readIncharge/{id}', [EncarregadosController::class, 'read']);
Route::put('/updateIncharge/{id}', [EncarregadosController::class, 'update']);
Route::delete('/deleteIncharge/{id}', [EncarregadosController::class, 'delete']);



//ADM
Route::get('/getAllInstitution', [InstituicaoController::class, 'getAllInstitution']);
Route::get('/getAllStudents', [StudentController::class, 'getAllStudents']);
Route::get('/getAllTeachers', [InstituicaoController::class, 'getAllTeachers']);
Route::get('/getAllIncharge', [EncarregadosController::class, 'getAllIncharge']);



//Teacher
Route::post('/createTeacher', [ProfessoresController::class, 'create']);
Route::get('/readTeacher/{id}', [ProfessoresController::class, 'read']);
Route::put('/updateTeacher/{id}', [ProfessoresController::class, 'update']);
Route::delete('/deleteTeacher/{id}', [ProfessoresController::class, 'delete']);
Route::post('/teacherInstitution/{professorId}', [ProfessoresController::class, 'teacherInstitution']); //Adicioner o professor em uma Instituição

//Turma
Route::get('/getStudentClass/{turmaId}', [StudentController::class, 'getStudentClass']);//traz todos os alunos de uma determinada turma
Route::post('/createClass', [TurmaController::class, 'create']);
Route::get('/createClass/{id}', [TurmaController::class, 'read']);
Route::put('/updateClass/{id}', [TurmaController::class, 'update']);
Route::delete('/deleteClass/{id}', [TurmaController::class, 'delete']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});