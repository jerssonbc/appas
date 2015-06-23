<?php 
	/**
	* 
	*/

	class AuditorController extends BaseController
	{
		protected $layout='layouts.plan';
		function __construct()
		{
			# code...
		}
		function listarAuditores(){
			$auditores=AuditorModel::where('planauditoria_id',Session::get('id_plan'))->get();
			$roles=PerfilEquipoModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('rol')->lists('rol','id');
			return View::make('equipoauditor.index',
								array('auditores'=>$auditores,'roles'=>$roles));
		}
		function nuevoAuditor(){
			
			$roles=PerfilEquipoModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('rol')->lists('rol','id');

			return View::make('equipoauditor.nuevoauditor',array('roles'=>$roles));

		}
		function guardarAuditor(){
				$auditor=new AuditorModel();
				$auditor->apellidos		=Input::get('apellidosa');
				$auditor->nombre		=Input::get('nombrea');
				$auditor->dni 			=Input::get('dnia');
				$auditor->email 		=Input::get('emaila');
				$auditor->telefono 		=Input::get('telefonoa');
				$auditor->celular		=Input::get('celulara');
				$auditor->carrera_profesional=Input::get('carreraa');
				$auditor->direccion		=Input::get('direcciona');
				$auditor->perfilequipo_id=Input::get('rola');
				$auditor->planauditoria_id=Session::get('id_plan');
				$auditor->estado=1;

				$data=array(
					'apellidos'			=>Input::get('apellidosa'),
					'nombre'			=>Input::get('nombrea'),
					'email'				=>Input::get('emaila'),
					'dni'				=>Input::get('dnia'),
					'direccion'			=>Input::get('direcciona'),
					'carrera_profesional'=>Input::get('carreraa')
					);
				if (!$auditor->validador($data)) {
					$this->layout->modulo=View::make('mensaje',array('encabezado' => '.: Advertencia :.',
					'cuerpo' =>$auditor->mostrar_errores()));
				}else{
					$auditor->save();
					return Redirect::to('equipoAuditor');
				}

			
		}
		function actualizarAuditor($id){
			if (Request::ajax()) {
				$auditor=AuditorModel::find($id);
				$auditor->apellidos		=Input::get('apellidos');
				$auditor->nombre		=Input::get('nombre');
				$auditor->dni 			=Input::get('dni');
				$auditor->email 		=Input::get('email');
				$auditor->telefono 		=Input::get('telefono');
				$auditor->celular		=Input::get('celular');
				$auditor->carrera_profesional=Input::get('carrera');
				$auditor->direccion		=Input::get('direccion');
				$auditor->perfilequipo_id=Input::get('rol');

				$auditor->save();

				$auditores=AuditorModel::where('planauditoria_id',Session::get('id_plan'))->get();

				return View::make('equipoauditor.auditores')->with('auditores',$auditores);
				
			}
		}
	}
 ?>