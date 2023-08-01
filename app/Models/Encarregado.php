<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarregado extends Model
{
    use HasFactory;

    protected $table = 'encarregados';
    protected $primaryKey = 'idEncarregado'; // Indicar o nome da chave primária personalizada

    // Indicar os campos que são preenchíveis em massa (mass assignable)
    protected $fillable = [
        'nome',
        'parentesco',
        'telefone',
        'email',
        'senha',
    ];

    // Relação com a instituição (caso exista uma chave estrangeira)
    // public function instituicao()
    // {
    //     return $this->belongsTo(Instituicao::class, 'Instituicao');
    // }
}