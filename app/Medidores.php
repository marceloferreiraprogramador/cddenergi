<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medidores extends Model
{
    protected $fillable = [
        'cod_medidor',
        'medidor_fontreira',
        'num_ativo',

    ];
}
