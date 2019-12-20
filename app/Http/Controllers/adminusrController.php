<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;//Modelo usuarios
use Illuminate\Support\Facades\DB;//para poder usar la base de datos


class adminusrController extends Controller
{
    #INSERTAR USUARIO
    public function insert(Request $request){
      return view('usuario.insert');
    }

    #SELECCIONAR USUARIO
    public function select(Request $request){
      //$usuarios=User::all();
      $usuarios=User::select('id','name','email','status')->get();
      return view('usuario.select',array('usuarios'=>$usuarios));
    }

    #ACTUALIZAR USUARIO
    public function update(Request $request){
      $datos=$request['data'];
      $usuario=$datos['usuario'];
      $affected=DB::table('users')
            ->where('id', $usuario['id'] )
            ->update([
            'name' => $usuario['name'],
            'nombres' => $usuario['nombres'],
            'apellido_paterno' => $usuario['apellido_paterno'],
            'apellido_materno' => $usuario['apellido_materno'],
            'telefono' => $usuario['telefono'],
            //'email' => $usuario['email'],
            'status' => $usuario['status']
          ]);


      return $affected;
    }

    #ELIMINAR USUARIO
    public function delete(Request $request){
      return view('usuario.delete');
    }

    #BUSCAR USUARIO---------
    public function find(Request $request){
      $datos=$request['data'];
      $idusr=$datos['idusr'];
      $usrdata=User::select()->where('id', '=', $idusr)->get();
     //
      //print_r($usrdata);
      //$user = DB::table('users')->where('name', 'John')->first();
      //return view('usuario.find',array("usrdata"=>$usrdata));
      return $usrdata;
    }

}
