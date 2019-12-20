<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;//para poder usar la base de datos

class apiController extends Controller
{
    public function inicioApi(Request $request){
    $prefijo=$request['pais'];
    //$tasks=DB::select('SELECT suma()AS nb')[0]->nb;
    //$tasks=DB::select('SELECT suma(?,?)AS nb',[$param1,$param2]);
    //$tasks=DB::select('SELECT usr(?) as nb',[$param1])[0]->nb;
    $tasks=DB::select('SELECT * from ps_estados(?)',[$prefijo]);
    //print_r($tasks);
    return $tasks;
    //return response()->json(['estado'=>true]);
    }

    #listar municipios
    public function lsestado(Request $request){
        $prefijo=$request['estado'];
        $tasks=DB::select('SELECT * from ps_municipios(?)',[$prefijo]);
        return $tasks;
    }

    #listar localidades
    public function lsmunicipio(Request $request){
        $prefijo=$request['estado'];
        $municipio=$request['municipio'];
        $tasks=DB::select('SELECT * from ps_localidades(?,?)',[$prefijo,$municipio]);
        return $tasks;
    }

        #listar usuarios
    public function lsusuarios(Request $request){
        $tasks=DB::select('SELECT * from usuariios');
        return $tasks;
    }

    #registrar nuevo usuarios
    public function registrarUsuario(Request $request){
        $usuario = new Usuario;
        $usuario->nombres =  $request['nombres'];
        $usuario->apellido_paterno =  $request['apellido_paterno'];
        $usuario->apellido_materno =  $request['apellido_materno'];
        $usuario->alias =  $request['alias'];
        $usuario->correo =  $request['correo'];
        $usuario->f_registro =  $request['f_registro'];
        $usuario->f_alta =  $request['f_alta'];
        $usuario->f_baja =  $request['f_baja'];
        $usuario->f_edicion =  $request['f_edicion'];
        $usuario->h_registro =  $request['h_registro'];
        $usuario->h_alta =  $request['h_alta'];
        $usuario->h_baja =  $request['h_baja'];
        $usuario->h_edicion =  $request['h_edicion'];
        $usuario->contrasena =  $request['contrasena'];
        $usuario->roles =  $request['roles'];
        $usuario->status =  $request['status'];
        $usuario->token =  $request['token'];
        $usuario->telefono =  $request['telefono'];
        $usuario->idusr_alta =  $request['idusr_alta'];
        $usuario->idusr_baja =  $request['idusr_baja'];
        $usuario->idusr_edicion =  $request['idusr_edicion'];
        $usuario->save();
        echo "insercion exitosa";
    }
    #listar fenomenos registrados por fechas
    public function incidente_select(Request $request){
        //$prefijo=$request['estado'];
        $reqfechas=$request['fechas'];
        $reqfechas=explode("_",$reqfechas);
        $fecha1=$reqfechas[0];
        $fecha2=$reqfechas[1];
        $tasks=DB::select('SELECT * from api_incidente_select(?,?)',[$fecha1,$fecha2]);

        $features = array();


        foreach($tasks as $key => $value) {
           /*
            $zonas=$value->zonas_afectadas;
            $decodificado=json_decode($zonas);

           */
            //$prepare=json_encode( $value, JSON_UNESCAPED_UNICODE );
            //$dt_incidente=str_replace("\\","",$prepare);

            $ubicacion=$value->ubicacion_especifica;
            $decodificado=json_decode($ubicacion);

            $features[] = array(
                  'type' => 'Feature',
                  'properties' => array('title' => 'incidentes','description'=> $value, 'showpointincidentes'=> true,
                     'image'=>'incidentes.png' ),
                  'geometry' => array('type' => 'Point', 'coordinates' => array((float)$decodificado->lat,(float)$decodificado->long )),

            );

         }

        $datosfeatures=array("type"=>"FeatureCollection",
                             "features"=>$features
                             );

        //$prepare=json_encode($datosfeatures, JSON_UNESCAPED_UNICODE );
        //$dt_incidente=str_replace("\\","",$prepare);

        return $datosfeatures;
    }

