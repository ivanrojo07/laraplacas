<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    //

    protected $fillable = [
    	'id',
		'tipo_servicio',
		'modalidad',
		'expresion',
		'caracteres',
		'longitud'
    ];

    // RELACIÓN DE LAS PLACAS CON EL MISMO TIPO DE SERVICIO
    public function registro_placas()
    {
    	return  $this->hasMany('App\RegistroPlaca','tipo_servicio_id');
    }
}
