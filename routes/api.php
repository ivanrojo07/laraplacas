<?php

use App\RegistroPlaca;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sistema0','Api\Sistemas\SistemaLocalController@sistema0');
Route::post('sistema1','Api\Sistemas\SistemaLocalController@sistema1');
Route::post('sistema11','Api\Sistemas\SistemaLocalController@sistema11');
Route::post('sistema13','Api\Sistemas\SistemaLocalController@sistema13');
Route::post('sistema14','Api\Sistemas\SistemaLocalController@sistema14');
Route::post('sistema15','Api\Sistemas\SistemaLocalController@sistema15');
Route::post('sistema16','Api\Sistemas\SistemaLocalController@sistema16');
Route::post('sistema17','Api\Sistemas\SistemaLocalController@sistema17');
Route::post('sistema18','Api\Sistemas\SistemaLocalController@sistema18');
Route::post('sistema19','Api\Sistemas\SistemaLocalController@sistema19');
Route::post('sistema21','Api\Sistemas\SistemaLocalController@sistema21');
Route::post('sistema22','Api\Sistemas\SistemaLocalController@sistema22');
Route::post('sistema43','Api\Sistemas\SistemaLocalController@sistema43');
Route::post('sistema44','Api\Sistemas\SistemaLocalController@sistema44');
Route::post('placa','Api\HistorialController@sendPlaca');
Route::get('camaras','Api\HistorialController@getCamaras');
Route::post('historial_placa','Api\HistorialController@search_placa');
Route::get('prueba','Api\HistorialController@prueba');
Route::post('repuve','Api\Repuve\RepuveController@getPlaca');
Route::post('sistema_0','Api\Sistemas\SistemaController@searchSistema_0');
Route::post('sistema-1','Api\Sistemas\SistemaController@searchSistemaMenos1');
Route::post('sistema_11','Api\Sistemas\SistemaController@searchSistema_11');
Route::post('sistema_13','Api\Sistemas\SistemaController@searchSistema_13');
Route::post('sistema_14','Api\Sistemas\SistemaController@searchSistema_14');
Route::post('sistema_15','Api\Sistemas\SistemaController@searchSistema_15');
Route::post('sistema_16','Api\Sistemas\SistemaController@searchSistema_16');
Route::post('sistema_17','Api\Sistemas\SistemaController@searchSistema_17');
Route::post('sistema_18','Api\Sistemas\SistemaController@searchSistema_18');
Route::post('sistema_19','Api\Sistemas\SistemaController@searchSistema_19');
Route::post('sistema_21','Api\Sistemas\SistemaController@searchSistema_21');
Route::post('sistema_22','Api\Sistemas\SistemaController@searchSistema_22');
Route::post('sistema_43','Api\Sistemas\SistemaController@searchSistema_43');
Route::post('sistema_44','Api\Sistemas\SistemaController@searchSistema_44');
Route::post('/crearusuario', 'UsuarioController@nuevo');
