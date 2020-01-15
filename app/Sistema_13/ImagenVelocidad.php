<?php

namespace App\Sistema_13;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_13";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    public function placa()
    {
    	return $this->hasOne('App\Sistema_13\ImagenPlaca','id_img');
    }
}
