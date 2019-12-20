<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

// toKEN GRANT

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;//encrypt 


use App\User;//Modelo usuarios
use Illuminate\Support\Facades\DB;//para poder usar la base de datos
///




class developerController extends Controller
{
    





    ##*************************************************    
    public function dashboard(Request $request){
      //$apiToken = uniqid(base64_encode(str_random(60)));
      //return view('developer.select',array('token'=>$apiToken));
      return view('developer.dashboard');
    }


    ##*************************************************    
    public function perfil(Request $request){
      //$apiToken = uniqid(base64_encode(str_random(60)));
      //return view('developer.select',array('token'=>$apiToken));
      $id=auth()->user()->id;
      $selecttoken=DB::table('tokensdevelop')->select('acces_token','refresh_token','fecha')->where('id_user', '=', $id)->get();

      $usrdata=User::select( 'id','name','nombres','apellido_paterno','apellido_materno','telefono','email','f_registro','f_alta','f_baja','h_alta','h_baja','h_edicion','status')->where('id', '=',$id)->get();
      
      $dtstoken=json_decode('{"acces_token":"","refresh_token":"","fecha":""}');

      if($selecttoken->count() > 0){
        $dtstoken=$selecttoken[0];
      }
      //return $usrdata;

    //echo "<pre>";
    //print_r($dtstoken);
    //echo "</pre>";
      return view('developer.perfil',array('usrdata'=>$usrdata[0],'dtstoken'=>$dtstoken));
    }

    ##*************************************************
    public function gettoken(Request $request){

        return view('developer.getToken');
    }
    ##*************************************************
    public function autenticartoken(Request $request){
    

     $status=array(
            'status'=>false
          );
    //password
   //if (Hash::check('secret', $hashedPassword))
    $hashedPassword=auth()->user()->password;
    if(Hash::check($request->password,$hashedPassword))
    {
        // The passwords match...
        print_r("autenticacion Conrrecta !!!!");

        $getTokens=DB::table('oauth_clients')->select('id','secret')->where('name', '=', 'grant')->get();
        $grantToken=$getTokens[0];
        $ID=$grantToken->id;
        $TOKEN=$grantToken->secret;
        $id=auth()->user()->id;
        $email=auth()->user()->email;

        $http = new \GuzzleHttp\Client;

        $host = $request->getSchemeAndHttpHost();
        $response = $http->post($host.':/oauth/token', [
        'form_params' => [
            'grant_type' =>'password',
            'client_id' => $ID,
            'client_secret' => $TOKEN,
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '',
        ],
        ]);
          $body = $response->getBody();
          $tkn=json_decode($body);
          $id=auth()->user()->id;
          $tokenexist=DB::table('tokensdevelop')->select()->where('id_user', '=', $id)->get();

          if($tokenexist->count()){
               //Ya existe*** Actualizar registro
              $affected=DB::table('tokensdevelop')
                    ->where('id', $id )
                    ->update([
                    'acces_token'=>$tkn->access_token,
                    'refresh_token'=>$tkn->refresh_token,
                    'fecha'=>Date('Y-m-d')
              ]);
          
          }else{
              //NO existe***hay que registrar
              $affected=DB::table('tokensdevelop')->insert([
                  'acces_token'=>$tkn->access_token,
                  'refresh_token'=>$tkn->refresh_token,
                  'fecha'=>Date('Y-m-d'),
                  'id_user'=>$id
              ]);
          }

          $status=array(
            'status'=>true
          );
          //return redirect('/developer/perfil');
        return redirect()->route('developer.perfil');
    }else{
        return redirect()->route('developer.gettoken');
    }

  

//return redirect('/developer/perfil');

}

    ##*************************************************
    public function refreshtoken(Request $request){

    $http = new \GuzzleHttp\Client;
    $response = $http->post('http://localhost/oauth/token', [
    'form_params' => [
        'grant_type' =>'refresh_token',
        'refresh_token' => 'def50200074c972ab5c3604069a5d4b1e62f8e810aa1c25eeb52d465cb8cf9af0a9b84625a114d98d36dc0c6b965acf74d1cf26a366d90969bfe82f6c3014b23cba67294ff748ee47710fef73a02c2f78e682efb88c4c7163a87b5bdbbb907969a8af50a4dbbd6367c630690bfbbeff0244efd721d6b21ca4e56a2027da93782deb411085166a7e97956fc7a9eb9fd8fb1ab2de450de1231a60357028685859c845ddb340fe63b1a0a2d6e1172c72eb59d493470df4525e219b0941f2f563bd32a3d74db277dfe357b7f8794f8b602addd9b55d8c2079baae82009cdb2acc15236cf081d6f39b242f783fcb39a5201229d0cf0607cec9a45da4010b555eecfd1ed375c22e5e1e6ed743fe65e7fb1349d3cae3a73874589afbf7103d89009fef7ce77323e52d1206213cc997757c7f625f4cff6daedc69d6393ae1779781634418367a00fa663ff209d943f3a99d93590f7c8d0b65bee693bdf2cf0eec79d623778',
        'client_id' => 1,
        'client_secret' => 'T2XlrVweCGiLJ31wzGP3X4WCfvBYFIIEU5L98VuY',
        'scope' => '',
    ],
    ]);


    
    return $response;

    }



    ##*************************************************
    public function registrar(Request $request){
      //$apiToken = uniqid(base64_encode(str_random(60)));
      //return view('developer.select',array('token'=>$apiToken));
      return view('developer.resgistar');

    }



    ##*************************************************
    public function insertdevelop(Request $request){

      $contenido=array(
                  $request['name'],
                  $request['nombres'],
                  $request['apellido_paterno'],
                  $request['apellido_materno'],
                  $request['telefono'],
                  $request['email'],
                  $request['password'],
                  $request['password_confirmation']
                  );

      $affected=DB::table('users')->insert([
      'name'=>$request['name'],
      'nombres'=>$request['nombres'],
      'apellido_paterno'=>$request['apellido_paterno'],
      'apellido_materno'=>$request['apellido_materno'],
      'telefono'=>$request['telefono'],
      'email'=>$request['email'],
      'password' => Hash::make($request['password']),
      'token'=>'ZzNnZ3NJUWNPNEdNMVNmTHp6WVc1UFg5dXhjRTBKam1jUXdEdnF0NXZHN0x0VEJwdW82NkxKMzcxQ2ZC5cabd7c5819d4',
    ]);
    //print_r($affected);
    //return $affected;
    //dd($contenido);
    //$apiToken = uniqid(base64_encode(str_random(60)));
    //return view('developer.select',array('token'=>$apiToken));
    return redirect('/developer/registrar');
    //return "hola";

    }

    public function insert(Request $request){
      //$apiToken = uniqid(base64_encode(str_random(60)));
      //return view('developer.select',array('token'=>$apiToken));
      return view('developer.insert');

    }
    public function select(Request $request){
      $apiToken = uniqid(base64_encode(str_random(60)));
      return view('developer.select',array('token'=>$apiToken));
    }

    public function validarCorreo(Request $request){

      $correoExistente = DB::table('users')->where('email', $request['correo'])->get();;
      if(strlen($correoExistente) > 2){
        $validar = "0";
      }else{
        $validar = "1";
      }

      return $validar;
    }

}
