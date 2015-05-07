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
	Route::get('empresaIndex','EmpresasController@Index');
	Route::get('empresaEdit','EmpresasController@Edit');
	Route::post('empresaUpdate','EmpresasController@Update');
	Route::get('Administrar/{id}','EmpresasController@Administrar');
	Route::get('empresas','EmpresasController@Listar');
	Route::get('estrategia','EstrategiaController@Index');

});

	Route::post('registrarEmpresa','EmpresasController@save');
	Route::post('registrarEstrategia','EstrategiaController@save');


Route::post('registrar','UsuariosController@registrar_user');
Route::post('autenticar','UsuariosController@autenticar');