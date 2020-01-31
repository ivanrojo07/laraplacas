<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{

    protected $fillable = [
    	'id',
		'tipo_servicio',
		'modalidad',
		'expresion',
		'caracteres',
		'longitud'
    ];

    // RELACIÓN DE LAS PLACAS CON EL MISMO TIPO DE SERVICIO
    public function registro_placas()
    {
    	return  $this->hasMany('App\RegistroPlaca','tipo_servicio_id');
    }

    public function sistema0_placas()
    {
        return $this->hasMany('App\Local\Sistema0');
    }
    public function sistema1_placas()
    {
        return $this->hasMany('App\Local\Sistema1');
    }
    public function sistema11_placas()
    {
        return $this->hasMany('App\Local\Sistema11');
    }
    public function sistema13_placas()
    {
        return $this->hasMany('App\Local\Sistema13');
    }
    public function sistema14_placas()
    {
        return $this->hasMany('App\Local\Sistema14');
    }
    public function sistema15_placas()
    {
        return $this->hasMany('App\Local\Sistema15');
    }
    public function sistema16_placas()
    {
        return $this->hasMany('App\Local\Sistema16');
    }
    public function sistema17_placas()
    {
        return $this->hasMany('App\Local\Sistema17');
    }
    public function sistema18_placas()
    {
        return $this->hasMany('App\Local\Sistema18');
    }
    public function sistema19_placas()
    {
        return $this->hasMany('App\Local\Sistema19');
    }
    public function sistema21_placas()
    {
        return $this->hasMany('App\Local\Sistema21');
    }
    public function sistema22_placas()
    {
        return $this->hasMany('App\Local\Sistema22');
    }
    public function sistema43_placas()
    {
        return $this->hasMany('App\Local\Sistema43');
    }
    public function sistema44_placas()
    {
        return $this->hasMany('App\Local\Sistema44');
    }
}
