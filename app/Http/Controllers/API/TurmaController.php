<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;
use App\Models\Professor;
use App\Models\Instituicao;

class TurmaController extends Controller
{
    // Criar uma nova turma
    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'professorId' => 'required|integer',
            'instituicaoId' => 'required|integer',
        ]);

        // Verifica se o professor existe
        $professorExists = Professor::where('idProfessor', $request->input('professorId'))->exists();
        if (!$professorExists) {
            return response()->json(['message' => 'Professor não encontrado'], 404);
        }

        // Verifica se a instituição existe
        $instituicaoExists = Instituicao::where('idInstituicao', $request->input('instituicaoId'))->exists();
        if (!$instituicaoExists) {
            return response()->json(['message' => 'Instituição não encontrada'], 404);
        }

        $turma = Turma::create($request->all());

        return response()->json([
            'message' => 'Turma criada com sucesso',
            'turma' => $turma,
        ]);
    }
    

    // Obter detalhes de uma turma
    public function read($id)
    {
        $turma = Turma::with(['professor', 'instituicao'])->find($id);

        if (!$turma) {
            return response()->json([
                'message' => 'Turma não encontrada',
            ], 404);
        }

        return response()->json([
            'class' => $turma,
        ]);
    }

    // Atualizar informações da turma
    public function update(Request $request, $id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return response()->json([
                'message' => 'Turma não encontrada',
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:100',
            'professorId' => 'required|integer',
            'instituicaoId' => 'required|integer',
        ]);

        $turma->update($request->all());

        return response()->json([
            'message' => 'Informações da turma atualizadas com sucesso',
            'class' => $turma,
        ]);
    }

    // Excluir uma turma
    public function delete($id)
    {
        $turma = Turma::find($id);

        if (!$turma) {
            return response()->json([
                'message' => 'Turma não encontrada',
            ], 404);
        }

        $turma->delete();

        return response()->json([
            'message' => 'Turma excluída com sucesso',
        ]);
    }
}