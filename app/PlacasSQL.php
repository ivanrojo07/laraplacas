<?php

namespace App;

use App\Sistema_11\ImagenVelocidad;
use Illuminate\Database\Eloquent\Model;

class PlacasSQL extends Model
{
    protected $connection = 'sqlsrv_pm';
    protected $table = 'DEF';
    protected $primaryKey = 'id_def';
    protected $appends = ['imagen1','imagen2'];

    public function Imagen(){
        return $this->belongsTo('App\Sistema_11\ImagenVelocidad','id_img', 'id_img');
    }
    public function getImagen1Attribute(){
        $img1 = ImagenVelocidad::find($this->id_img);

        return $this->attributes['imagen1'] = $img1;
    }
    public function getImagen2Attribute(){
        $img2 = ImagenVelocidad::find($this->id_img-1);

        return $img2;
    }
}
