<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Encarregado;

class EncarregadosController extends Controller
{
    public function getAllIncharge(){
        $instituicao= Encarregado::all();
        return response()->json([
            'status'=> 200,
            'Encarregado'=>$instituicao,
        ]);
    }
}
