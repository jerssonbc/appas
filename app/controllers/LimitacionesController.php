<?php 
	/**
	* 
	*/
	class LimitacionesController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			return Redirect::to('Listar');
		}
		public function Nuevo()
		{
			$limitaciones= LimitacionesModel::all();
			return View::make('limitaciones.new')->with('limitaciones',$limitaciones);
		}
		public function Administrar($id)
		{
			$datos= EmpresaModel::find($id);
			return View::make('empresa.index')->with('datos', $datos);
		}
		public function Create()
		{
			return View::make('empresa.new');
		}

		public function Mostrar($id)
		{
			$Empresa = EmpresaModel::find($id);
			return View::make('Empresa.mostrar')->with('Empresa',$Empresa);
		}
		public function Edit($id)
		{
			$limitaciones = LimitacionesModel::find($id);
			
			return View::make('limitaciones.edit')->with('limitaciones',$limitaciones);
		}
		public function Update($id)
		{
			$limitaciones = LimitacionesModel::find($id);
			$limitaciones->fill(Input::all());
			$limitaciones->save();
			return Redirect::to('limitacionesListar');
		}
		public function Delete($id)
		{
			$limitaciones = LimitacionesModel::find($id);
			$limitaciones->delete();
			return Redirect::to('limitacionesListar');
		}

		public function Save()
		{
			$limitaciones=new LimitacionesModel;
			$limitaciones->limitacion				=Input::get('limitacion');
			$limitaciones->planauditoria_id 		=Session::get('id_plan');


			$data=array(
				'limitacion' 				=>Input::get('limitacion'),
				'planauditoria_id'			=>Session::get('id_plan')
				);

			if (!$limitaciones->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$limitaciones->mostrar_errores()));
			}else{
				$limitaciones->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('limitacionesListar');
			}
		}
		public function Listar()
		{
			$limitaciones= LimitacionesModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if (is_null($limitaciones))
			{
				App::abort(404);
			}
			return View::make('limitaciones.index',array('limitaciones'=>$limitaciones));
		}
	}
 ?>