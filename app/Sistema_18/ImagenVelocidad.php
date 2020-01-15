<?php

namespace App\Sistema_18;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_18";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    public function placa()
    {
    	return $this->hasOne('App\Sistema_18\ImagenPlaca','id_img');
    }
}
