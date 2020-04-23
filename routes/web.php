<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['admin'])->group(function () {
    Route::get('/test', function () {

        $usrdata=User::select()->where('id', '=', auth()->user()->id)->get();
        return $usrdata[0]->token;
    });

    //**************************************************
    //**************************************************
    //******RUTAS DE USUARIOS ********************
    /* Route::prefix('/usuario')->group(function () {
        Route::get('/insert','adminusrController@insert')->name('usuario.insert')->middleware('permission:role.index');
        Route::get('/select','adminusrController@select')->name('usuario.select')->middleware('permission:role.index');
        Route::get('/delete','adminusrController@delete')->name('usuario.delete')->middleware('permission:role.index');
        Route::post('/update','adminusrController@update')->name('usuario.update')->middleware('permission:role.index');
        Route::post('/find','adminusrController@find')->name('usuario.find')->middleware('permission:role.index');
        //Route::post('/test',function(){
        //  return "Hola esto es una prueba";
        //});
    }); */

    //**************************************************
    //**************************************************
    //******RUTAS DE USUARIOS DESARROLLO ***************
    /*Route::prefix('/developer')->group(function () {
        Route::get('/registrar', 'developerController@registrar')->name('developer.registrar')->middleware('permission:role.index');
        Route::post('/insertdevelop', 'developerController@insertdevelop')->name('developer.insertdevelop');

        Route::get('/dashboard', 'developerController@dashboard')->name('developer.dashboard');
        Route::get('/perfil', 'developerController@perfil')->name('developer.perfil');

        //TOKENS ****************************
        Route::get('/gettoken', 'developerController@gettoken')->name('developer.gettoken');
        Route::post('/autenticartoken', 'developerController@autenticartoken')->name('developer.autenticartoken');
        Route::get('/refreshtoken', 'developerController@refreshtoken');
        //******************************************

        Route::get('/select', 'developerController@select')->name('developer.select');
        //Route::get('/desarrollo', 'developerController@select')->name('developer.select')->middleware('permission:role.index');
        Route::post('/validarCorreo', 'developerController@validarCorreo')->name('developer.validarCorreo');
    }); */

});
Auth::routes();
Route::middleware('auth')->get('/', 'vistaController@usuarios')->name('home');
// Grupo de rutas para Historial de Placas
Route::namespace('Historial')->prefix('historial')->name('historial.')->middleware('auth')->group(function(){
    Route::get('','HistorialMultasController@index')->name('index');
    // Route::post('/placa','HistorialMultasController@buscarPlaca')->name('buscar');
});
Route::prefix('/usuario')->name('usuario.')->group(function (){
   Route::post('/users','UsuarioController@nuevo')->name('nuevo');
});
Route::get('placas',function(){
    return view('vista_previa.placas');
});