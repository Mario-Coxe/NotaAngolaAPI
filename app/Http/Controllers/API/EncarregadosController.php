<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encarregado;
use App\Models\Instituicao;

class EncarregadosController extends Controller
{


    public function getAllIncharge()
    {
        $inCharge = Encarregado::all();
        return response()->json([
            'status' => 200,
            'Encarregados' => $inCharge,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'parentesco' => 'required',
            'telefone' => 'nullable|string|max:25',
            'email' => 'required|email',
            'senha' => 'required', // Certifique-se de que 'encarregado' é um número inteiro ou nulo
        ]);



        $inCharge = new Encarregado;
        $inCharge->nome = $request->input('nome');
        $inCharge->parentesco = $request->input('parentesco');
        $inCharge->telefone = $request->input('telefone');
        $inCharge->email = $request->input('email');
        $inCharge->senha = password_hash($request->input('senha'), PASSWORD_DEFAULT);
        $inCharge->save();


        return response()->json([
            'status' => 200,
            'message' => 'Encarregado adicionado com sucesso',
            'inCharge' => $inCharge,
        ]);
    }

    public function read($id)
    {
        $encarregado = Encarregado::find($id);
        return response()->json([
            'status' => 200,
            'inCharge' => $encarregado,
        ]);
    }

    public function update(Request $request, $id)
    {
        $encarregado = Encarregado::find($id);

        if (!$encarregado) {
            return response()->json([
                'status' => 404,
                'message' => 'encarregado não encontrado',
            ], 404);
        }

        $encarregado->nome = $request->input('nome');
        $encarregado->parentesco = $request->input('parentesco');
        $encarregado->telefone = $request->input('telefone');
        $encarregado->email = $request->input('email');
        $encarregado->senha = $request->input('senha');
        $encarregado->save();


        return response()->json([
            'status' => 200,
            'message' => 'encarregado modificado com sucesso',
        ]);
    }


    public function delete($id)
    {
        $encarregado = Encarregado::find($id);
        $encarregado->delete();

        return response()->json([
            'status' => 200,
            'message' => 'inCharge Deleted succefully',
        ]);
    }

}