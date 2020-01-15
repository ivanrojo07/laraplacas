<?php

namespace App\Http\Controllers\Api;

use App\CamarasUbicacion;
use App\Http\Controllers\Controller;
use App\Imagen;
use App\ImgPlaca;
use App\Placas;
use App\RegistroPlaca;
use App\Sistema;
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

    /*
     * FUNCIÓN PARA BUSCAR REALIZAR EL REGISTRO DE PLACAS
     * BUSCADAS Y SU RESULTADO
     */
    public function sendPlaca(Request $request)
    {
    	// Validamos que el input placa cumpla
    	// con el formato y sea requerido.
    	$validate = Validator::make(
					$request->all(),
					[
		    			'placa'=>'required|regex:/^([a-h,A-H,j-n,J-N,p-z,P-Z,0-9]{4,7})$/'
		    		],
		    		[
		    			'required'=>'La placa es requerida.',
		    			'regex'=>'La placa no es valida.'
		    		]);
    	// Si la validación falla
    	if ($validate->fails()) {
    		// Retornamos una respuesta en json con el error mostrado
    		return response()->json(['errors'=>$validate->errors()],422);
    	}
    	// Si pasa la validación.
    	else{
    		// Obtenemos la placa en mayuscula (sí hay registros
    		// en minusculas las convertimos en mayusculas).
	    	$placa = strtoupper($request->placa);
	    	// Obtenemos los tipos de servicio que tenga la longitud de la placa buscada.
	        $tipo_servicios = TipoServicio::where('longitud',strlen($placa))->get();
	        // Recorremos el resultado de los tipos de servicios resultantes
	        foreach ($tipo_servicios as $patron) {
	        	// Y verificamos si se verifica con la expresión regular.
	            if(preg_grep($patron->expresion,[$placa])){
	            	// guardamos el tipo de servicio dado a una variable
	                $servicio = $patron;
	            }
	        }
	        // Verificamos que la variable servicio exista y no sea nula
	        if (isset($servicio)) {
	        	// Llamamos a la función para crear o actualizar
	        	// el modelo placa que coincida con la placa buscada.
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
	        	// BUSCAR INFORMACIÓN DEL REPUVE
	        	/* 
	        	 *
	        	 *	TODO 
	        	 *
	        	 */
	        	// Retornamos el objeto json con la placa resultante y su relación con tipo de servicio
    			return response()->json(['placa'=>$registro_placa->load('tipo_servicio')],201);

	        } 
	        // Si no encontramos el tipo de servicio significa que la placa no existe
	        else {
	        	// Retornamos una respuesta con el error de que la placa no es valida.
	        	return response()->json(['errors'=>['placa'=>['La placa no es valida.']]],422);
	        }
    	}

    }

    /*
     *
     * FUNCIÓN QUE RETORNA TODAS LAS CAMARAS
     * REGISTRADAS EN EL SISTEMA
     *
     */
    public function getCamaras()
    {
    	// Obtenemos todos los registros de camaras
    	$camaras = CamarasUbicacion::orderBy('sistema','asc')->get();
    	// retornamos la respuesta con el arreglo de camaras.
    	return response()->json(['camaras'=>$camaras], 201);
    }

    public function search_placa(Request $request)
    {
    	// Validamos que el input placa cumpla
    	// con el formato y sea requerido.
    	$validate = Validator::make(
					$request->all(),
					[
		    			'placa'=>'required|regex:/^([a-h,A-H,j-n,J-N,p-z,P-Z,0-9]{4,7})$/'
		    		],
		    		[
		    			'required'=>'La placa es requerida.',
		    			'regex'=>'La placa no es valida.'
		    		]);
    	// Si la validación falla
    	if ($validate->fails()) {
    		// Retornamos una respuesta en json con el error mostrado
    		return response()->json(['errors'=>$validate->errors()],422);
    	}
    	// Si pasa la validación.
    	else{
    		// Obtenemos la placa en mayuscula (sí hay registros
    		// en minusculas las convertimos en mayusculas).
	    	$placa = strtoupper($request->placa);

	    	$historial = ImgPlaca::where('placa',$placa)->get();

	    	return response()->json(['historial'=>$historial->load('sistema_11')],200);
    	}
    }

    public function prueba()
    {
    	$imagen_prueba = Imagen::first();
    	// dd($imagen_prueba->with('sistema'));

    	return response()->json(['prueba'=>$imagen_prueba->load('sistema')],201);
    }


}
