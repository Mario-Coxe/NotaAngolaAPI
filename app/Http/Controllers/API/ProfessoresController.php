<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessoresController extends Controller
{
 

    // Criar professor
    public function  create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:professores,email',
            'senha' => 'required|string',
        ]);

        $professor = new Professor;
        $professor->nome = $request->input('nome');
        $professor->telefone = $request->input('telefone');
        $professor->email = $request->input('email');
        $professor->senha = bcrypt($request->input('senha'));
        $professor->save();

        return response()->json([
            'status' => 200,
            'message' => 'Professor adicionado com sucesso',
            'professor' => $professor,
        ]);
    }

    // Ver dados de um professor
    public function read($id)
    {
        $professor = Professor::find($id);
        
        if (!$professor) {
            return response()->json([
                'status' => 404,
                'message' => 'Professor não encontrado',
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'professor' => $professor,
        ]);
    }

    // Atualizar professor
    public function update(Request $request, $id)
    {
        $professor = Professor::find($id);

        if (!$professor) {
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

        $professor->nome = $request->input('nome');
        $professor->telefone = $request->input('telefone');
        $professor->email = $request->input('email');
        $professor->senha = bcrypt($request->input('senha'));
        $professor->save();

        // Recarrega os dados atualizados do professor após salvar
        $updatedProfessor = Professor::find($id);

        return response()->json([
            'status' => 200,
            'message' => 'Professor modificado com sucesso',
            'professor' => $updatedProfessor,
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
