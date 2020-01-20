<?php

namespace App\SistemaMenos1;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv_sistema_menos_1";
    protected $table = "Tickets";
    protected $primaryKey = 'Folio';
    // No tiene timestamps
    public $timestamps = false;

    protected $guarded =[];

	protected $fillable = [];

	protected $appends = ['date','hora'];

    public function getDateAttribute(){
    	$cadena = explode('_',$this->Imagen1);
    	$fecha = date('l d/m/Y',strtotime($cadena[0]));
    	return $fecha;
    }

    public function getHoraAttribute(){
        $cadena = explode('_',$this->Imagen1);
        $hora = date('g:i:s a',strtotime($cadena[1]));
        return $hora;
    }
}