  //INSERTAMOS UN INCIDENTE DE TIPO VACIO PARA PODER GENERAR UNA SERIA
  public function incidente_serie(Request $request){
        $incidente=$request['incidente'];
        $parametros=array(
            $incidente['codigo'],
            $incidente['prefijo_estado']
        );

        $tasks=DB::select('SELECT * from api_incidente_serie(?,?)',$parametros);
        $serie=$tasks[0]->api_incidente_serie;
        $resp=array(
            "status"=>"200",
            "serie"=>$serie
        );
        return $resp;
     }


     public function incidente_update(Request $request){
        //$usuario=$request['usuario'];
        //$token=$request['token'];
        $incidente=$request['incidente'];

        $parametros=array(
                $incidente["serie"],
                $incidente["descripcion"],
                json_encode($incidente["lugaresafectados"]),
                json_encode($incidente["ubicacionespecifica"]),
                $incidente["otro"],
                $incidente["fecharegistro"],
                $incidente["horaregistro"],
                $incidente["fechaocurrencia"],
                $incidente["horaocurrencia"],
                $incidente["medidascontrol"],
                $incidente["personasafectadas"],
                $incidente["personasevacuadas"],
                $incidente["personasdesaparecidas"],
                $incidente["personaslesionadas"],
                $incidente["personasfallecidas"],
                $incidente["danoscolaterales"],
                $incidente["infraestructuraafectada"],
                $incidente["afectacionvial"],
                json_encode($incidente["respuestainstitucional"]),
                $incidente["clave"],
                $incidente["prefijoestado"],
                $incidente["radioNivelImpacto"],
                $incidente["tiposeguimiento"],
                $incidente["status"],
                $incidente["id_usuario"],
                json_encode($incidente["dependencias"])
        );

        $tasks=DB::select('SELECT * from api_incidente_update(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$parametros);

        $serie=$tasks[0]->api_incidente_update;
        $resp=array(
            "status"=>"200",
            "serie"=>$serie
        );
        //print_r($tasks);
        return $resp;
     }


     public function reportedependencias(Request $request){
        //$usuario=$request['usuario'];
        //$token=$request['token'];
        $incidente=$request['incidente'];
        $serie=$incidente['serie'];
        $reporte_dependencias=array($incidente['reporte_dependencias']);


        $parametros=array(
            $serie,
            json_encode($reporte_dependencias)
        );
        $tasks=DB::select('SELECT * FROM api_incidente_reportedependencias(?,?)',$parametros);

        return $tasks;
        //$serie=$tasks[0]->api_incidente_update;
        //$resp=array(
        //    "status"=>"200",
        //    "serie"=>$serie
        //);
        //print_r($tasks);
        //return $resp;
     }


    #registar nuevo incidente
    public function incidente_insert(Request $request){
        //$usuario=$request['usuario'];
        //$token=$request['token'];
        $incidente=$request['incidente'];
        //print_r($incidente);
        $parametros=array(
                $incidente["descripcion"],
                json_encode($incidente["lugaresafectados"]),
                json_encode($incidente["ubicacionespecifica"]),
                $incidente["otro"],
                $incidente["fecharegistro"],
                $incidente["horaregistro"],
                $incidente["fechaocurrencia"],
                $incidente["horaocurrencia"],
                $incidente["medidascontrol"],
                $incidente["personasafectadas"],
                $incidente["personasevacuadas"],
                $incidente["personasdesaparecidas"],
                $incidente["personaslesionadas"],
                $incidente["personasfallecidas"],
                $incidente["danoscolaterales"],
                $incidente["infraestructuraafectada"],
                $incidente["afectacionvial"],
                json_encode($incidente["respuestainstitucional"]),
                $incidente["clave"],
                $incidente["prefijoestado"],
                $incidente["radioNivelImpacto"],
                $incidente["tiposeguimiento"],
                $incidente["status"],
                $incidente["id_usuario"],
                json_encode($incidente["dependencias"])
        );

        #echo '<pre>';
        #print_r($incidente);
        #echo '</pre>';
        $tasks=DB::select('SELECT * from api_incidente_insert(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',$parametros);
        //print_r($tasks);
        return $tasks;
     }

}
