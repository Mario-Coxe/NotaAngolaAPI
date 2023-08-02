<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use App\Models\Student;

class InstituicaoController extends Controller
{

    public function getAllStudentsInstitution(Request $request, $id)
    {
        // Verificar se a instituição com o ID fornecido existe
        $instituicao = Instituicao::findOrFail($id);

        // Recuperar todos os alunos da instituição através do relacionamento definido no model
        $student = $instituicao->student;

        // Retornar os alunos como uma resposta JSON
        return response()->json(
            [
                'estudante' => $student
            ]
        );
    }

    public function getAllInstitution()
    {
        $instituicao = Instituicao::all();
        return response()->json([
            'status' => 200,
            'instituicao' => $instituicao,
        ]);
    }


    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'localizacao' => 'nullable|string|max:100',
            'status' => 'required|string',
            'encarregado' => 'integer|nullable', // Certifique-se de que 'encarregado' é um número inteiro ou nulo
        ]);

        $instituicao = new Instituicao;
        $instituicao->nome = $request->input('nome');
        $instituicao->localizacao = $request->input('localizacao');
        $instituicao->telefone = $request->input('telefone');
        $instituicao->email = $request->input('email');
        $instituicao->encarregado = $request->input('encarregado');
        $instituicao->status = $request->input('status');
        $instituicao->save();

        return response()->json([
            'status' => 200,
            'message' => 'Instituicao adicionado com sucesso',
            'Instituicao' => $instituicao,
        ]);
    }

    public function read($id)
    {
        $instituicao = Instituicao::find($id);
        return response()->json([
            'status' => 200,
            'instituicao' => $instituicao,
        ]);
    }

    public function update(Request $request, $id)
    {
        $instituicao = Instituicao::find($id);

        if (!$instituicao) {
            return response()->json([
                'status' => 404,
                'message' => 'Estudante não encontrado',
            ], 404);
        }

        $instituicao->nome = $request->input('nome');
        $instituicao->localizacao = $request->input('localizacao');
        $instituicao->telefone = $request->input('telefone');
        $instituicao->email = $request->input('email');
        $instituicao->encaregado = $request->input('encaregado');
        $instituicao->status = $request->input('status');
        $instituicao->save();


        return response()->json([
            'status' => 200,
            'message' => 'Instituicao modificado com sucesso',
        ]);
    }


    public function delete($id)
    {
        $instituicao = Instituicao::find($id);
        $instituicao->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Instituicao Deleted succefully',
        ]);
    }
}