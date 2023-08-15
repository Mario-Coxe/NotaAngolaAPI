<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'disciplinas';

    protected $fillable = ['nome', 'instituicaoId'];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicaoId', 'idInstituicao');
    }
}
