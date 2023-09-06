<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Disciplina;
use App\Models\Instituicao;

class DisciplinaController extends Controller
{
    // Criar uma nova disciplina
    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100|unique:disciplinas',
            // 'instituicaoId' => 'required|integer',
        ]);

        // Verifica se a instituição existe
        $instituicaoExists = Instituicao::where('idInstituicao', $request->input('instituicaoId'))->exists();
        if (!$instituicaoExists) {
            return response()->json(['message' => 'Instituição não encontrada'], 404);
        }

        $disciplina = Disciplina::create($request->all());

        return response()->json([
            'message' => 'Disciplina criada com sucesso',
            'subjects' => $disciplina,
        ]);
    }


    // Obter disciplinas de uma instituição
    public function getDisciplinasByInstituicao($instituicaoId)
    {
        // Verifica se a instituição existe
        $instituicaoExists = Instituicao::where('idInstituicao', $instituicaoId)->exists();
        if (!$instituicaoExists) {
            return response()->json(['message' => 'Instituição não encontrada'], 404);
        }

        // Obter disciplinas da instituição
        $disciplinas = Disciplina::where('instituicaoId', $instituicaoId)->get();

        return response()->json([
            'subjects' => $disciplinas,
        ]);
    }


    // Obter detalhes de uma disciplina
    public function read($id)
    {
        $disciplina = Disciplina::with(['instituicao'])->find($id);

        if (!$disciplina) {
            return response()->json([
                'message' => 'Disciplina não encontrada',
            ], 404);
        }

        return response()->json([
            'disciplina' => $disciplina,
        ]);
    }

    // Atualizar informações da disciplina
    public function update(Request $request, $id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json([
                'message' => 'Disciplina não encontrada',
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string|max:100|unique:disciplinas,nome,' . $id,
            'instituicaoId' => 'required|integer',
            'pertenceInstituicao' => 'required|boolean',
        ]);

        $disciplina->update($request->all());

        return response()->json([
            'message' => 'Informações da disciplina atualizadas com sucesso',
            'disciplina' => $disciplina,
        ]);
    }

    // Excluir uma disciplina
    public function delete($id)
    {
        $disciplina = Disciplina::find($id);

        if (!$disciplina) {
            return response()->json([
                'message' => 'Disciplina não encontrada',
            ], 404);
        }

        $disciplina->delete();

        return response()->json([
            'message' => 'Disciplina excluída com sucesso',
        ]);
    }
}