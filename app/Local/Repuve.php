<?php

namespace App\Local;

use Illuminate\Database\Eloquent\Model;

class Repuve extends Model
{
    //
    protected $fillable=[
    	'placa',
    	'marca',
    	'modelo',
    	'anio',
    	'clase',
    	'tipo',
    	'niv',
    	'version',
    	'robado',
    	'fecha'
    ];

    public function robado(){
    	return $this->hasOne("App\Local\Robo","placa","placa");
    }
}
