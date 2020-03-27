<?php

namespace App\Local;

use Illuminate\Database\Eloquent\Model;

class Robo extends Model
{
    //

    protected $fillable=[
    	'placa',
    	'status',
    	'entidad',
    	'fecha_actualizacion',
    	'fecha_robo',
    	'fecha_averiguacion',
    	'entidad_recuperacion',
    	'fecha_recuperacion',
    ];


    public function repuve(){
    	return $this->belongsTo("App\Local\Repuve","placa","placa");
    }
}
