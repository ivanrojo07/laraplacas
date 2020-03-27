<?php

namespace App\Http\Controllers\Api\Repuve;

use App\Http\Controllers\Controller;
use App\Local\Repuve;
use Illuminate\Http\Request;

class RepuveLocalController extends Controller
{
    //
    // HANDLER DE LA BD LOCAL QUE OBTIENE INFORMACIóN DE LA BASE DE DATOS EXTRAIDA DE SQL SERVER
    public function getPlaca(Request $request){
    	$repuve = Repuve::where("placa",$request->placa)->first();
    	if ($repuve) {
    		return response()->json(['result'=>$repuve->load("robado")],200);
    	}
    	else{
    		return response()->json(['error'=>'Objeto no encontrado'],404);
    	}
    }
}
