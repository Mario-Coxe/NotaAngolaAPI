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
        'idEncarregado',
        'status',
    ];

    // Relação com os alunos
    public function student()
    {
        return $this->hasMany(Student::class, 'idInstituicao');
    }

    // Relação com os encarregados
    public function incharges()
    {
        return $this->hasMany(Encarregado::class, 'idInstituicao');
    }


    public function professores()
    {
        return $this->belongsToMany(Professor::class, 'professor_instituicao');
    }

}