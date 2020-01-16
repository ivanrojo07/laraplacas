<?php

namespace App;

use App\RoboRepuve;
use Illuminate\Database\Eloquent\Model;

class PlacaRepuve extends Model
{
    //

    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_repuve";
    protected $table = "Placas";
    protected $primaryKey = 'placa';
    protected $keyType='string';
    // No tiene timestamps
    public $timestamps = false;

    protected $guarded =[];

	protected $fillable = [];

	public function reporte_robo(){
		return $this->hasOne('App\RoboRepuve','placa');
	}
}
