<?php

namespace App\Http\Controllers;

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

    public function incidentes(Request $request){

        $fecha = $request['fecha'];
        $fechaTexto = $this->obtenerFechaTexto($fecha);
        $incidentesDia = DB::select('SELECT * FROM incidentesHoy(?)',[$fecha]);

        $datos=[
            'incidentesdia'=>$incidentesDia,
            'fechaH'=>$this->fecha,
            'fechaTexto'=>$fechaTexto,
            'detalleincidente'=>array(),
            'menu_tabla'=>'activo',
            'menu_informacion'=>'ocultar'
        ];

        return view('incidentes.incidentes',$datos);
    }

    public function post_incidentes(Request $request){

        $serie=$request['serie'];
        $detalleincidente=DB::select('SELECT * FROM detalleSerie(?)',[$serie]);
        $fecha=$this->fecha;
        $fechaTexto=$this->obtenerFechaTexto($fecha);

        $datos=[
            'incidentesdia'=>array(),
            'fechaH'=>$this->fecha,
            'fechaTexto'=>$fechaTexto,
            'detalleincidente'=>$detalleincidente,
            'serie'=>$serie,
            'menu_tabla'=>'',
            'menu_informacion'=>'activo'
        ];

        return view('incidentes.incidentes',$datos);
    }

    public function detalleSerie(Request $request){

        return "Funcion detalleSerie";
    }

    public function actualizarIncidente2(Request $request){

        return "Funcion actualizarIncidente2";
    }


    public function reportepdf(Request $request){

        $serie = $incidente['serie'];
        $detalleincidente = DB::select('SELECT * FROM detalleSerie(?)',[$serie]);

        $parametros=array(
            'serie'=>$serie,
            'incidente'=>$detalleincidente[0]
            );

        $html = View('PDF.incidente_reporte_pdf',$parametros)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $hrs=date('h:i:s');
        $NOMBREPDF="incidente_".$this->fecha.'_'.$hrs;

        return $pdf->download($NOMBREPDF.'.pdf');
        //return $pdf->stream();
    }

    public function vistanuevoincidente(Request $request){

        return "Funcion vistanuevoincidente";
    }



    public function vistaregistroincidente(Request $request){
        $incidente = $request['data']['nombreIncidente'];
        $estado = $request['data']['nombreEstado'];
        $id_usr= Auth::user()->id;

        $idIncidente = (DB::table('incidentes_json')->select('info->id as clave')->where('info->Incidente', $incidente )->get())[0]->clave;

        $prefijoEdo = (DB::table('estados')->select('prefijo')->where('nombre', $estado )->get())[0]->prefijo;

        $localidades = DB::table($prefijoEdo)->select('info->lat_loc AS lat','info->lon_loc AS lon','info->nombre_edo AS edo','info->nombre_mun AS mun','info->nombre_loc AS loc')->get();

        $datos = [
            'fecha'=>$this->fecha,
            'hora'=>$this->hora,
            'idUsuario'=>$id_usr,
            'idIncidente'=>$idIncidente,
            'nombreIncidente'=>$incidente,
            'nombreEstado'=>$estado,
            'localidades'=>$localidades,
            'prefijoEdo'=>$prefijoEdo
        ];

        return $datos;

    }

    public function vistaregistroincidenteDashboard(Request $request){

        $estados = DB::table('estados')->select('nombre', 'prefijo')->get();
        $cni = DB::table('incidentes_json')->select('info->Incidente AS Incidente')->get();
        $id_usr= Auth::user()->id;
        $incidentes = [];
        $edos = [];

        foreach ($cni as $valor) {
            $incidentes[] = $valor->Incidente;
        }
        foreach ($estados as $edo) {
            $edos[] = $edo->nombre;
        }

        $datos=[
            'incidentes'=>json_encode($incidentes),
            'estados'=>json_encode($edos),
            'idUsuario'=>$id_usr
        ];

        return view('dashboard', $datos);

    }


    public function postregistroincidente(Request $request){

        $incidente=$request['data'];
        $lat=$request['data']['latitud'];
        $long=$request['data']['longitud'];
        $ubicacion_espe=array('lat' => $lat , 'long' => $long );
        $ubicacionespecifica=json_encode($ubicacion_espe);
        $dependencia=$request['data']['dependencia'];
        $nombretrabdep=$request['data']['nombretrabdep'];
        $cargotrabdep=$request['data']['cargotrabdep'];
        $idinc=intval($incidente['idIncidente']);
        $respuestainstit=array('dependencia' => $dependencia, 'nombretrabdep' => $nombretrabdep, 'cargotrabdep' => $cargotrabdep );
        $respuestainstitucional=json_encode($respuestainstit);
        if ($incidente['status']==1) {
            $status=true;
        }else {
            $status=false;
        }
        if ($incidente['personasAfectadas']=='' ){

            $incidente['personasAfectadas']= 0;
        }
        if ($incidente['personasEvacuadas']=='' ){

            $incidente['personasEvacuadas']= 0;
        }
        if ($incidente['personasDesaparecidas']=='' ){

            $incidente['personasDesaparecidas']= 0;
        }
        if ($incidente['personasLesionadas']=='' ){

            $incidente['personasLesionadas']= 0;
        }
        if ($incidente['personasFallecidas']=='' ){

            $incidente['personasFallecidas']= 0;
        }

        $parametros=array(
            $incidente['descripcion'],
            $incidente['nombreLocalidades'],
            $ubicacionespecifica,
            $incidente['otro'],
            $incidente['fechaOcurrencia'],
            $incidente['horaOcurrencia'],
            $incidente['fechaOcurrencia'],
            $incidente['horaOcurrencia'],
            $incidente['medidasControl'],
            $incidente['personasAfectadas'],
            $incidente['personasEvacuadas'],
            $incidente['personasDesaparecidas'],
            $incidente['personasLesionadas'],
            $incidente['personasFallecidas'],
            $incidente['danosColaterales'],
            $incidente['infraestructuraAfectada'],
            $incidente['afectacionVial'],
            $respuestainstitucional,
            $idinc,
            $incidente['prefijoEdo'],
            $incidente['radioNivelImpacto'],
            $incidente['tipoSeguimiento'],
            $status,
            $incidente['idUsuario']
        );




        //dd($parametros);
       // $tasks=DB::select('SELECT * from insertincidentes(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$parametros);

        //return redirect()->route('incidentes', ['fecha'=>$this->fecha]);
        return $parametros;


    }

    public function obtenerFechaTexto($fecha){
        $fechaHoy=$this->invertirfecha($fecha);
        $fechaHoy=explode("-",$fechaHoy);
        $meses=array(
            "de Enero"=>"01",
            "de Febrero"=>"02",
            "de Marzo"=>"03",
            "de Abril"=>"04",
            "de Mayo"=> "05",
            "de Junio"=>"06",
            "de Julio"=>"07",
            "de Agosto"=>"08",
            "de Septiembre"=>"09",
            "de Octubre"=>"10",
            "de Noviembre"=>"11",
            "de Diciembre"=>"12",
            );
        foreach ($meses as $key => $value) {
            if ($value == $fechaHoy[1]) {
                $fechaTexto=$fechaHoy[0]." ".$key." ".$fechaHoy[2];
           }
        }
        return $fechaTexto;
    }

    public function invertirfecha($fecha){
        $res=$fecha;
        if($fecha!=''){
           $arrfecha=explode("-",$fecha);
           $f_ingles=array_reverse($arrfecha);
           $res=$fechaing=join("-",$f_ingles);
        }
        return $res;
    }



    public function listareportepdf(Request $request){

        $parametros = array(
            'lista_incidentes'=> json_decode($request['lista_incidentes'])
        );

        $html = View('PDF.lista_incidentes_reporte_pdf',$parametros)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $hrs=date('h:i:s');
        $NOMBREPDF="lista_incidentes_".$this->fecha.'_'.$hrs;
        return $pdf->download($NOMBREPDF.'.pdf');
        //return $pdf->stream();
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
}
