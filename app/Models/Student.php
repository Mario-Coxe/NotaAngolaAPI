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
        'idTurma',
        'nome',
        'dataNascimento',
        'genero',
        'BI',
        'email',
        'morada',
        'encarregado'
    ];

    //Relação com a instituição
    public function institution()
    {
        return $this->belongsTo(Instituicao::class, 'idInstituicao');
    }

    // Relação com o encarregado
    public function guardian()
    {
        return $this->belongsTo(Encarregado::class, 'encarregado');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'idInstituicao');
    }

}
