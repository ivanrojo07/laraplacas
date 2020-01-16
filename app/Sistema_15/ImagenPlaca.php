<?php

namespace App\Sistema_15;

use Illuminate\Database\Eloquent\Model;

class ImagenPlaca extends Model
{
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_sistema_15";
    protected $table = "Placas";
    protected $primaryKey = 'id_placas';

    // relación con imagen velocidad
    public function velocidad()
    {
    	return $this->belongsTo('App\Sistema_15\ImagenVelocidad', 'id_img');
    }
}
