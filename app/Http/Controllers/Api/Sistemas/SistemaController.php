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

class SistemaController extends Controller
{
    //
    public function searchSistema_0(Request $request)
    {
    	$result = Reconocimiento::where('Placa',$request->placa)->orderBy('Fecha','asc')->get();
    	return response()->json(['result'=>$result],200);
    }
    public function searchSistemaMenos1(Request $request)
    {
    	$result = Ticket::where('Placa',$request->placa)->orderBy('Folio','asc')->get();
    	return response()->json(['result'=>$result],200);
    }
    public function searchSistema_11(Request $request){
    	$result = ImagenPlaca11::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_13(Request $request){
    	$result = ImagenPlaca13::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_14(Request $request){
    	$result = ImagenPlaca14::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_15(Request $request){
    	$result = ImagenPlaca15::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_16(Request $request){
    	$result = ImagenPlaca16::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_17(Request $request){
    	$result = ImagenPlaca17::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_18(Request $request){
    	$result = ImagenPlaca18::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_19(Request $request){
    	// dd(ImagenPlaca19::first());
    	$result = ImagenPlaca19::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_21(Request $request){
    	// dd(ImagenPlaca21::first());
    	$result = ImagenPlaca21::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_22(Request $request){
    	// dd(ImagenPlaca22::first());
    	$result = ImagenPlaca22::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_43(Request $request){
    	// dd(ImagenPlaca43::first());
    	$result = ImagenPlaca43::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function searchSistema_44(Request $request){
    	// dd(ImagenPlaca44::first());
    	$result = ImagenPlaca44::where('placa_mod',"LIKE","% $request->placa%")->orWhereHas('velocidad',function (Builder $query) use($request)
    	{
    		$query->where('placa_original',$request->placa);
    	})->get();
    	return response()->json(['result'=>$result->load('velocidad')],200);
    }
    public function ImagenSistema_11(Request $request ){

        $result = ImagenesPlacas::where('placa_original',"LIKE" ,"%$request->placa%")->get();
        /*dd($result);*/
        return response()->json(['result'=>$result],200);
    }
}
