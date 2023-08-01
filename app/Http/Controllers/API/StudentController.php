<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function getAllStudents(){
        $students= Student::all();
        return response()->json([
            'status'=> 200,
            'students'=>$students,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'dataNascimento' => 'required|date',
            'genero' => 'required|in:Masculino,Femenino',
            'BI' => 'required|string|max:50',
            'morada' => 'string',
            'idInstituicao' => 'required|integer', // Certifique-se de que 'idInstituicao' é um número inteiro
            'encarregado' => 'integer|nullable', // Certifique-se de que 'encarregado' é um número inteiro ou nulo
        ]);
    
        $student = new Student;
        $student->nome = $request->input('nome');
        $student->email = $request->input('email');
        $student->dataNascimento = $request->input('dataNascimento');
        $student->genero = $request->input('genero');
        $student->BI = $request->input('BI');
        $student->morada = $request->input('morada');
        $student->idInstituicao = $request->input('idInstituicao');
        $student->idTurma = $request->input('idTurma');
        $student->encarregado = $request->input('encarregado');
        $student->save();
    
        return response()->json([
            'status' => 200,
            'message' => 'Aluno adicionado com sucesso',
            'student' => $student,
        ]);
    }

    public function read($id){
        $student= Student::find($id);
        return response()->json([
            'status'=> 200,
            'student'=>$student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        
        if (!$student) {
            return response()->json([
                'status' => 404,
                'message' => 'Estudante não encontrado',
            ], 404);
        }
        
        $student->nome = $request->input('nome');
        $student->email = $request->input('email');
        $student->dataNascimento = $request->input('dataNascimento');
        $student->genero = $request->input('genero');
        $student->BI = $request->input('BI');
        $student->morada = $request->input('morada');
        $student->idInstituicao = $request->input('idInstituicao');
        $student->idTurma = $request->input('idTurma');
        $student->encarregado = $request->input('encarregado');
        $student->save();
    
        return response()->json([
            'status' => 200,
            'message' => 'Estudante modificado com sucesso',
        ]);
    }
    

    public function delete($id){
        $student= Student::find($id);
        $student->delete();

        return response()->json([
            'status'=> 200,
            'message'=>'student Deleted succefully',
        ]);
    }
}

