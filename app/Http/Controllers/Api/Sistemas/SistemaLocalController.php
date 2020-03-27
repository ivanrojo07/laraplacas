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

/*****************************************************************
 *                                                               *
 *       Controlador para la base de datos local (postgres)      *
 *   de todos los registros filtrados de los sistemas.           *
 *                                                               *
 *****************************************************************/
class SistemaLocalController extends Controller
{
	// 
    //Buscar registros de placas para el sistema 0 (CHURUBUSCO)
    public function sistema0(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO OBTENIDO POR LA PLACA BUSCADA 
    	$servicio = $request->servicio;
        // SI EL SERVICIO EXISTE
    	if ($servicio) {
            // OBTENEMOS LA BUSQUEDA CON TIPO DE SERVICIO Y PLACA ORIGINAL O PLACA MODIFICADA
    		$result = Sistema0::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // $result = Sistema0::where('tipo_servicio_id',$servicio)->where(function($query)use($request){
            //     $query->where('placa_original',$request->placa)
            //             ->orWhere('placa_modificada',$request->placa);
            // })->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
    		return response()->json(['result'=>$result],201);
    	} /*SI EL SERVICIO NO EXISTE*/ else {
            // SI NO EXISTE EL TIPO DE SERVICIO, BUSCAMOS EN TODA LA BASE DE DATOS POR PLACA ORIGINAL
    		$result = Sistema0::where('placa_original',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON.
    		return response()->json(['result'=>$result],201);
    	}
    }

    // Buscar registros de placas para el sistema 1 (CHURUBUSCO)
    public function sistema1(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO OBTENIDO POR LA PLACA BUSCADA
    	$servicio = $request->servicio;
        // SI EL SERVICIO EXISTE
    	if ($servicio) {
            // OBTENIENDO LA BUSQUEDA POR TIPO DE SERVICIO Y PLACA ORIGINAL.
    		$result = Sistema1::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->get();
            // y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
    		return response()->json(['result'=>$result],201);
    	} /*SI EL SERVICIO NO EXISTE*/ else {
            // BUSCAMOS EN TODA LA BASE DE DATOS POR LA PLACA ORIGINAL
    		$result = Sistema1::where('placa_original',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON.
    		return response()->json(['result'=>$result],201);
    	}
    }

    // Buscar registros de placas para el sistema 11 (PATRIOTISMO)
    public function sistema11(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO OBTENIDO POR LA PLACA BUSCADA
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 11 EL TIPO DE SERVICIO Y LA PLACA ORIGINAL O LA PLACA MODIFICADA COINCIDAN
            $result = Sistema11::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS LA RESPUESTA EN UN OBJETO JSON
            return response()->json(['result'=>$result],201);
        } /* SI NO EXISTE EL TIPO DE SERVICIO */ else {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 11 POR LA PLACA ORIGINAL O LA PLACA MODIFICADA
            $result = Sistema11::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

     // Buscar registros de placas para el sistema 13 (CONSULADO)
    public function sistema13(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 13 EL TIPO DE SERVICIO Y LA PLACA ORIGINAL O LA PLACA MODIFICADA QUE COINCIDAN AL REQUEST
            $result = Sistema13::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y LO RETORNAMOS COMO UN OBJETO JSON
            return response()->json(['result'=>$result],201);
        } else {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA_13 LA PLACA ORIGINAL O LA PLACA MODIFICADA QUE COINCIDAN AL REQUEST
            $result = Sistema13::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS UNA RESPUESTA JSON CON EL RESULTADO
            return response()->json(['result'=>$result],201);
        }
    }

    // Buscar registros de placas para el sistema 14 (CIUDAD UNIVERSITARIA)
    public function sistema14(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EXISTE EL TIPO DE SERVICIO
        if ($servicio) {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 14 EL TIPO DE SERVICIO; Y LA PLACA ORIGINAL O LA PLACA MODIFICADA COINCIDAN CON EL REQUEST
            $result = Sistema14::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS LA RESPUESTA JSON CON EL RESULTADO
            return response()->json(['result'=>$result],201);
        } /*SI NO EXISTE TIPO DE SERVICIO */ else {
            // REALIZAMOS LA BUSQUEDA POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema14::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS LA RESPUESTA JSON CON EL RESULTADO
            return response()->json(['result'=>$result],201);
        }
    }

    // Buscar registros de placas para el sistema 15 (CONSULADO SORIANA)
    public function sistema15(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EXISTE TIPO DE SERVICIO
        if ($servicio) {
            // BUSCAMOS EN LA TABLA /MODELO SISTEMA_15 EL TIPO DE SERVICIO; Y LA PLACA ORIGINAL O LA PLACA
            // MODIFICADA COINCIDAN CON EL REQUEST
            $result = Sistema15::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS LA RESPUESTA JSON CON EL RESULTADO
            return response()->json(['result'=>$result],201);
        } /*SI NO EXISTE TIPO DE SERVICIO */ else {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 15 LA PLACA ORIGINAL O LA PLACA MODIFICADA QUE COINCIDAN
            // CON EL REQUEST
            $result = Sistema15::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS LA RESPUESTA JSON CON EL RESULTADO
            return response()->json(['result'=>$result],201);
        }
    }

    // Buscar registros de placas para el sistema 16 (XOTEPINGO SUR)
    public function sistema16(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EXISTE EL TIPO DE SERVICIO
        if ($servicio) {
            // OBTENEMSO LOS REGISTROS DEL MODELO/TABLA DEL SISTEMA 16 DEL TIPO DEL SERVICIO Y LA PLACA ORIGINAL 
            // O LA PLACA MODIFICADA
            $result = Sistema16::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNA EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*SI NO TENEMOS TIPO DE SERVICIO*/ else {
            // OBTENEMOS LOS REGISTROS DEL MODELO/TABLA DEL SISTEMA 16 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema16::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Buscar registros de placas para el sistema 17 (XOTEPINGO NORTE)
    public function sistema17(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EXISTE EL TIPO DE SERVICIO
        if ($servicio) {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 17 POR TIPO DE SERVICIO Y POR PLACA ORIGINAL O POR PLACA MODIFICADA
            $result = Sistema17::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*SI NO EXISTE EL TIPO DE SERVICIO*/ else {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 17 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema17::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Busqueda de registros de placas para el sistema 18 (GENERAL ANAYA)
    public function sistema18(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 18 POR TIPO DE SERVICIO, Y POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema18::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON.
            return response()->json(['result'=>$result],201);
        } /*SI NO EXISTE TIPO DE SERVICIO*/ else {
            // BUSCAMOS EN LA TABLA/MODELO SISTEMA 18 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema18::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Busqueda de registros de placas para el sistema 19 (FONDA ARGENTINA)
    public function sistema19(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST.
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 19 POR TIPO DE SERVICIO, Y POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema19::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*SI NO EXISTE TIPO DE SERVICIO*/ else {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 19 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema19::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Busqueda de registros de placas para el sistema 21 (EJE 3)
    public function sistema21(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 21 POR TIPO DE SERVICIO, Y POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema21::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*Y SI NO EXISTE TIPO DE SERVICIO*/ else {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 21 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema21::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Busqueda de registros de placas para el sistema 22 (DAKOTA)
    public function sistema22(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 22 POR TIPO DE SERVICIO, Y POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema22::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*Y SI NO EXISTE EL TIPO DE SERVICIO*/ else {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 22 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema22::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Busqueda de registros de placas para el sistema 43 (LAS FLORES SUR)
    public function sistema43(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 43 POR TIPO DE SERVICIO, Y PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema43::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTAO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*Y SI NO EXISTE EL TIPO DE SERVICIO*/ else {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 43 POR PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema43::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }

    // Busqueda de registros de placas para el sistema 44 (LAS FLORES NORTE)
    public function sistema44(Request $request)
    {
        // OBTENEMOS EL TIPO DE SERVICIO DEL REQUEST
        $servicio = $request->servicio;
        // SI EL TIPO DE SERVICIO EXISTE
        if ($servicio) {
            // REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO SISTEMA 44 POR TIPO DE SERVICIO, Y PLACA ORIGINAL O PLACA MODIFICADA
            $result = Sistema44::where('tipo_servicio_id',$servicio)->where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        } /*Y SI NO EXISTE EL TIPO DE SERVICIO*/ else {
            /*REALIZAMOS LA BUSQUEDA EN LA TABLA/MODELO  SISTEMA 44 POR PLACA ORIGINAL O PLACA MODIFICADA*/
            $result = Sistema44::where('placa_original',$request->placa)->OrWhere('placa_modificada',$request->placa)->get();
            // Y RETORNAMOS EL RESULTADO EN UNA RESPUESTA JSON
            return response()->json(['result'=>$result],201);
        }
    }
}
