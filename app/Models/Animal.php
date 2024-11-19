<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animais';
    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'sexo',
        'idade',
        'temperamento',
        'foto',
        'status',
    ];

    public function solicitacoes()
    {
        return $this->belongsTo(Solicitacao::class);
    }
}
