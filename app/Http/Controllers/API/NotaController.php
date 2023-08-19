<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Student;
use App\Models\Disciplina;
use App\Models\Encarregado;

class NotaController extends Controller
{

    // Obter todas as notas de um aluno em uma disciplina
    public function getStudentNota($alunoId, $disciplinaId)
    {
        $aluno = Student::find($alunoId);
        $disciplina = Disciplina::find($disciplinaId);

        if (!$aluno || !$disciplina) {
            return response()->json(['error' => 'Aluno ou disciplina não encontrados'], 404);
        }

        $nota = Nota::where('alunoId', $alunoId)
            ->where('disciplinaId', $disciplinaId)
            ->get();

        return response()->json(['notas' => $nota]);
    }


    //cadastrar nota
    public function create(Request $request)
    {
        $request->validate([
            'alunoId' => 'required|integer',
            'disciplinaId' => 'required|integer',
            'trimestre' => 'required|in:1,2,3',
            'mac' => 'max:20',
            'pp' => 'nullable|max:20',
            'pt' => 'nullable|max:20',
            'mt' => 'nullable|max:20',
            'faltas' => 'required|integer',
            'mt1' => 'nullable|numeric|max:20',
            'mt2' => 'nullable|numeric|max:20',
            'mt3' => 'nullable|numeric|max:20',
            'mfd' => 'nullable|numeric|max:20',
        ]);

        // Verificar se o aluno e a disciplina existem
        $alunoExists = Student::where('idAluno', $request->input('alunoId'))->exists();
        $disciplinaExists = Disciplina::where('id', $request->input('disciplinaId'))->exists();

        if (!$alunoExists || !$disciplinaExists) {
            return response()->json([
                'status' => 400,
                'message' => 'Aluno ou disciplina não existem',
            ], 400);
        }

        $nota = Nota::create($request->all());

        return response()->json($nota, 201);
    }


    //ver a nota passando o id
    public function read($id)
    {
        // Busque a nota pelo ID e retorne
        $nota = Nota::findOrFail($id);

        return response()->json($nota);
    }

  
// Atualizar os dados de uma nota
    public function update(Request $request, $id)
    {
        // Busque a nota pelo ID
        $nota = Nota::findOrFail($id);

        // Verificar se a nota foi encontrada
        if (!$nota) {
            return response()->json([
                'status' => 404,
                'message' => 'Nota não encontrada',
            ], 404);
        }

        // Realizar a validação dos campos do request, se necessário
        $request->validate([
            'alunoId' => 'integer',
            'disciplinaId' => 'integer',
            // ... outros campos e validações aqui
        ]);

        // Atualizar a nota com base nos dados fornecidos no request
        $nota->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Nota atualizada com sucesso',
            'nota' => $nota,
        ]);
    }



    //Elimina
    public function delete($id)
    {
        // Exclua a nota pelo ID
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return response()->json(null, 204);
    }
}