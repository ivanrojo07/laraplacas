<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 **************************************
 *
 *	Modelo que muestra información 
 *	detallada de las placas registradas
 *
 **************************************
 */
class RegistroPlaca extends Model
{
    // Propiedades que pueden ser asignadas en masa
	protected $fillable=[
		'placa',
		'verificada',
		'marca',
		'anio',
		'modelo',
		'tipo',
		'clase',
		'niv',
		'version',
		'robado'
	];

	// Relación con el tipo de servicio del vehiculo
	public function tipo_servicio(){
		return $this->belongsTo('App\TipoServicio','tipo_servicio_id','id');
	}

	// RELACIÓN DEL HISTORIAL DE VISUALIZACIONES DE LA PLACA
    public function registro_placas()
    {
    	return  $this->hasMany('App\RegistroVisualizacion','registro_placa_id');
    }

}
