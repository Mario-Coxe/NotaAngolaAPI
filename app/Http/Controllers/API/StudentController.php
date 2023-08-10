<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Encarregado;
use App\Models\Instituicao;

class StudentController extends Controller
{


    //Obter todos os estudantes de uma determinada escola

    public function getAllStudentsInstitution(Request $request, $id)
    {
        // Verificar se a instituição com o ID fornecido existe
        $instituicao = Instituicao::find($id);

        if (!$instituicao) {
            // Retornar uma resposta JSON com uma mensagem de erro
            return response()->json(['message' => 'Instituição não encontrada']);
        }

        // Verificar se há estudantes associados à instituição
        $student = $instituicao->student;

        if ($student->isEmpty()) {
            // Retornar uma resposta JSON com uma mensagem de aviso
            return response()->json(['message' => 'Nenhum estudante encontrado para esta instituição']);
        }

        // Retornar os estudantes como uma resposta JSON
        return response()->json(['estudantes' => $student]);
    }


    //obtem todos os estudantes
    public function getAllStudents()
    {
        $students = Student::all();
        return response()->json([
            'status' => 200,
            'students' => $students,
        ]);
    }

    //cria estudantes

    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'dataNascimento' => 'required|date',
            'genero' => 'required|in:Masculino,Femenino',
            'BI' => 'required|string|max:50',
            'morada' => 'string',
            'idInstituicao' => 'required|integer',
            'idEncarregado' => 'required|integer',
        ]);

        // Verificar se o encarregado existe na tabela 'encarregados'
        $encarregadoExists = Encarregado::where('idEncarregado', $request->input('idEncarregado'))->exists();

        if (!$encarregadoExists) {
            return response()->json([
                'status' => 400,
                'message' => 'O encarregado não existe',
            ], 400);
        }

        // Verificar se o instituição existe na tabela 'instituicoes'
        $instituicaoExists = Instituicao::where('idInstituicao', $request->input('idInstituicao'))->exists();

        if (!$instituicaoExists) {
            return response()->json([
                'status' => 400,
                'message' => 'A Instituição não existe',
            ], 400);
        }

        // Verificar se o estudante já existe com o mesmo BI
        $studentExists = Student::where('BI', $request->input('BI'))->exists();

        if ($studentExists) {
            return response()->json([
                'status' => 400,
                'message' => 'O estudante com este BI já existe',
            ], 400);
        }

        $student = new Student;
        $student->nome = $request->input('nome');
        $student->email = $request->input('email');
        $student->dataNascimento = $request->input('dataNascimento');
        $student->genero = $request->input('genero');
        $student->BI = $request->input('BI');
        $student->morada = $request->input('morada');
        $student->idInstituicao = $request->input('idInstituicao');
        $student->idTurma = $request->input('idTurma');
        $student->idEncarregado = $request->input('idEncarregado');
        $student->save();

        return response()->json([
            'status' => 200,
            'message' => 'Aluno adicionado com sucesso',
            'student' => $student,
        ]);
    }

    //Ver os dados de um determinado aluno

    public function read($id)
    {
        $student = Student::find($id);
        return response()->json([
            'status' => 200,
            'student' => $student,
        ]);
    }

    //Actualizar student

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
        $student->idEncarregado = $request->input('idEncarregado');
        $student->save();

        // Recarrega os dados atualizados do estudante após salvar
        $updatedStudent = Student::find($id);

        return response()->json([
            'status' => 200,
            'message' => 'Estudante modificado com sucesso',
            'student' => $updatedStudent,
        ]);
    }


    //DEletar encarregado

    public function delete($id)
    {
        $student = Student::find($id);
        $student->delete();

        return response()->json([
            'status' => 200,
            'message' => 'student Deleted succefully',
        ]);
    }


    //Obter Encarregado de cada estudante
    public function getStudentIncharge($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => 404,
                'message' => 'Estudante não encontrado',
            ], 404);
        }

        // Carregar o relacionamento 'incharge' com todos os atributos do encarregado
        $student->load('incharge');

        $incharge = $student->incharge;

        if (!$incharge) {
            return response()->json([
                'status' => 404,
                'message' => 'Encarregado não encontrado para este estudante',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'encarregado' => $incharge,
        ]);
    }
}