<?php

namespace App\Sistema_14;

use Illuminate\Database\Eloquent\Model;

class ImagenPlaca extends Model
{
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_sistema_14";
    protected $table = "Placas";
    protected $primaryKey = 'id_placas';

    // relación con imagen velocidad
    public function velocidad()
    {
    	return $this->belongsTo('App\Sistema_14\ImagenVelocidad', 'id_img');
    }
}
