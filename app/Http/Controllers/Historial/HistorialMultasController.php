<?php

namespace App\Http\Controllers\Historial;

use App\CamarasUbicacion;
use App\Http\Controllers\Controller;
use App\RegistroPlaca;
use App\TipoServicio;
use Illuminate\Http\Request;

class HistorialMultasController extends Controller
{
    public $camaras;
    public function __construct()
    {
        $this->camaras = CamarasUbicacion::get();
    }
    //
    public function index(){
    	return view('historial.index',['camaras'=>$this->camaras]);
    }

    public function buscarPlaca(Request $request)
    {
    	$request->validate(
    		[
    			'placa'=>'required|regex:/^([a-h,A-H,j-n,J-N,p-z,P-Z,0-9]{4,7})$/'
    		],
    		[
    			'required'=>'La placa es requerida.',
    			'regex'=>'La placa no es valida.'
    		]
        );


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
            // TODO aqui va la busqueda de repuve
            return view('historial.index',['placa'=>$registro_placa,'camaras'=>$this->camaras]);
        }
        else{
            return redirect()->route('historial.index',['camaras'=>$this->camaras])->withErrors(['fail'=>'La Placa no es valida.'])->withInput();
        }
    }
}
