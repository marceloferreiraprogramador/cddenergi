<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class');
            $table->string('name');
            $table->string('num_ativo');
            $table->string('ceg');
            $table->string('concessionaria');
            $table->string('desc_def_regulatorio');
            $table->string('submercado');
            $table->string('capacidade_instalada');
            $table->string('quant_uni_geradora');
            $table->string('operacao_tst_apartir');
            $table->string('operacao_comerc_apartir');
            $table->string('garantia_fisica');
            $table->string('f_dpi_fg');
            $table->string('participa_mre');
            $table->string('perdas_rede_basica');
            $table->string('perdas_rede_compartilhada');
            $table->integer('id_perfil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ativos');
    }
}
