<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;

    protected $table = 'instituicoes';
    protected $primaryKey = 'idInstituicao'; // Indicar o nome da chave primária personalizada

    // Indicar os campos que são preenchíveis em massa (mass assignable)
    protected $fillable = [
        'nome',
        'localizacao',
        'telefone',
        'email',
        'encaregado',
        'status',
    ];

    // Relação com o encarregado
    public function encarregado()
    {
        return $this->belongsTo(Encarregado::class, 'encaregado');
    }
}
