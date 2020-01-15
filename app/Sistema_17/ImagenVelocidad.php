<?php

namespace App\Sistema_17;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_17";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    public function placa()
    {
    	return $this->hasOne('App\Sistema_17\ImagenPlaca','id_img');
    }
}
