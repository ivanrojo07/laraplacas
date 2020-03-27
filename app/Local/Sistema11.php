<?php

namespace App\Local;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sistema11 extends Model
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

    protected $appends = ['date','time'];

    public function getDateAttribute(){
		setlocale(LC_ALL, 'es_ES');
    	$fecha = date('d/m/Y',strtotime($this->fecha));
    	return $fecha;
    }

    public function getTimeAttribute(){
        $hora = date('g:i:s a',strtotime($this->hora));
        return $hora;
    }

    public function tipo_servicio()
    {
    	return $this->belongsTo('App\TipoServicio');
    }

    public function imagen(){
    	return $this->hasOne('App\Local\ImagenSistema11');
    }
}
