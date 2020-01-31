<?php

namespace App\Local;

use Illuminate\Database\Eloquent\Model;

class Sistema22 extends Model
{
    protected $fillable=[
    	'placa_original',
		'placa_modificada',
		'sistema',
		'img_path_velocidad',
		'img_path_placa',
		'img_b64_velocidad',
		'img_b64_placa',
		'fecha',
		'hora',
		'velocidad',
		'tipo_servicio_id'
    ];

    public function tipo_servicio()
    {
    	return $this->belongsTo('App\TipoServicio');
    }
}
