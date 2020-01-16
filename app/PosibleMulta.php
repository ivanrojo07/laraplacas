<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PosibleMulta extends Model
{
    //
    protected $fillable=[
    	'tipo_multa',
		'genero_multa',
		'estatus',
		'fecha_verificacion'
    ];

    /*********************************
     *			RELACIÓNES
     ********************************/
    
    // Imagen placas
    public function img_placa()
    {
    	return $this->belongsTo('App\ImgPlaca','img_placa_id','id');
    }

    // Imagen velocidad
    public function img_velocidad()
    {
    	return $this->belongsTo('App\ImgVelocidad','img_velocidad_id','id');
    }

    // 
}
