<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'estado',
        'municipio',
        'bairro',
        'rua',
        'numero',
        'cep',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
