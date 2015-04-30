<?php 
	/**
	* 
	*/
	class EstrategiaController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			$Estrategias= EstrategiaModel::all();
			return View::make('estrategia.index');
		}
		public function Create()
		{
			return View::make('estrategia.new');
		}

		public function Save()
		{
			$empresa=DB::table('tbla_empresa')->where('usuario_id','=',Session::get('id_usuario'))->first();
		


			$estrategia=new EstrategiaModel;
			$estrategia->empresa_id		= $empresa->id;
			$estrategia->mision	=Input::get('mision');
			$estrategia->vision 		=Input::get('vision');

			$data=array(
				'empresa_id'		=>$empresa->id,
				'mision' 	=>Input::get('mision'),
				'vision'			=>Input::get('vision')
				);

			if (!$estrategia->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$estrategia->mostrar_errores()));
			}else{
				$estrategia->save();
				$this->layout->notificacion='Registro Exitoso';
			}
		}
	}
 ?>