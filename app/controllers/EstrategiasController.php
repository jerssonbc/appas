<?php 
	/**
	* 
	*/
	class EstrategiasController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			$empresas= EmpresaModel::all();
			return View::make('empresa.Index')->with('empresas',$empresas);
		}
		public function Nuevo()
		{
			$estrategias= EstrategiasModel::all();
			return View::make('estrategias.new');
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
			$estrategias = EstrategiasModel::find($id);
			if (is_null($estrategias))
			{
				return Redirect::to('estrategiasListar');
			}
			
			return View::make('estrategias.edit')->with('estrategias',$estrategias);
		}
		public function Update($id)
		{
			$estrategias = EstrategiasModel::find($id);
			$estrategias->fill(Input::all());
			$estrategias->save();
			return Redirect::to('estrategiasListar');
		}
		public function Delete($id)
		{
			$estrategias = EstrategiasModel::find($id);
			$estrategias->delete();
			return Redirect::to('estrategiasListar');
		}

		public function Save()
		{
			$estrategias=new EstrategiasModel;
			$estrategias->empresa_id		=Session::get('id_empresa');
			$estrategias->titulo	=Input::get('titulo');
			$estrategias->estrategia 		=Input::get('estrategia');


			$data=array(
				'empresa_id'		=>Session::get('id_empresa'),
				'titulo' 	=>Input::get('titulo'),
				'estrategia'			=>Input::get('estrategia')
				);

			if (!$estrategias->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$estrategias->mostrar_errores()));
			}else{
				$estrategias->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('estrategiasListar');
			}
		}
		public function Listar()
		{
			$estrategias= EstrategiasModel::where('empresa_id',Session::get('id_empresa'))->get();
			if (is_null($estrategias))
			{
				App::abort(404);
			}

			return View::make('estrategias.index',array('estrategias' => $estrategias));
		}
	}
 ?>