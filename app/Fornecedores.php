<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    protected $fillable = [
        'name',
        'social',
        'cpf_cnpj',
        'nature',
        'cfop',
        'msn_sup',
        'msn_inf',
        'obs',
        'inf_pay',
        'inf_general'
    ];

}
