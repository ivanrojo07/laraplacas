<?php

namespace App\Http\Controllers\Api\Repuve;

use App\Http\Controllers\Controller;
use App\PlacaRepuve;
use Illuminate\Http\Request;

class RepuveController extends Controller
{
    //

    public function getPlaca(Request $request){
    	$repuve = PlacaRepuve::find($request->placa);
    	if ($repuve) {
    		return response()->json(['result'=>$repuve->load('reporte_robo')],200);
    	}
    	else{
    		return response()->json(['error'=>'Objeto no encontrado'],404);
    	}
    }
}
