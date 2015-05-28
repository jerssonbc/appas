<?php 
	/**
	* 
	*/
	class PersonaEntrevistarController extends BaseController
	{
		protected $layout='layouts.plan';
		function __construct()
		{
			# code...
		}
		function listarPersonas(){
			$personas=PersonaEntrevistarModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if(is_null($personas)){
				App::abort(404);
			}
			return View::make('personasentrevistar.index',
								array('personas'=>$personas));
		}
		function nuevaPersona(){
			return View::make('personasentrevistar.new');
		}
		function guardarPersona(){
			$persona= new PersonaEntrevistarModel;
			$persona->cargo=Input::get('cargo');
			$persona->apellidos=Input::get('apellidos');
			$persona->nombre=Input::get('nombre');
			$persona->planauditoria_id=Session::get('id_plan');

			$data=array(
				'cargo'=>Input::get('cargo'),
				'apellidos'=>Input::get('apellidos'),
				'nombre'=>Input::get('nombre')
				);
			if(!$persona->validador($data)){
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$persona->mostrar_errores()));
			}else{
				$persona->save();
				return Redirect::to('personasEntrevistar');
			}
		}
		function actualizarPersona($id){
			if (Request::ajax()) {
				$persona=PersonaEntrevistarModel::find($id);
				$persona->cargo=Input::get('cargo');
				$persona->apellidos=Input::get('apellidos');
				$persona->nombre=Input::get('nombre');

				$persona->save();

				$personas=PersonaEntrevistarModel::where('planauditoria_id',Session::get('id_plan'))->get();
				return View::make('personasentrevistar.personas')->with('personas',$personas);

			}
		}
	}
 ?>