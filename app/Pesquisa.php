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
    protected $fillable = ['id', 'user_id', 'second_step', 'cidade_id', 'cras_id', 'bairro_id', 'qtd_pessoas', 'qtd_idade_1', 'qtd_idade_2',
    'qtd_idade_3', 'qtd_idade_4','qtd_idade_5','pessoas_deficiencia','tipo_deficiencia', 'mebro_familia', 'reponsavel_familia'];
}
