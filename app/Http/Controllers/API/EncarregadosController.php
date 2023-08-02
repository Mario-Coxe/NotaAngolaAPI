<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encarregado;

class EncarregadosController extends Controller
{
    public function getAllIncharge(){
        $encarregado= Encarregado::all();
        return response()->json([
            'status'=> 200,
            'Encarregado'=>$encarregado,
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

        

        $encarregado = new Encarregado;
        $encarregado->nome = $request->input('nome');
        $encarregado->parentesco = $request->input('parentesco');
        $encarregado->telefone = $request->input('telefone');
        $encarregado->email = $request->input('email');
        $encarregado->senha = $request->input('senha');
        $encarregado->save();
        

        return response()->json([
            'status' => 200,
            'message' => 'Encarregado adicionado com sucesso',
            'encarregado' => $encarregado,
        ]);
    }

    public function read($id)
    {
        $encarregado = Encarregado::find($id);
        return response()->json([
            'status' => 200,
            'encarregado' => $encarregado,
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
            'message' => 'encarregado Deleted succefully',
        ]);
    }
}
