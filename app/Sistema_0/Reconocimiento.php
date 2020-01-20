<?php

namespace App\Sistema_0;

use Illuminate\Database\Eloquent\Model;

class Reconocimiento extends Model
{
    //
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_sistema_0";
    protected $table = "Reconocimiento";
    protected $primaryKey = 'IDReconocimiento';
    protected $appends = ['date','hora'];

    public function getDateAttribute(){
    	$cadena = explode('_',$this->ImagenPlaca);
    	$fecha = date('l d/m/Y',strtotime($cadena[0]));
    	return $fecha;
    }

    public function getHoraAttribute(){
        $cadena = explode('_',$this->ImagenPlaca);
        $hora = date('g:i:s a',strtotime($cadena[1]));
        return $hora;
    }
}
