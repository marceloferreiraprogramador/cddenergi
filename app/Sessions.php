<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{

    protected $fillable = [
        'codigo_perfil_sessions',
        'cnpj_sessions',
    ];
}
