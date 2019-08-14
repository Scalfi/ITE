<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pesquisas';

 	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id'
        ,'user_id' 
        ,'idade'
        ,'telefone'
        ,'cep'
        ,'rua'
        ,'cras_id'
        ,'bairro'
        ,'cidade'
        ,'uf'
        ,'numero_residencia'
        ,'reponsavel_familia'
        ,'genero'
        ,'qtd_pessoas'
        ,'qtd_idade_1'
        ,'qtd_idade_2'
        ,'qtd_idade_3'
        ,'qtd_idade_4'
        ,'qtd_idade_5'
        ,'qtd_idade_6'
        ,'pessoas_deficiencia'
        ,'escolaridade_infantantil'
        ,'escolaridade_fundamental_um'
        ,'escolaridade_fundamental_dois'
        ,'escolaridade_medio_completo'
        ,'escolaridade_medio_incompleto'
        ,'escolaridade_superior_completo'
        ,'escolaridade_superior_incompleto'
        ,'escolaridade_ceja'
        ,'escolaridade_eja'
        ,'escolaridade_nao_alfabetizado'
        ,'genero'
        ,'quantidade_de_renda'
        ,'fonte_de_renda'
        ,'auxilio'
        ,'beneficios'
        ,'cadastro_unico'
        ,'tempo_reside_municipio'
        ,'tempo_reside_bairro'
        ,'membro_na_rua'
        ,'tipo_residencia'
        ,'tipo_material_residencia'
        ,'agua_encanada'
        ,'possui_acessibilidade'
        ,'energia'
        ,'escoamento_sanitario'
        ,'banheiro'
        ,'coleta_de_lixo'
        ,'pavimentacao'
        ,'acessos'
        ,'interesse_cras'
        ,'atendimento_creas'
        ,'familia_acesso_politicas'
        ,'finalizado'
    ];
}
