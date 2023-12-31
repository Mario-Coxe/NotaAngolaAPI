<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primaryKey = 'idAluno'; // Definindo a chave primária personalizada

    protected $fillable = [
        'idInstituicao',
        'idEncarregado',
        'idTurma',
        'nome',
        'dataNascimento',
        'genero',
        'BI',
        'email',
        'morada',
    ];


    // Relação com a instituição
    // public function institution()
    // {
    //     return $this->belongsTo(Instituicao::class, 'idInstituicao');
    // }


    // Relação com o encarregado
    public function incharge()
    {
        return $this->belongsTo(Encarregado::class, 'idEncarregado');
    }

    // public function student()
    // {
    //     return $this->hasMany(Student::class, 'idInstituicao');
    // }

    public function notas()
    {
        return $this->hasMany(Nota::class, 'alunoId', 'idAluno');
    }

    public function encarregado()
    {
        return $this->belongsTo(Encarregado::class, 'idEncarregado');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'idTurma');
    }

}