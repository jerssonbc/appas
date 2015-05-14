<?php 
	/**
	* 
	*/
	class ObjetivosController extends BaseController
	{
		protected $layout='layouts.plan';
		public function Index()
		{
			return Redirect::to('Listar');
		}
		public function MINuevo()
		{
			return View::make('marcos.minew');
		}

		
		public function Edit($id)
		{
			$objetivos = ObjetivosModel::find($id);
			
			return View::make('objetivos_especificos.edit')->with('objetivos',$objetivos);
		}
		
		public function Update($id)
		{
			$objetivos = ObjetivosModel::find($id);
			$objetivos->fill(Input::all());
			$objetivos->save();
			return Redirect::to('objetivosListar');
		}

		
		
		public function Save()
		{
			$objetivos=new ObjetivosModel;
			$objetivos->planauditoria_id	=Session::get('id_plan');
			$objetivos->descripcion 		=Input::get('descripcion');
			$objetivos->estado 		=1;


			$data=array(
				'planauditoria_id'		=>Session::get('id_plan'),
				'descripcion'			=>Input::get('descripcion'),
				'estado'			=>1
				);

			if (!$objetivos->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$objetivos->mostrar_errores()));
			}else{
				$objetivos->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('objetivosListar');
			}
		}
		public function Listar()
		{
			
			$objetivos= ObjetivosModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if (is_null($objetivos))
			{
				App::abort(404);
			}
			return View::make('objetivos_especificos.index',array('objetivos'=>$objetivos));
		}
	}
 ?>