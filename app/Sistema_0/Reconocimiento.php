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
}
