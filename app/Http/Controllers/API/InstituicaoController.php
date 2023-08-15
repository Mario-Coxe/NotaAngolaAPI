<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instituicao;
use App\Models\Encarregado;
use App\Models\Student;
use App\Models\Professor;

class InstituicaoController extends Controller
{

    // Obter todos as escolas
    public function getAllInstitution()
    {
        $instituicao = Instituicao::all();
        return response()->json([
            'status' => 200,
            'instituicao' => $instituicao,
        ]);
    }


    // Obter todos os professores
    public function getAllTeachers()
    {
        $professores = Professor::all();
        return response()->json([
            'status' => 200,
            'professores' => $professores,
        ]);
    }


    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'localizacao' => 'nullable|string|max:100',
            'status' => 'required|string',
            'idEncarregado' => 'integer|nullable',
        ]);

        // Verificar se o encarregado existe na tabela 'encarregados'
        $encarregadoExists = Encarregado::where('idEncarregado', $request->input('idEncarregado'))->exists();

        if (!$encarregadoExists) {
            return response()->json([
                'status' => 400,
                'message' => 'O encarregado não existe',
            ], 400);
        }

        // Verificar se a instituição com o mesmo nome já existe
        $nomeInstituicao = $request->input('nome');
        $instituicaoExists = Instituicao::where('nome', $nomeInstituicao)->exists();

        if ($instituicaoExists) {
            return response()->json([
                'status' => 409,
                'message' => 'Uma instituição com o mesmo nome já existe',
            ], 409);
        }


        // Verificar se a instituição com o mesma LOcalizacao já existe
        $localizacao = $request->input('localizacao');
        $localizacaoExists = Instituicao::where('localizacao', $localizacao)->exists();

        if ($localizacaoExists) {
            return response()->json([
                'status' => 409,
                'message' => 'Uma instituição com o mesma localizacao já existe',
            ], 409);
        }


        /*  
         // Verificar se o email da instituição já está cadastrado
         
        $emailInstituicao = $request->input('email');
         $emailExists = Instituicao::where('email', $emailInstituicao)->exists();

         if ($emailExists) {
             return response()->json([
                 'status' => 409,
                 'message' => 'O email da instituição já está cadastrado',
             ], 409);
         }
         */

        $instituicao = new Instituicao;
        $instituicao->nome = $request->input('nome');
        $instituicao->localizacao = $request->input('localizacao');
        $instituicao->telefone = $request->input('telefone');
        $instituicao->email = $request->input('email');
        $instituicao->idEncarregado = $request->input('idEncarregado');
        $instituicao->status = $request->input('status');
        $instituicao->save();

        return response()->json([
            'status' => 200,
            'message' => 'Instituição adicionada com sucesso',
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