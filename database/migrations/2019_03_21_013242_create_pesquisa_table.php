<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesquisaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesquisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cidade_id');
            $table->unsignedBigInteger('cras_id');
            $table->unsignedBigInteger('bairro_id');
            $table->string('qtd_pessoas', 50);
            $table->integer('qtd_idade_1');
            $table->integer('qtd_idade_2');
            $table->integer('qtd_idade_3');
            $table->integer('qtd_idade_4');
            $table->integer('qtd_idade_5');
            $table->boolean('pessoas_deficiencia');
            $table->boolean('second_step');
            $table->string('tipo_deficiencia', 50);
            $table->string('mebro_familia', 10);
            $table->string('reponsavel_familia', 10);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesquisas');
    }
}
