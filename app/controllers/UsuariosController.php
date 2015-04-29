<?php 

	class UsuariosController extends BaseController
	{
		protected $layout='layouts.master';
		function __construct()
		{
			# code...
		}
		function registrar(){
			$this->layout->notificacion="Bienvendio a Auditoria Applicación";
			$this->layout->modulo=View::make('usuarios.registrar');
		}
		function registrar_user(){
			$usuarios=new UsuariosModel;
			$usuarios->nombre		=Input::get('nombre');
			$usuarios->apellidos	=Input::get('apellidos');
			$usuarios->email 		=Input::get('email');
			$usuarios->password 	=md5(Input::get('password'));
			$usuarios->estado_id	=2;

			$data=array(
				'nombre'		=>Input::get('nombre'),
				'apellidos' 	=>Input::get('apellidos'),
				'email'			=>Input::get('email'),
				'password'		=>Input::get('password')
				);

			if (!$usuarios->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$usuarios->mostrar_errores()));
			}else{
				$usuarios->save();
				$this->layout->notificacion='Registro Exitoso';
			}

		}
	}
 ?>