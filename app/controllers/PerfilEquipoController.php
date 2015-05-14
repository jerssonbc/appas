<?php 
	/**
	* 
	*/
	class PerfilEquipoController extends BaseController
	{
		protected $layout='layouts.plan';
		function __construct()
		{
			# code...
		}

		function listarPefil(){
			
			$roles=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->get();
			$numroles=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->count();
			return View::make('perfil.index',array('roles'=>$roles,'numroles'=>$numroles));
		}
		function nuevoRol(){
			$cargos=DB::table('tbla_cargo')->orderBy('cargo')->lists('cargo','id');
			return View::make('perfil.nuevorolperfil',array('cargos'=>$cargos));
		}
		function nuevoPerfil(){
			$roles=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->lists('rol','id');
			$numroles=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->count();
			return View::make('perfil.nuevoperfilrol',array('roles'=>$roles,'numroles'=>$numroles));
		}
		function guardarRol(){
			$perfilEquipo=new PerfilEquipoModel;
			$perfilEquipo->planauditoria_id =Session::get('id_plan');
			$perfilEquipo->cargo_id=Input::get('cargo');
			$perfilEquipo->rol=Input::get('rol');
			$data=array(
				'planauditoria_id'=>Session::get('id_plan'),
				'cargo_id'=>Input::get('cargo'),
				'rol'=>Input::get('rol')
				);

			if (!$perfilEquipo->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$perfilEquipo->mostrar_errores()));
			}else{
				$perfilEquipo->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('marcosListar');
			}

		}
	}
 ?>