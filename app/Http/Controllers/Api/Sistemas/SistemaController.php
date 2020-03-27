<?php

namespace App\Http\Controllers\Api\Sistemas;

use App\Http\Controllers\Controller;
use App\Sistema_11\Imagenes;
use App\SistemaMenos1\Ticket;
use App\Sistema_0\Reconocimiento;
use App\Sistema_11\ImagenPlaca as ImagenPlaca11;
use App\Sistema_13\ImagenPlaca as ImagenPlaca13;
use App\Sistema_14\ImagenPlaca as ImagenPlaca14;
use App\Sistema_15\ImagenPlaca as ImagenPlaca15;
use App\Sistema_16\ImagenPlaca as ImagenPlaca16;
use App\Sistema_17\ImagenPlaca as ImagenPlaca17;
use App\Sistema_18\ImagenPlaca as ImagenPlaca18;
use App\Sistema_19\ImagenPlaca as ImagenPlaca19;
use App\Sistema_21\ImagenPlaca as ImagenPlaca21;
use App\Sistema_22\ImagenPlaca as ImagenPlaca22;
use App\Sistema_43\ImagenPlaca as ImagenPlaca43;
use App\Sistema_44\ImagenPlaca as ImagenPlaca44;
use App\Sistema_11\Imagenes as ImagenesPlacas;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


/**
*  CONTROLADOR PARA LAS BASES DE DATOS SQL SERVER DEL SERVIDOR 172.17.0.202 (EXTERNO)
*   
*/
class SistemaController extends Controller
{
    //Buscar registros de placas para el sistema 0 (CHURUBUSCO)
    public function searchSistema_0(Request $request)
    {
        // BUSCAMOS EN EL MODELO/TABLA RECONOCIMIENTO LOS REGISTROS CON LA COLUMNA PLACA IGUAL A LA 
        // PLACA A BUSCAR Y ORDENARLA POR FECHAS.
    	$result = Reconocimiento::where('Placa',$request->placa)->orderBy('Fecha','asc')->get();
        // OBTENIENDO EL RESULTADO LO RETORNAMOS EN UNA RESPUESTA JSON
    	return response()->json(['result'=>$result],200);
    }

    // Buscar registros de placas para el sistema -1 (CHURUBUSCO) 
    public function searchSistemaMenos1(Request $request)
    {
        // BUSCAMOS EN EL MODELO/TABLA TICKET LOS REGISTROS CON LA COLUMNA PLACA IGUAL A
        // LA PLACA A BUSCAR Y ORDENARLA POR FECHAS
    	$result = Ticket::where('Placa',$request->placa)->orderBy('Folio','asc')->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS UN UNA RESPUESTA JSON,
    	return response()->json(['result'=>$result],200);
    }

    // Buscar registros de placas para el sistema 11 (PATRIOTISMO)
    public function searchSistema_11(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA  IMAGENPLACA11 DONDE LA COLUMNA PLACA CONTENGA EL STRING DE LA
        // PLACA A BUSCAR, O QUE EN SU TABLA/MODELO RELACIÓN VELOCIDAD LA PLACA ORIGINAL SEA IGUAL A 
        // LA PLACA A BUSCAR
    	$result = ImagenPlaca11::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOWS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 13 (CONSULADO)
    public function searchSistema_13(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA IMAGENPLACA13 DONDE LA COLUMNA PLACA CONTENGA EL STRING DE LA PLACA A BUSCAR
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGIGAL IGUAL A LA PLACA A BUSCAR
    	$result = ImagenPlaca13::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 14 (CIUDAD UNIVERSITARIA)
    public function searchSistema_14(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA IMAGENPLACA14 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGIANL IGAL A LA PLACA A BUSCAR
    	$result = ImagenPlaca14::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 15 (CIRCUITO INTERIOR PONIENTE, SORIANA)
    public function searchSistema_15(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA IMAGENPLACA15 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODEL RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR
    	$result = ImagenPlaca15::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 16 (XOTEPINGO SUR)
    public function searchSistema_16(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_16 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR 
    	$result = ImagenPlaca16::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 17 (XOTEPINGO NORTE)
    public function searchSistema_17(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_17 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR
    	$result = ImagenPlaca17::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 18 (GENERAL ANAYA) 
    public function searchSistema_18(Request $request){
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_18 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR
    	$result = ImagenPlaca18::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 19 (FONDA ARGENTINA)
    public function searchSistema_19(Request $request){
    	// dd(ImagenPlaca19::first());
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_19 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR
    	$result = ImagenPlaca19::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 21 (EJE 3)
    public function searchSistema_21(Request $request){
    	// dd(ImagenPlaca21::first());
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_21 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR, 
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR.
    	$result = ImagenPlaca21::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 22 (DAKOTA)
    public function searchSistema_22(Request $request){
    	// dd(ImagenPlaca22::first());
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_21 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR.
    	$result = ImagenPlaca22::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 43 (LAS FLORES SUR)
    public function searchSistema_43(Request $request){
    	// dd(ImagenPlaca43::first());
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_43 DONE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR.
    	$result = ImagenPlaca43::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // Buscar registros de placas para el sistema 43 (LAS FLORES NORTE)
    public function searchSistema_44(Request $request){
    	// dd(ImagenPlaca44::first());
        // BUSCAMOS EN EL MODELO/TABLA IMAGEN_PLACA_44 DONDE LA COLUMNA CONTENGA EL STRING DE LA PLACA A BUSCAR,
        // O QUE EN SU TABLA/MODELO RELACIONAL VELOCIDAD TENGA LA PLACA ORIGINAL IGUAL A LA PLACA A BUSCAR.
    	$result = ImagenPlaca44::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
        // OBTENEMOS EL RESULTADO Y LO RETORNAMOS EN UNA RESPUESTA JSON.
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }

    // BUSCAR EN LA TABLA IMAGENES_PLACAS LAS IMAGENES DE LAS PLACAS ORIGINALES
    // EN DESHUSO EN ESPERA QUE ORDENEN LA ESTRUCTURA INTERNA DE LA BASE DE DATOS DE LA CAMARAS
    // public function ImagenSistema_11(Request $request ){

    //     $result = ImagenesPlacas::where('placa_original',"LIKE" ,"%$request->placa%")->get();
    //     /*dd($result);*/
    //     return response()->json(['result'=>$result],200);
    // }
}
