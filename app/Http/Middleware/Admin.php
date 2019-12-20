<?php

namespace App\Http\Middleware;

use Closure;


use Illuminate\Support\Facades\DB;//para poder usar la base de datos
use App\User;//Modelo usuarios



class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        ///dd("Hola desde el middleware");
        //**print_r(json_encode($request));

        //print_r(json_encode($request->expectsJson()));
        /*
        if (! $request->user()->hasRole($role)) {
            // Redirect...
        }*/

        //***return $next($request);
         //if(auth()->user()->isAdmin == 1){
        //if(auth()->user()->id == 2){
        
        $usrdata=User::select()->where('id', '=', auth()->user()->id)->get();

        if($usrdata[0]->token == 'ZzNnZ3NJUWNPNEdNMVNmTHp6WVc1UFg5dXhjRTBKam1jUXdEdnF0NXZHN0x0VEJwdW82NkxKMzcxQ2ZC5cabd7c5819d4'){
            return $next($request);
        }
        return redirect('login')->with('error','You have not admin access');



    }
}