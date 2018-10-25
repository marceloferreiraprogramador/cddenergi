<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_perfil_sessions')->default('1');
            $table->integer('cnpj_sessions')->default('5');
            $table->string('acao_sessions')->default('1');
            $table->string('num_ativo_sessions')->default('1');
            $table->timestamps();
        });
        DB::table('sessions')->insert(
            array(
                'codigo_perfil_sessions' => '1',
                'cnpj_sessions' => 1,
                'acao_sessions' => '1',
                'num_ativo_sessions' =>'a'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
