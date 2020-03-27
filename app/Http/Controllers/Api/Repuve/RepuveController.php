<?php

namespace App\Http\Controllers\Api\Repuve;

use App\Http\Controllers\Controller;
use App\PlacaRepuve;
use Illuminate\Http\Request;

class RepuveController extends Controller
{
    //
    /*HANDLER QUE OBTIENE INFORMACIÓN DE LA BASE DE DATOS SQL SERVER 172.17.0.18*/
    public function getPlaca(Request $request){
        // BUSCAMOS EN LA BASE DE DATOS ORIGINAL (172.17.0.18) EL REQUEST DEL USUARIO
    	$repuve = PlacaRepuve::find($request->placa);
        // SI EXISTE EL REGISTRO Y NO ES NULL,
    	if ($repuve) {
            // RETORNAMOS UNA RESPUESTA JSON CON LA INFORMACIÓN DE ESA PLACA,
            // JUNTO CON LA RELACIÓN CON LA TABLA REPORTE ROBO.
    		return response()->json(['result'=>$repuve->load('reporte_robo')],200);
    	}
        // SI NO EXISTE EL REGISTRO
    	else{
            // RETORNAMOS UN MENSAJE DE ERROR CON STATUS 404 (NOT FOUND) PARA INDICAR
            // QUE EL REGISTRO NO ESTA EN LA BD
    		return response()->json(['error'=>'Objeto no encontrado'],404);
    	}
    }
}
