<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id'; // Chave primária da tabela
    protected $fillable = ['nome', 'professorId', 'instituicaoId']; // Colunas que podem ser preenchidas

    // Relacionamento com o modelo Professor
    public function professor()
    {
        return $this->belongsTo(Professor::class, 'professorId');
    }

    // Relacionamento com o modelo Instituicao
    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaoId');
    }
    public function alunos()
    {
        return $this->hasMany(Student::class, 'idTurma', 'id');
    }
}