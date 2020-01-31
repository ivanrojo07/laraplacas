<?php

namespace App\Sistema_11;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    //
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_sistema_11";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';

    /*relación con imagen velocidad*/
    public function velocidad()
    {
        return $this->belongsTo('App\Sistema_11\ImagenVelocidad', 'id_img');
    }

}
