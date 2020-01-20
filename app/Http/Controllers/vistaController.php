<?php

namespace App\Http\Controllers;

use App\PlacasSQL;
use App\Sistema_11\ImagenVelocidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use Illuminate\Support\Facades\App;

class vistaController extends Controller
{
    protected $fecha;
    protected $hora;

    public function __construct()
    {
        #Permite verifcar usuarios autenticado
        //$this->middleware('auth');
        $this->fecha = Date('Y-m-d');
        $this->hora = Date('H:i');
    }

    public function index(Request $request){

      return "Hola mensaje de prueba";
    }

    public function dashboard(Request $request){

        return view('dashboard');
    }
    public function usuarios(Request $request){

        //$fecha = $request['fecha'];
        //$fechaTexto = $this->obtenerFechaTexto($fecha);
        //$estados = DB::table('estados')->select('nombre', 'prefijo')->get();
        $usuarios = DB::table('users')->select('*')->get();

        $datos=[
            'usuarios'=>$usuarios
        ];

        return view('home', $datos);
    }
    public function PlacasSQL(Request $request){
        $result = PlacasSQL::find('14')->inRandomOrder()->take(6)->get();
        /*dd($result[0]->imagen2);*/
        return response()->json(['placa'=>$result],200);
    }
}
