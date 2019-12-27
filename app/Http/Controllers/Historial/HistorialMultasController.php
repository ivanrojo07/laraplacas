<?php

namespace App\Http\Controllers\Historial;

use App\Http\Controllers\Controller;
use App\TipoServicio;
use Illuminate\Http\Request;

class HistorialMultasController extends Controller
{
    //
    public function index(){
    	return view('historial.index');
    }

    public function buscarPlaca(Request $request)
    {
    	$request->validate(
    		[
    			'placa'=>'required|regex:/^([a-h,A-H,j-n,J-N,p-z,P-Z,0-9]{4,7})$/'
    		],
    		[
    			'required'=>'La placa es requerida.',
    			'regex'=>'La placa no es valida.'
    		]
        );


    	$placa = strtoupper($request->placa);
        $tipo_servicios = TipoServicio::where('longitud',strlen($placa))->get();
        $servicio = [];
        foreach ($tipo_servicios as $patron) {
            if(preg_grep($patron->expresion,[$placa])){
                array_push($servicio,$patron);
            }
        }
        dd($servicio);
    }
}
