<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoboRepuve extends Model
{
    //
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_repuve";
    protected $table = "Reporte_robo";
    protected $primaryKey = 'placa';
    protected $keyType='string';
    // No tiene timestamps
    public $timestamps = false;

    protected $guarded =[];

	protected $fillable = [];

	public function reporte_robo(){
		return $this->belongsTo('App\PlacaRepuve','placa');
	}
}
