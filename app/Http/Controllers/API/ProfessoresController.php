<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;
use App\Models\Instituicao;

class ProfessoresController extends Controller
{

    //Adicionar o professor em uma INSTITUICAO
    public function teacherInstitution(Request $request, $professorId)
    {
        $teacher = Professor::find($professorId);

        if (!$teacher) {
            return response()->json(['error' => 'Professor não encontrado'], 404);
        }

        $instituicaoId = $request->input('instituicao_id');
        $institution = Instituicao::find($instituicaoId);

        if (!$institution) {
            return response()->json(['error' => 'Instituição não encontrada'], 404);
        }

        // Verificar se o professor já está vinculado à instituição
        if ($teacher->instituicoes->contains($instituicaoId)) {
            return response()->json(['error' => 'Professor já está vinculado a esta instituição'], 400);
        }

        // Vincular o professor à instituição usando a tabela pivot 'professor_instituicao'
        $teacher->instituicoes()->attach($instituicaoId);

        return response()->json([
            'message' => 'Instituição adicionada ao professor com sucesso',
            'teacherName' => $teacher->nome,
            'instituicionName' => $institution->nome,
        ]);
    }




    // Criar professor
    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:professores,email',
            'senha' => 'required|string',
        ]);

        $teacher = new Professor;
        $teacher->nome = $request->input('nome');
        $teacher->telefone = $request->input('telefone');
        $teacher->email = $request->input('email');
        $teacher->senha = bcrypt($request->input('senha'));
        $teacher->save();

        return response()->json([
            'status' => 200,
            'message' => 'Professor adicionado com sucesso',
            'teacher' => $teacher,
        ]);
    }

    // Ver dados de um professor
    public function read($id)
    {
        $teacher = Professor::find($id);

        if (!$teacher) {
            return response()->json([
                'status' => 404,
                'message' => 'Professor não encontrado',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'teacher' => $teacher,
        ]);
    }

    // Atualizar professor
    public function update(Request $request, $id)
    {
        $teacher = Professor::find($id);

        if (!$teacher) {
            return response()->json([
                'status' => 404,
                'message' => 'Professor não encontrado',
            ], 404);
        }

        $request->validate([
            'nome' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:professores,email,' . $id,
            'senha' => 'required|string',
        ]);

        $teacher->nome = $request->input('nome');
        $teacher->telefone = $request->input('telefone');
        $teacher->email = $request->input('email');
        $teacher->senha = bcrypt($request->input('senha'));
        $teacher->save();

        // Recarrega os dados atualizados do professor após salvar
        $updatedTeacher = Professor::find($id);

        return response()->json([
            'status' => 200,
            'message' => 'Professor modificado com sucesso',
            'teacher' => $updatedTeacher,
        ]);
    }

    // Deletar professor
    public function delete($id)
    {
        $professor = Professor::find($id);

        if (!$professor) {
            return response()->json([
                'status' => 404,
                'message' => 'Professor não encontrado',
            ], 404);
        }

        $professor->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Professor deletado com sucesso',
        ]);
    }
}