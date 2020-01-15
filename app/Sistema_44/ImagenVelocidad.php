<?php

namespace App\Sistema_44;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_44";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    public function placa()
    {
    	return $this->hasOne('App\Sistema_44\ImagenPlaca','id_img');
    }
    public function imagenes()
    {
    	return $this->hasMany('App\Sistema_44\ImagenPlaca','id_img');
    }
}
