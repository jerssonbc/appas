<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	//return View::make('hello');
	//return View::make('layouts.master');
	return Redirect::to('login');
});

Route::group(array('before'=>'sesionactiva'),function(){
Route::get('registrar','UsuariosController@registrar');
Route::get('login','UsuariosController@login');

});

Route::get('principal','UsuariosController@principal');
Route::get('salir','UsuariosController@cerrarsesion');



Route::group(array('before'=>'validar'),function(){
	
	Route::get('empresaNuevo','EmpresasController@Nuevo');
	Route::get('estrategiasNuevo','EstrategiasController@Nuevo');
	Route::get('empresaIndex','EmpresasController@Index');
	Route::get('empresaEdit','EmpresasController@Edit');
	Route::get('direccionamientoEdit','DireccionamientoController@Edit');
	Route::get('estrategiasEdit/{id}','EstrategiasController@Edit');
	Route::get('estrategiasDelete/{id}','EstrategiasController@Delete');
	Route::post('estrategiasUpdate/{id}','EstrategiasController@Update');
	Route::post('empresaUpdate','EmpresasController@Update');
	Route::post('direccionamientoUpdate','DireccionamientoController@Update');
	Route::get('Administrar/{id}','EmpresasController@Administrar');
	Route::get('empresas','EmpresasController@Listar');
	Route::get('estrategiasListar','EstrategiasController@Listar');
	Route::get('direccionamientoNuevo','DireccionamientoController@Create');
	Route::get('direccionamiento','DireccionamientoController@index');

});

	Route::post('registrarEmpresa','EmpresasController@save');
	Route::post('registrarEstrategias','EstrategiasController@save');
	Route::post('registrarDireccionamiento','DireccionamientoController@save');


Route::post('registrar','UsuariosController@registrar_user');
Route::post('autenticar','UsuariosController@autenticar');