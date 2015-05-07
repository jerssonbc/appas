<?php 
	/**
	* 
	*/
	class DireccionamientoController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			$direccionamiento= DireccionamientoModel::where('empresa_id',Session::get('id_empresa'))->first();
			return View::make('direccionamiento.index')->with('direccionamiento',$direccionamiento);
		}
		public function Create()
		{
			return View::make('direccionamiento.new');
		}
		public function Edit()
		{
			$direccionamiento = DireccionamientoModel::where('empresa_id',Session::get('id_empresa'))->first();
			
			return View::make('direccionamiento.edit')->with('direccionamiento',$direccionamiento);
		}
		public function Update()
		{
			$mision   = Input::get('mision');
			$vision       = Input::get('vision');
			DB::table('tbla_direccionamientoestrategico')->where('empresa_id',Session::get('id_usuario'))->update(
				array('mision'=>$mision,'vision'=>$vision));
			$direccionamiento = DireccionamientoModel::where('empresa_id',Session::get('id_empresa'))->first();
			return View::make('direccionamiento.index',array('direccionamiento' => $direccionamiento));


		}

		public function Save()
		{
			$empresa=DB::table('tbla_empresa')->where('usuario_id','=',Session::get('id_usuario'))->first();
		


			$direccionamiento=new DireccionamientoModel;
			$direccionamiento->empresa_id		= Session::get('id_empresa');
			$direccionamiento->mision	=Input::get('mision');
			$direccionamiento->vision 		=Input::get('vision');

			$data=array(
				'empresa_id'		=>$empresa->id,
				'mision' 	=>Input::get('mision'),
				'vision'			=>Input::get('vision')
				);

			if (!$direccionamiento->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$direccionamiento->mostrar_errores()));
			}else{
				$direccionamiento->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('direccionamiento');
			}
		}
	}
 ?>