<?php

namespace App\Http\Controllers\Api;

use App\CamarasUbicacion;
use App\Http\Controllers\Controller;
use App\RegistroPlaca;
use App\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    /***************************************
     *
     *	Collección de Apis para el modulo
     * 	Historial de Placas
     *
     ***************************************/

    public function sendPlaca(Request $request)
    {
    	$validate = Validator::make(
					$request->all(),
					[
		    			'placa'=>'required|regex:/^([a-h,A-H,j-n,J-N,p-z,P-Z,0-9]{4,7})$/'
		    		],
		    		[
		    			'required'=>'La placa es requerida.',
		    			'regex'=>'La placa no es valida.'
		    		]);
    	if ($validate->fails()) {
    		return response()->json(['errors'=>$validate->errors()],422);
    	}
    	else{

	    	$placa = strtoupper($request->placa);
	        $tipo_servicios = TipoServicio::where('longitud',strlen($placa))->get();
	        foreach ($tipo_servicios as $patron) {
	            if(preg_grep($patron->expresion,[$placa])){
	                $servicio = $patron;
	            }
	        }
	        if (isset($servicio)) {
	        	$registro_placa = RegistroPlaca::updateOrCreate(
	                [
	                    'placa'=>$request->placa
	                ],
	                [
	                    'placa'=>$request->placa,
	                    'tipo_servicio_id'=>$servicio->id,
	                    'verificada' =>  true
	                ]
	             );
    			return response()->json(['placa'=>$registro_placa->load('tipo_servicio')],201);

	        } else {
	        	return response()->json(['errors'=>['placa'=>['La placa no es valida.']]],422);
	        }
    	}

    }

    public function getCamaras()
    {
    	$camaras = CamarasUbicacion::get();
    	return response()->json(['camaras'=>$camaras], 201);
    }
}
