<?php

namespace App\Local;

use Illuminate\Database\Eloquent\Model;

class ImagenSistema11 extends Model
{
    //
    protected $fillable=[
    	'img_1',
		'img_2'
    ];

    public function placa()
    {
    	return $this->belongsTo('App\Local\Sistema11');
    }
}
