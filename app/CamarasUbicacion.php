<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CamarasUbicacion extends Model
{
    //

    protected $fillable=[
    	'sistema',
		'fecha_registro',
		'verificada',
		'ubicacion',
		'referencia',
		'limite_velocidad',
		'lat',
		'long',
		'carriles'
    ];
}
