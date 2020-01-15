<?php

namespace App\Sistema_15;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_15";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    public function placa()
    {
    	return $this->hasOne('App\Sistema_15\ImagenPlaca','id_img');
    }
}
