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
            $table->string('qtd_pessoas', 50)->nullable();
            $table->integer('qtd_idade_1')->default(0);
            $table->integer('qtd_idade_2')->default(0);
            $table->integer('qtd_idade_3')->default(0);
            $table->integer('qtd_idade_4')->default(0);
            $table->integer('qtd_idade_5')->default(0);
            $table->boolean('pessoas_deficiencia')->nullable();
            $table->boolean('first_step')->nullable();
            $table->boolean('second_step')->nullable();
            $table->string('tipo_deficiencia', 50)->nullable();
            $table->string('mebro_familia', 10)->nullable();
            $table->string('reponsavel_familia', 10)->nullable();
            $table->boolean('finalizado', 10)->nullable();

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
