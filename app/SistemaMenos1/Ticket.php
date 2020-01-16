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
}
