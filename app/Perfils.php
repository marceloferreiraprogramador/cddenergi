<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class perfils extends Model
{
    protected $fillable = [
        'sigla_perfil',
        'codigo_perfil',
        'cnpj',
    ];
}
