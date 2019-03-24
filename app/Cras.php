<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cras extends Model
{
      /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cras';

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
        'id', 'cidade_id' ,'name'
    ];

}
