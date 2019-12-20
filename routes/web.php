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

Route::get('/', function () {
    return view('inicio');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/test', function () {

        $usrdata=User::select()->where('id', '=', auth()->user()->id)->get();
        return $usrdata[0]->token;
    });

    //**************************************************
    //**************************************************
    //******RUTAS DE USUARIOS ********************
    Route::prefix('/usuario')->group(function () {
        Route::get('/insert','adminusrController@insert')->name('usuario.insert')->middleware('permission:role.index');
        Route::get('/select','adminusrController@select')->name('usuario.select')->middleware('permission:role.index');
        Route::get('/delete','adminusrController@delete')->name('usuario.delete')->middleware('permission:role.index');
        Route::post('/update','adminusrController@update')->name('usuario.update')->middleware('permission:role.index');
        Route::post('/find','adminusrController@find')->name('usuario.find')->middleware('permission:role.index');
        //Route::post('/test',function(){
        //  return "Hola esto es una prueba";
        //});
    });

    //**************************************************
    //**************************************************
    //******RUTAS DE USUARIOS DESARROLLO ***************
    Route::prefix('/developer')->group(function () {
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
    });
});


Route::middleware(['operador'])->group(function () {

    //**************************************************
    //**************************************************
    //**************************************************
    //**************************************************
    //******LISTAR RUTAS SISTEMA ***********************
    Route::prefix('/rutas')->group(function () {
        //Route::get('/select','rutasController@select')->name('rutas.select')->middleware('permission:role.index');
        Route::get('/select',function(){
            //$routeCollection = Route::getRoutes();

            \Artisan::call('route:list');
            return \Artisan::output();

            /*
            $getRouteCollection = Route::getRoutes(); //get and returns all returns route collection
              foreach ($getRouteCollection as $route) {
                 echo $route->getName();echo "<br>";
              }*/

            /*echo "<table style='width:100%'>";
        echo "<tr>";
            echo "<td width='10%'><h4>HTTP Method</h4></td>";
            echo "<td width='10%'><h4>Route</h4></td>";
            echo "<td width='10%'><h4>Name</h4></td>";
            echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo "</tr>";
        foreach ($routeCollection as $value) {
            echo "<tr>";
                echo "<td>" . $value->methods()[0] . "</td>";
                echo "<td>" . $value->uri() . "</td>";
                echo "<td>" . $value->getName() . "</td>";
                echo "<td>" . $value->getActionName() . "</td>";
            echo "</tr>";
        }
    echo "</table>";*/
            //return ;
        })->name('rutas.select')->middleware('permission:role.index');

    });


    //**************************************************
    //**************************************************


    //Route::get('/inicio', 'inicioController@inicio');
    //Route::get('/dashboard', 'vistaController@dashboard')->name('dashboard');
    //Route::get('/incidentes', 'vistaController@incidentes')->name('incidentes');
    Route::get('/incidentes/{fecha}', 'vistaController@incidentes')->name('incidentes');


    Route::post('/sendtest','vistaController@post_incidentes');

    Route::post('/incidentes', 'vistaController@detalleSerie');

    //***************************************
    Route::get('/incidentes/editarincidente/{serieObt}', 'vistaController@actualizarIncidente')->name('actualizarIncidente');
    Route::post('/incidentes/editado', 'vistaController@actualizarIncidente2')->name('actualizarIncidente2');
    Route::post('/incidentes/reportepdf', 'vistaController@reportepdf')->name('reportepdf');
    Route::post('/incidentes/listareportepdf', 'vistaController@listareportepdf')->name('listareportepdf');

    //***************************************
    Route::get('/nuevoincidente', 'vistaController@vistanuevoincidente')->name('vistanuevoincidente');
    Route::post('/nuevoincidente', 'vistaController@vistaregistroincidente')->name('vistaregistroincidente');
    //Route::get('/registroincidente', 'vistaController@vistaregistroincidente')->name('vistaregistroincidente');
    Route::post('/registroincidente', 'vistaController@postregistroincidente')->name('postregistroincidente');
    // Route::get('/index','vistaController@index')->name('role.index')->middleware('permission:role.index');
    Route::get('/index','vistaController@index')->name('role.index')->middleware('permission:role.index');


    //_________ VISOR DE CAMARAS ____________________
    //Route::get('/visor/{camara}', 'camarasController@visor');
    Route::get('/visor', 'camarasController@visor');
    //_______________________________________________


    /****************   MAPA Y CAMARAS   ****************/
    Route::prefix('camaras')->group(function(){

        Route::get('/insert', 'camarasController@vistaregistrar')->name('vistaregistrar');
        Route::post('/insert', 'camarasController@registrocamara')->name('registrocamara');
        Route::post('/updatepost', 'camarasController@post_actualizarcamara')->name('post_actualizarcamara');
        Route::post('/update', 'camarasController@actualizarcamara')->name('actualizarcamara');
        Route::get('/camaras', 'camarasController@vistacamaras')->name('vistacamaras');
        Route::post('/camarass', 'camarasController@detallescamara')->name('detallescamara');
        Route::post('/busqueda', 'camarasController@buscarCamaras');

    });

    Route::prefix('mapa')->group(function(){
        Route::get('/mapa', 'mapaController@camaras_por_estado')->name('mapa');
        Route::post('/mapa', 'mapaController@camaras_por_estado');
        Route::get('/panel', 'mapaController@panel')->name('panel');

    });
});
Route::get('/inicio', 'inicioController@inicio');
Route::get('/dashboard', 'vistaController@dashboard')->name('dashboard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'vistaController@usuarios')->name('home');

