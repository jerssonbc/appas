<?php 
	/**
	* 
	*/
	class MarcosController extends BaseController
	{
		protected $layout='layouts.plan';
		public function Index()
		{
			return Redirect::to('Listar');
		}

		/*Metodo para extraer el nombre de un tipo de Marco*/
		public function getMarco($id){
			if ($id==1) {
				$marcosi=MInternacionalModel::where('planauditoria_id',Session::get('id_plan'))
								->orderBy('nombre')->get(array('id','nombre'));
											
				return View::make('marcos.marcosdetipo')->with('marcos',$marcosi);
			}else{
				if ($id==2) {
					$marcosn=MNacionalModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('nombre')->get(array('id','nombre'));
					return View::make('marcos.marcosdetipo')->with('marcos',$marcosn);
				}else{
					if ($id==3) {
						$ninstitucionales=NInstitucionalModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('nombre')->get(array('id','nombre'));
						return View::make('marcos.marcosdetipo')->with('marcos',$ninstitucionales);
					}else{
						return View::make('marcos.marcosdetipo')->with('marcos',array());
					}
					

					
				}
			}
		}

		public function MINuevo()
		{
			return View::make('marcos.minew');
		}
		public function MNNuevo()
		{
			return View::make('marcos.mnnew');
		}
		public function NINuevo()
		{
			return View::make('marcos.ninew');
		}
		public function MIEdit($id)
		{
			$internacional = MInternacionalModel::find($id);

			if (is_null($internacional))
			{
				return Redirect::to('marcosListar');
			}
			
			return View::make('marcos.miedit')->with('internacional',$internacional);
		}
		public function MNEdit($id)
		{
			$nacional = MNacionalModel::find($id);
			if (is_null($nacional))
			{
				return Redirect::to('marcosListar');
			}
			return View::make('marcos.mnedit')->with('nacional',$nacional);
		}
		public function NIEdit($id)
		{
			$institucional = NInstitucionalModel::find($id);
			if (is_null($institucional))
			{
				return Redirect::to('marcosListar');
			}
			return View::make('marcos.niedit')->with('institucional',$institucional);
		}
		public function MIUpdate($id)
		{
			$internacional = MInternacionalModel::find($id);
			$internacional->fill(Input::all());
			$internacional->save();
			return Redirect::to('marcosListar');
		}
		public function MNUpdate($id)
		{
			$nacional = MNacionalModel::find($id);
			$nacional->fill(Input::all());
			$nacional->save();
			return Redirect::to('marcosListar');
		}
		public function NIUpdate($id)
		{
			$institucional = NInstitucionalModel::find($id);
			$institucional->fill(Input::all());
			$institucional->save();
			return Redirect::to('marcosListar');
		}

		public function MISave()
		{
			$internacional=new MInternacionalModel;
			$internacional->planauditoria_id	=Session::get('id_plan');
			$internacional->nombre	=Input::get('nombre');
			$internacional->descripcion 		=Input::get('descripcion');
			$internacional->estado 		=1;


			$data=array(
				'planauditoria_id'		=>Session::get('id_plan'),
				'nombre' 	=>Input::get('nombre'),
				'descripcion'			=>Input::get('descripcion'),
				'estado'			=>1
				);

			if (!$internacional->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$internacional->mostrar_errores()));
			}else{
				$internacional->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('marcosListar');
			}
		}
		public function MNSave()
		{
			$nacional=new MNacionalModel;
			$nacional->planauditoria_id	=Session::get('id_plan');
			$nacional->nombre	=Input::get('nombre');
			$nacional->descripcion 		=Input::get('descripcion');
			$nacional->estado 		=1;


			$data=array(
				'planauditoria_id'		=>Session::get('id_plan'),
				'nombre' 	=>Input::get('nombre'),
				'descripcion'			=>Input::get('descripcion'),
				'estado'			=>1
				);

			if (!$nacional->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$nacional->mostrar_errores()));
			}else{
				$nacional->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('marcosListar');
			}
		}
		public function NISave()
		{
			$institucional=new NInstitucionalModel;
			$institucional->planauditoria_id	=Session::get('id_plan');
			$institucional->nombre	=Input::get('nombre');
			$institucional->descripcion 		=Input::get('descripcion');
			$institucional->estado 		=1;


			$data=array(
				'planauditoria_id'		=>Session::get('id_plan'),
				'nombre' 	=>Input::get('nombre'),
				'descripcion'			=>Input::get('descripcion'),
				'estado'			=>1
				);

			if (!$institucional->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$institucional->mostrar_errores()));
			}else{
				$institucional->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('marcosListar');
			}
		}
		public function Listar()
		{
			$internacional= MInternacionalModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if (is_null($internacional))
			{
				App::abort(404);
			}
			$nacional= MNacionalModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if (is_null($internacional))
			{
				App::abort(404);
			}
			$institucional= NInstitucionalModel::where('planauditoria_id',Session::get('id_plan'))->get();
			if (is_null($internacional))
			{
				App::abort(404);
			}
			return View::make('marcos.index',array('institucional'=>$institucional,'internacional'=>$internacional,'nacional'=>$nacional));
		}
	}
 ?>