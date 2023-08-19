<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $table = 'notas';

    protected $fillable = [
        'alunoId',
        'disciplinaId',
        'trimestre',
        'mac',
        'pp',
        'pt',
        'mt',
        'mt1',
        'mt2',
        'mt3',
        'mfd',
        'faltas',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'alunoId', 'idAluno');
    }

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class, 'disciplinaId', 'id');
    }
}
