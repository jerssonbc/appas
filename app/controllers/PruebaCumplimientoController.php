<?php 
	/**
	* 
	*/
	class PruebaCumplimientoController extends BaseController
	{
		protected $layout='layouts.plan';
		function __construct()
		{
			# code...
		}
		function listarPCumplimiento(){
			// $auditores=AuditorModel::where('planauditoria_id',Session::get('id_plan'))->get();
			// $roles=PerfilEquipoModel::where('planauditoria_id',Session::get('id_plan'))
			// 						->orderBy('rol')->lists('rol','id');
			$personas=PersonaEntrevistarModel::select('id',DB::raw('CONCAT(apellidos, ", ", nombre) AS persona'))
							->where('planauditoria_id',Session::get('id_plan'))
							->orderBy('apellidos')->lists('persona','id');

			$oespecificos=ObjetivosModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('descripcion')->lists('descripcion','id');

			return View::make('pruebacumplimiento.index',array('personase'=>$personas,'oespecificos'=>$oespecificos));
		}
		function nuevaPCumplimiento(){
			$personas=PersonaEntrevistarModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('apellidos')->lists('apellidos','id');
			return View::make('pruebacumplimiento.newprueba',array('personase'=>$personas));
		}

	}
 ?>