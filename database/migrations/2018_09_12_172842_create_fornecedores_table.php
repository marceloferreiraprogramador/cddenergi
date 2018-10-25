<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('social');
            $table->string('cpf_cnpj');
            $table->string('nature');
            $table->integer('cfop');
            $table->string('msn_sup');
            $table->string('msn_inf');
            $table->longText('obs');
            $table->boolean('inf_pay');
            $table->string('inf_general');
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
        Schema::dropIfExists('fornecedores');
    }
}
