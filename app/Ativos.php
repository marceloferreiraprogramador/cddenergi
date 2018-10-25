<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ativos extends Model
{
    protected $fillable = [
        'class',
        'name',
        'num_ativo',
        'ceg',
        'concessionaria',
        'desc_def_regulatorio',
        'submercado',
        'capacidade_instalada',
        'quant_uni_geradora',
        'operacao_tst_apartir',
        'operacao_comerc_apartir',
        'garantia_fisica',
        'f_dpi_fg',
        'participa_mre',
        'perdas_rede_basica',
        'perdas_rede_compartilhada',
        'id_perfil'

    ];
}
