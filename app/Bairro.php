<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bairros';

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
        'id', 'name', 'cras_id'
    ];

}
