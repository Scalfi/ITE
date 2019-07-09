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
            $table->string('idade')->nullable();
            $table->string('telefone')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->string('numero_residencia')->nullable();
            $table->string('reponsavel_familia')->nullable();
            $table->string('genero')->nullable();
            $table->string('qtd_pessoas', 50)->nullable();
            $table->integer('qtd_idade_1')->default(0);
            $table->integer('qtd_idade_2')->default(0);
            $table->integer('qtd_idade_3')->default(0);
            $table->integer('qtd_idade_4')->default(0);
            $table->integer('qtd_idade_5')->default(0);
            $table->integer('qtd_idade_6')->default(0);
            $table->boolean('pessoas_deficiencia')->nullable();
            $table->integer('escolaridade_infantantil')->default(0);
            $table->integer('escolaridade_fundamental_um')->default(0);
            $table->integer('escolaridade_fundamental_dois')->default(0);
            $table->integer('escolaridade_medio_completo')->default(0);
            $table->integer('escolaridade_medio_incompleto')->default(0);
            $table->integer('escolaridade_superior_completo')->default(0);
            $table->integer('escolaridade_superior_incompleto')->default(0);
            $table->integer('escolaridade_ceja')->default(0);
            $table->integer('escolaridade_eja')->default(0);
            $table->integer('escolaridade_nao_alfabetizado')->default(0);
            $table->string('quantidade_de_renda')->nullable();
            $table->string('fonte_de_renda')->nullable();
            $table->string('auxilio')->nullable();
            $table->string('beneficios')->nullable();
            $table->string('cadastro_unico')->nullable();
            $table->string('tempo_reside_municipio')->nullable();
            $table->string('tempo_reside_bairro')->nullable();
            $table->string('membro_na_rua')->nullable();
            $table->string('tipo_residencia')->nullable();
            $table->string('tipo_material_residencia')->nullable();
            $table->string('agua_encanada')->nullable();
            $table->string('possui_acessibilidade')->nullable();
            $table->string('energia')->nullable();
            $table->string('escoamento_sanitario')->nullable();
            $table->string('banheiro')->nullable();
            $table->string('coleta_de_lixo')->nullable();
            $table->string('pavimentacao')->nullable();
            $table->string('acessos')->nullable();
            $table->string('interesse_cras')->nullable();
            $table->string('atendimento_creas')->nullable();
            $table->string('familia_acesso_politicas')->nullable();
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
