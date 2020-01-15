<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    //Modelo se encuentra en el servidor de Plates
    protected $connection = "sqlsrv";
    protected $table = "Imagen";
    // No tiene timestamps
    public $timestamps = false;

    protected $guarded =[];

	protected $fillable = [];

	public function sistema()
	{
		return $this->belongsTo('App\Sistema','id_sistema','id_sistema');
	}


}
