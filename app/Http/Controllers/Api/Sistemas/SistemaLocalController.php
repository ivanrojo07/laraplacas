<?php

namespace App\Http\Controllers\Api\Sistemas;

use App\Http\Controllers\Controller;
use App\Local\Sistema0;
use App\Local\Sistema11;
use App\Local\Sistema13;
use App\Local\Sistema14;
use App\Local\Sistema15;
use App\Local\Sistema16;
use App\Local\Sistema17;
use App\Local\Sistema18;
use App\Local\Sistema19;
use App\Local\Sistema1;
use App\Local\Sistema21;
use App\Local\Sistema22;
use App\Local\Sistema43;
use App\Local\Sistema44;
use App\TipoServicio;
use Illuminate\Http\Request;

class SistemaLocalController extends Controller
{
	// 
    public function sistema0(Request $request)
    {
    	$servicio = $request->servicio;
    	if ($servicio) {
    		$result = Sistema0::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->get();
    		return response()->json(['result'=>$result],201);
    	} else {
    		$result = Sistema0::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
    		return response()->json(['result'=>$result],201);
    	}
    }
    public function sistema1(Request $request)
    {
    	$servicio = $request->servicio;
    	if ($servicio) {
    		$result = Sistema1::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->get();
    		return response()->json(['result'=>$result],201);
    	} else {
    		$result = Sistema1::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
    		return response()->json(['result'=>$result],201);
    	}
    }
    public function sistema11(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema11::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema11::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema13(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema13::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema13::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema14(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema14::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema14::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema15(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema15::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema15::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema16(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema16::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema16::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema17(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema17::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema17::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema18(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema18::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema18::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema19(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema19::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema19::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema21(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema21::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema21::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema22(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema22::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema22::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema43(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema43::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema43::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
    public function sistema44(Request $request)
    {
        $servicio = $request->servicio;
        if ($servicio) {
            $result = Sistema44::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        } else {
            $result = Sistema44::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            return response()->json(['result'=>$result],201);
        }
    }
}
