<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    //
	public function inicio(Request $request){
		return response()->json(['estado'=>true]);
	}

}
