<?php 
	/**
	* 
	*/
	class EmpresasController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			$empresas= EmpresaModel::all();
			return View::make('empresa.index');
		}
		public function Create()
		{
			return View::make('empresa.new');
		}

		public function Save()
		{
			$empresa=new EmpresaModel;
			$empresa->usuario_id		=Session::get('id_usuario');
			$empresa->razon_social	=Input::get('razon_social');
			$empresa->giro_negocio 		=Input::get('giro_negocio');
			$empresa->resena_historica 	=Input::get('resena_historica');

			$data=array(
				'usuario_id'		=>Session::get('id_usuario'),
				'razon_social' 	=>Input::get('razon_social'),
				'giro_negocio'			=>Input::get('giro_negocio'),
				'resena_historica'		=>Input::get('resena_historica')
				);

			if (!$empresa->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$empresa->mostrar_errores()));
			}else{
				$empresa->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('login');
			}
		}
	}
 ?>