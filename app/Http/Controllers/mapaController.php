<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class mapaController extends Controller
{
    /*
    public function camaras_por_estado(Request $request ){
        $estado = $request["estado"];
        $listacamaras = [];
        if($estado == "Todos" || $estado == ""){
            $consulta_camaras=DB::select('SELECT ubicacion, status, nombre, descripcion FROM camaras');
        }
        else{$consulta_camaras = DB::table('camaras')->where('ubicacion->nombre_edo', $estado)->get();}

        foreach ($consulta_camaras as $key => $cam) {
            $ubicacion = json_decode($cam->ubicacion);
            $listacamaras [] = [ "lat"=>$ubicacion->lat,"lng"=>$ubicacion->long, "status"=>$cam->status, "nombre"=>$cam->nombre,"nombre_edo"=>$ubicacion->nombre_edo, "descripcion"=>$cam->descripcion];
            }

        $datos = [
            'infomapa'=>json_encode($listacamaras)
        ];

        return view('mapa.mapa',$datos);
    }*/
    public function camaras_por_estado(Request $request ){
        $estado = $request["estado"];
        $listacamaras = [];
        if($estado == "Todos" || $estado == ""){
            $consulta_camaras=DB::select('SELECT id,ubicacion, status, nombre, descripcion,url_downtrasmision as hlsvideo FROM camaras');
        }
        else{$consulta_camaras = DB::table('camaras')->select('id','ubicacion', 'status', 'nombre', 'descripcion','url_downtrasmision as hlsvideo')->where('ubicacion->nombre_edo', $estado)->get();}

        foreach ($consulta_camaras as $key => $cam) {
            $ubicacion = json_decode($cam->ubicacion);
            $listacamaras [] = ["ids"=>$cam->id ,"lat"=>$ubicacion->lat,"lng"=>$ubicacion->long, "status"=>$cam->status, "nombre"=>$cam->nombre,"nombre_edo"=>$ubicacion->nombre_edo, "descripcion"=>$cam->descripcion, "hlsvideo"=>$cam->hlsvideo];
            }

        $datos = [
            'infomapa'=>json_encode($listacamaras)
        ];

        return view('mapa.mapa',$datos);
    }

    public function panel(Request $request ){
        //print_r('panelpanelpanelpanel....................');
        return view('mapa.panel');
    }
}
