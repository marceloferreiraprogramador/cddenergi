<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agentes extends Model
{
    protected $fillable = [
        'codigo_agente',
        'codigo_representante',
        'cnpj',
    ];
}
