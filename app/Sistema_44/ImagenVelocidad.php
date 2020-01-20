<?php

namespace App\Sistema_44;

use Illuminate\Database\Eloquent\Model;

class ImagenVelocidad extends Model
{
    //
    protected $connection = "sqlsrv_sistema_44";
    protected $table = "Imagen";
    protected $primaryKey = 'id_img';
    protected $appends = ['date','hora'];

    public function placa()
    {
    	return $this->hasOne('App\Sistema_44\ImagenPlaca','id_img');
    }
    public function imagenes()
    {
    	return $this->hasMany('App\Sistema_44\ImagenPlaca','id_img');
    }

    public function getDateAttribute(){
        $cadena = explode('_',$this->img);
        $fecha = date('l d/m/Y',strtotime($cadena[0]));
        return $fecha;
    }

    public function getHoraAttribute(){
        $cadena = explode('_',$this->img);
        $hora = date('g:i:s a',strtotime($cadena[1]));
        return $hora;
    }
}
