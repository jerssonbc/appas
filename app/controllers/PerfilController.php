<?php 
	/**
	* 
	*/
	class PerfilController extends BaseController
	{
		protected $layout='layouts.plan';	
		function __construct()
		{
			# code...
		}

		function listarPefiles(){
			//$rol=PerfilEquipoModel::all();
			// $roles2=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->get();
			// $rolyperfil=array();
			// foreach ($roles as $rol) {
			// 	$perfilDeRol=PerfilModel::where('perfilequipo_id','=',$rol->id)->get();
			// 	$numperfiles=PerfilModel::where('perfilequipo_id','=',$rol->id)->count();
			// 	array_push($rolyperfil, array('rol' => $rol,'perfil'=>$perfilDeRol,'numperfiles'=>$numperfiles);
			// }

			
			//$numroles=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->count();
			//return View::make('perfil.index',array('roles'=>$roles,'numroles'=>$numroles));
		}

		function guardarPerfil(){
			$perfil=new PerfilModel;
			$perfil->perfilequipo_id=Input::get('rol');
			$perfil->perfil=Input::get('perfil');

			$data=array(
				'perfilequipo_id'=>Input::get('rol'),
				'perfil'=>Input::get('perfil')
				);

			if (!$perfil->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$perfil->mostrar_errores()));
			}else{
				$perfil->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('perfilEquipo');
			}

		}

		public function editarPerfil($id)
		{
			$perfil = PerfilModel::find($id);
			$roles=DB::table('tbla_perfilequipo')->where('planauditoria_id',Session::get('id_plan'))->lists('rol','id');
			if (is_null($perfil))
			{
				return Redirect::to('perfilEquipo');
			}
			
			return View::make('perfil.editPerfilRol',
							array('perfil'=>$perfil,'roles'=>$roles));
		}
		public function actualizarPerfil($id)
		{
			$perfil=PerfilModel::find($id);
			$perfil->perfil=Input::get('perfil');
			$perfil->perfilequipo_id=Input::get('rol');
			
			$perfil->save();
			return Redirect::to('perfilEquipo');
		}
	}
 ?>