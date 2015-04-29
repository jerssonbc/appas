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
	return Redirect::to('registrar');
});

Route::get('registrar','UsuariosController@registrar');


Route::post('registrar','UsuariosController@registrar_user');
