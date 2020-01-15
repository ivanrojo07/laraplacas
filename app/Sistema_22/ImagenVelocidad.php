<?php

namespace App\Sistema_22;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_22";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    public function placa()
    {
    	return $this->hasOne('App\Sistema_22\ImagenPlaca','id_img');
    }
}
