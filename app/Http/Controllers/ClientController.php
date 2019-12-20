<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//Discrima si exite login.
use Illuminate\Support\Facades\DB;//Opconal


class ClientController extends Controller
{
    //

    public function index(){
    	//$clients=\App\Client::all();
    	$clients=\App\Client::where('user_id', Auth::user()->id)->get();
    	/*opcion 2*/
    	//$user = DB::table('oauth_clients')->where('user_id',Auth::user()->id)->get();
    	//print_r($user);


    	$datos=Auth::user()->id;
    	//print_r($datos);
   		//print_r($clients);
    	return view('client',compact('clients'));

    }
}
