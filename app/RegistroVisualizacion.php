<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroVisualizacion extends Model
{
    //

    protected $fillable=[
    	'fecha',
		'hora',
		'sistema'
    ];
}
