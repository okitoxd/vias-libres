<?php

use Illuminate\Http\Request;
use ViasLibres\Incidente;
use ViasLibres\User;

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

//API INCIDENTE
Route::get('/incidentes', function(){
	return Incidente::all();
});

//Crear
Route::post('/incidentes','api\IncidenteController@create');
//Borrar
Route::get('/incidentes/{id}','api\IncidenteController@delete');
//Editar
Route::post('/incidentes/{id}/edit','api\IncidenteController@edit');

//API USUARIO
Route::get('/usuarios', function(){
	return User::all();
});

//Crear
Route::post('/usuarios','api\UsuarioController@create');
//Borrar
Route::get('/usuarios/{id}','api\UsuarioController@delete');
//Editar
Route::post('/usuarios/{id}/edit','api\UsuarioController@edit');