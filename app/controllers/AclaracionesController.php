<?php 
	/**
	* 
	*/
	class AclaracionesController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			return Redirect::to('Listar');
		}
		public function Nuevo()
		{
			$tipoAclaraciones = TipoAclaracionesModel::all()->lists('tipo_aclaracion','id');
			return View::make('aclaraciones.new',compact('tipoAclaraciones'));
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
			$aclaraciones = AclaracionesModel::find($id);
			if (is_null($aclaraciones))
			{
				return Redirect::to('aclaracionesListar');
			}
			$tipoAclaraciones = TipoAclaracionesModel::all()->lists('tipo_aclaracion','id');
			return View::make('aclaraciones.edit',compact('tipoAclaraciones','aclaraciones'));
		}
		public function Update($id)
		{
			$aclaraciones = AclaracionesModel::find($id);
			$aclaraciones->fill(Input::all());
			$aclaraciones->save();
			return Redirect::to('aclaracionesListar');
		}
		public function Delete($id)
		{
			$limitaciones = AclaracionesModel::find($id);
			$limitaciones->delete();
			return Redirect::to('aclaracionesListar');
		}

		public function Save()
		{
			$aclaraciones=new AclaracionesModel;
			$aclaraciones->aclaracion				=Input::get('aclaracion');
			$aclaraciones->planauditoria_id 		=Session::get('id_plan');
			$aclaraciones->tipoaclaracion_id				=Input::get('tipoaclaracion_id');


			$data=array(
				'aclaracion' 				=>Input::get('aclaracion'),
				'planauditoria_id'			=>Session::get('id_plan'),
				'tipoaclaracion_id' 				=>Input::get('tipoaclaracion_id'),
				);

			if (!$aclaraciones->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$aclaraciones->mostrar_errores()));
			}else{
				$aclaraciones->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('aclaracionesListar');
			}
		}
		public function Listar()
		{
			$aclaraciones= AclaracionesModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if (is_null($aclaraciones))
			{
				App::abort(404);
			}
			return View::make('aclaraciones.index')->with('aclaraciones',$aclaraciones);
		}
	}
 ?>