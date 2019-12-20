<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class camarasController extends Controller
{
    //
    public function vistaregistrar(Request $request){

    	$estados=DB::table('estados')->select('nombre', 'prefijo')->get();
    	$edos = [];
    	foreach ($estados as $edo) {
            $edos[] = $edo->prefijo.'_'.$edo->nombre;
        }

    	$datos = [
    		'estados'=>$estados
    	];




    	return view('camaras.insert',$datos);


    }
    public function registrocamara(Request $request ){

  //  dd($request);

    	$array = json_decode(DB::table('estados')->select('prefijo')->where('nombre', $request['estado'])->get());
		$ubicacion = [
			'lat'=>$request['latitud'],
			'long'=>$request['longitud'],
			'nombre_edo'=>$request['estado'],
            'prefijo_edo'=>$array[0]->prefijo

					];
		$ubicacionjson = json_encode($ubicacion);

//dd($array[0]->prefijo);

		$parametros = array(

			$request['nombre'],
			$request['descripcion'],
			$request['tipo'],
			$request['marca'],
			$request['usuario'],
			$request['contrasenia'],
			$request['ip'],
			$request['puerto'],
			$ubicacionjson,
			$request['radio_status'],
			$request['protocolo'],
			$request['nube'],
			$request['propietario'],
			$request['gateway'],
			$request['urlup'],
			$request['urldown'],
			$request['mac'],
			$request['imei'],
			$request['radio_compartir']
							);



$tasks=DB::select('SELECT * from vista_camara_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$parametros);


    	return redirect('/camaras/camaras');
    }




    public function post_actualizarcamara(Request $request){
        $array = json_decode(DB::table('estados')->select('prefijo')->where('nombre', $request['estado'])->get());
        $ubicacion = [
            'lat'=>$request['latitud'],
            'long'=>$request['longitud'],
            'nombre_edo'=>$request['estado'],
            'prefijo_edo'=>$array[0]->prefijo

                    ];
        $ubicacionjson = json_encode($ubicacion);

        $parametros = array(

            $request['id_camara'],
            $request['nombre'],
            $request['descripcion'],
            $request['tipo'],
            $request['marca'],
            $request['usuario'],
            $request['contrasenia'],
            $request['ip'],
            $request['puerto'],
            $ubicacionjson,
            $request['radio_status'],
            $request['protocolo'],
            $request['nube'],
            $request['propietario'],
            $request['gateway'],
            $request['urlup'],
            $request['urldown'],
            $request['mac'],
            $request['imei'],
            $request['radio_compartir']
                            );

        //dd($parametros);
        $tasks=DB::select('SELECT * from vista_camara_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$parametros);





    	return redirect('/camaras/camaras');


    }



    public function actualizarcamara(Request $request){
    	$id_camara = $request['id_camara'];
    	$detallecamara=DB::table('camaras')->where('id', $id_camara)->get();
    	$estados=DB::table('estados')->select('nombre', 'prefijo')->get();



    	$edos = [];
    	foreach ($estados as $edo) {
            $edos[] = $edo->prefijo.'_'.$edo->nombre;
        }

       // $ubicacion = json_decode($detallecamara->ubicacion);
        //$latitud = $ubicacion->lat;
        foreach ($detallecamara as $key => $cam) {

            $ubicacion = json_decode($cam->ubicacion);
            $latitud = $ubicacion->lat;
            $longitud = $ubicacion->long;
            $nombreestado = $ubicacion->nombre_edo;

        }

    	$datos = [
    		'detallecamara'=>$detallecamara,
    		'estados'=>$estados,
            'latitud'=>$latitud,
            'longitud'=>$longitud,
            'nombreestado'=>$nombreestado
    	];





    	return view('camaras.update',$datos);


    }


    public function vistacamaras(Request $request){
    	$camaras=DB::select('SELECT * FROM camaras');
    	$estados=DB::table('estados')->select('nombre', 'prefijo')->get();
        $listacamaras = [];
        foreach ($camaras as $key => $cam) {
            $ubicacion = json_decode($cam->ubicacion);
            $nombreestado = $ubicacion->nombre_edo;
            $listacamaras[] = $cam->nombre.'-'.$nombreestado.'-'.$cam->id;
        }

    	$edos = [];
        $detallescamara = [];
    	foreach ($estados as $edo) {
            $edos[] = $edo->prefijo.'_'.$edo->nombre;
        }

    	$datos = [
    		'camaras'=>$camaras,
    		'estados'=>json_encode($edos),
            'detallescamara'=>$detallescamara,
            'listacamaras'=>$listacamaras
    	];


    	return view('camaras.camaras',$datos);


    }

    public function detallescamara(Request $request){
    	$camaras=DB::select('SELECT * FROM camaras');
        $id_camara = $request['id_camara'];
    	$detallescamara=DB::table('camaras')->where('id', $id_camara)->get();
    	$datos = [
    		'detallescamara'=>$detallescamara,
            'camaras'=>$camaras
    	];




    	return view('camaras.camaras',$datos);

    }

    public function visor(Request $request){
        /*$id_camara = $request['camara'];
        $detallescamara=DB::table('camaras')->select('url_downtrasmision as hlsvideo')->where('id', $id_camara)->get();
        $video=$detallescamara[0];
        //dd($video->{'hlsvideo'});
        $params=array(
        "hlsv"=>$video->{'hlsvideo'}
      );*/
        //print_r($params);
        return view('camaras.visor');
    }

    public function buscarCamaras(Request $request){
        $data = $request['data'];
        $tipobusqueda = $data['tipobusqueda'];
        $parametro = $data['parametro'];

        if($tipobusqueda == "t"){
            $consulta_camaras = DB::table('camaras')->where('nombre', $parametro)->get();
        }
        elseif($tipobusqueda == "f"){
            $consulta_camaras = DB::table('camaras')->where('ubicacion->nombre_edo', $parametro)->get();
        }

        $datos = [
            'consultacamaras'=>$consulta_camaras
        ];

        return $datos;

    }


}
