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


	Route::get('planAuditoriaNuevo','PlanAuditoriaController@Nuevo');
	Route::get('planAuditoriaEdit','PlanAuditoriaController@Edit');
	Route::post('planAuditoriaUpdate','PlanAuditoriaController@Update');
	Route::get('AdministrarPlan/{id}','PlanAuditoriaController@Administrar');
	Route::get('planAuditoria','PlanAuditoriaController@Listar');


	Route::get('estrategiasNuevo','EstrategiasController@Nuevo');
	Route::get('estrategiasEdit/{id}','EstrategiasController@Edit');
	Route::get('estrategiasDelete/{id}','EstrategiasController@Delete');
	Route::post('estrategiasUpdate/{id}','EstrategiasController@Update');
	Route::get('estrategiasListar','EstrategiasController@Listar');

	Route::get('limitacionesNuevo','LimitacionesController@Nuevo');
	Route::get('limitacionesEdit/{id}','LimitacionesController@Edit');
	Route::get('limitacionesDelete/{id}','LimitacionesController@Delete');
	Route::post('limitacionesUpdate/{id}','LimitacionesController@Update');
	Route::get('limitacionesListar','LimitacionesController@Listar');

	Route::get('aclaracionesNuevo','AclaracionesController@Nuevo');
	Route::get('aclaracionesEdit/{id}','AclaracionesController@Edit');
	Route::get('aclaracionesDelete/{id}','AclaracionesController@Delete');
	Route::post('aclaracionesUpdate/{id}','AclaracionesController@Update');
	Route::get('aclaracionesListar','AclaracionesController@Listar');


	Route::get('MInternacionalNuevo','MarcosController@MINuevo');
	Route::get('MNacionalNuevo','MarcosController@MNNuevo');
	Route::get('NInstitucionalNuevo','MarcosController@NINuevo');
	Route::get('institucionalEdit/{id}','MarcosController@NIEdit');
	Route::get('nacionalEdit/{id}','MarcosController@MNEdit');
	Route::get('internacionalEdit/{id}','MarcosController@MIEdit');
	Route::post('institucionalUpdate/{id}','MarcosController@NIUpdate');
	Route::post('internacionalUpdate/{id}','MarcosController@MIUpdate');
	Route::post('nacionalUpdate/{id}','MarcosController@MNUpdate');
	Route::get('marcosListar','MarcosController@Listar');
	Route::post('marcodetipo/{id}','MarcosController@getMarco');
	
	
	Route::get('direccionamientoEdit','DireccionamientoController@Edit');
	Route::post('direccionamientoUpdate','DireccionamientoController@Update');
	Route::get('direccionamientoNuevo','DireccionamientoController@Create');
	Route::get('direccionamiento','DireccionamientoController@index');
	
	
	
	Route::get('objetivosListar','ObjetivosController@Listar');
	Route::get('objetivosEdit/{id}','ObjetivosController@Edit');
	Route::get('objetivosDelete/{id}','ObjetivosController@Delete');
	Route::post('objetivosUpdate/{id}','ObjetivosController@Update');

	Route::get('perfilEquipo','PerfilEquipoController@listarPefil');
	Route::get('nuevoRolPerfil','PerfilEquipoController@nuevoRol');
	Route::get('nuevoPerfilRol','PerfilEquipoController@nuevoPerfil');

	Route::get('editarPerfil/{id}','PerfilController@editarPerfil');
	Route::post('actualizarPerfil/{id}','PerfilController@actualizarPerfil');

	Route::get('equipoAuditor','AuditorController@listarAuditores');
	Route::get('nuevoAuditor','AuditorController@nuevoAuditor');
	Route::post('addAuditor','AuditorController@guardarAuditor');
	Route::post('editAuditor/{id}','AuditorController@actualizarAuditor');

	Route::get('personasEntrevistar','PersonaEntrevistarController@listarPersonas');
	Route::get('personaEntrevistarNueva','PersonaEntrevistarController@nuevaPersona');
	Route::post('registrarPersona','PersonaEntrevistarController@guardarPersona');
	Route::post('editPersona/{id}','PersonaEntrevistarController@actualizarPersona');

	Route::get('pruebasCumplimiento','PruebaCumplimientoController@listarPCumplimiento');
	Route::get('nuevoCuestionarioCumplimiento','PruebaCumplimientoController@nuevaPCumplimiento');
	Route::post('registrarCCumplimiento','PruebaCumplimientoController@registrar');

	Route::post('registrarPreguntaCumpl','PreguntaCumplimientoController@Save');
	Route::post('listarPreguntaCumpl','PreguntaCumplimientoController@ListPreguntas');
	Route::post('registrarRespuestaCumpl','PreguntaCumplimientoController@SaveRespuesta');
	Route::post('registrarObservacionCumpl','PreguntaCumplimientoController@SaveObservacion');

	Route::get('pruebasSustantivas','PruebaSustantivaController@ListPSusantivas');
	Route::post('registrarCSustantivo','PruebaSustantivaController@Save');
	Route::post('registrarRespuestaSustantiva','PruebaSustantivaController@SaveRespuesta');
	
	Route::post('listarPasoSustantivos','PasoSustantivosController@ListPasos');
	Route::post('registrarPasoSustantivo','PasoSustantivosController@SavePaso');
	Route::post('registrarCumplimientoPaso','PasoSustantivosController@SaveCumplimiento');


	
});

	Route::post('registrarPlanAuditoria','PlanAuditoriaController@save');
	Route::post('registrarMInternacional','MarcosController@MIsave');
	Route::post('registrarMNacional','MarcosController@MNsave');
	Route::post('registrarNInstitucional','MarcosController@NIsave');
	
	Route::post('registrarEmpresa','EmpresasController@save');

	Route::post('registrarObjetivo','ObjetivosController@save');
	Route::post('registrarAclaraciones','AclaracionesController@save');

	Route::post('registrarEstrategias','EstrategiasController@save');
	Route::post('registrarLimitaciones','LimitacionesController@save');
	Route::post('registrarDireccionamiento','DireccionamientoController@save');

	Route::post('registrarRol','PerfilEquipoController@guardarRol');
	Route::post('editarRol','PerfilEquipoController@editarRol');


	
	Route::post('registrarPerfil','PerfilController@guardarPerfil');
	


Route::post('registrar','UsuariosController@registrar_user');
Route::post('autenticar','UsuariosController@autenticar');


App::missing(function($exception)
{
	return View::make('error_404');
});