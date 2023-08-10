<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $table = 'professores';


    protected $fillable = ['nome', 'email', 'senha', 'telefone'];

    public function instituicoes()
    {
        return $this->belongsToMany(Instituicao::class, 'professor_instituicao');
    }
}