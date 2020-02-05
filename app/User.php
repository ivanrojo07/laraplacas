<?php

namespace App;

use Laravel\Passport\HasApiTokens;//CONFIGURACION DE  HASH API TOKEN PASPORT
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;//Iniciarlizar la  variable

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table='users';

    protected $fillable = [
        'name',
        'apellido_paterno',
        'apellido_materno',
        'telefono',
        'email',
        'email_verified_at',
        'password',
        'f_registro',
        'f_alta',
        'f_baja',
        'h_alta',
        'h_baja',
        'h_edicion',
        'status',
        'token',
        'idusr_alta',
        'idusr_baja',
        'idusr_edicion',
        'session_id',
        'last_session',
        'last_login'
    ];

    //protected $fillable = [
    //    'name','nombres','apellido_paterno','apellido_materno','telefono', 'email', 'password','f_registro','f_alta','f_baja','h_alta','h_baja','h_edicion','roles','status','token','idusr_alta','idusr_baja','idusr_edicion'
    //];

    /*
    ,'id','name','apellido_materno','apellido_paterno','alias','f_registro','f_alta','f_baja','f_edicion','password','roles','status','token','telefono','idusr_alta','idusr_baja','idusr_edicion'*/

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
