<?php 

	class UsuariosController extends BaseController
	{
		protected $layout='layouts.master';
		function __construct()
		{
			$this->beforeFilter('validar',array('only'=>(
				'principal')));
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
				$this->layout->modulo=View::make('mensaje',
					array('encabezado' => '.: Advertencia :.',
					'cuerpo' =>$usuarios->mostrar_errores()));
			}else{
				$usuarios->save();
				$this->layout->notificacion='Registro Exitoso';
				$this->login();
			}

		}
		function login(){
			$this->layout->notificacion	='Bienvenido al Sistema de Auditoria';
			$this->layout->modulo 		=View::make('usuarios.login');
		}
		function autenticar(){
			$data = Input::all();

			//Reglas de validacion
			$reglas=array(
				'email'    => 'required',
				'password' => 'required|min:8'

				);
			//mensajes de reglas de validacion
			$mensajes=array(
				'email.required'  =>'La dirección de correo electrónico es un campo obligatorio ',
				'password.min'    =>'El password debe tener al menos un total de 8 caracters ',
				'password.required'=>'El password es un campo obligatorio'
				);


			//Instanciar el validador propio de Laravel

			$validacion= Validator::make($data,$reglas,$mensajes);

			if($validacion->fails()){
				$mensajes=$validacion->messages()->all();
				$encabezado="Advertencia: ";
				$this->mostrar_mensajes($encabezado,$mensajes);
			}else{
				$usuarios=new UsuariosModel;

				$email    =Input::get('email');
				$password =Input::get('password');
				//Consultar si los datos ingresados se encuentra en la db
				$datos_usuario=
					$usuarios->where('email','=',$email)->
					where('password','=',md5($password))->first();

				if(!$datos_usuario){
					$encabezado="Advertencia";
					$mensaje="El usuario no se encuentra registrado en la base de datos";
					$this->mostrar_mensajes($encabezado,$mensaje);
				}else{
					if($datos_usuario->estado_id==1){
						$encabezado="Error!";
						$mensaje="Necesita activar su cuenta de correo electrónico";
						$this->mostrar_mensajes($encabezado,$mensaje);

					}else if($datos_usuario->estado_id==3){
						$encabezado="Error!";
						$mensaje='El usuario se encuentra eliminado';
						$this->mostrar_mensajes($encabezado,$mensaje);
						
					}else{
						//Crear sesion, ID, Rol y el nombre de completo
						Session::flush();

						Session::put('id_usuario',$datos_usuario->id);
						//Session::put('id_rol',$datos_usuario->id_rol);
						Session::put('nombre_completo',$datos_usuario->nombre.' '.$datos_usuario->apellidos);

						return Redirect::to('principal');
					}
				}
			}


		}
		function principal()
		{
			//$this->index->notificacion="Bienvenido al sistema: ".Session::get('nombre_completo');
			//$this->index->modulo=View::make('empresas.index');
			return Redirect::to('empresas');
		}
		function mostrar_mensajes($encabezado,$mensajes){
			if(!is_array($mensajes)){
				$mensajes=array('mensaje'=>$mensajes);
			}
			
			$this->layout->modulo=View::make('mensaje',
					array(
						'encabezado'=>$encabezado,
						'cuerpo'    =>$mensajes));
			//$this->layout->notificacion='';
		}
		function cerrarsesion(){
			Session::flush();
			$this->login();
		}

	}
 ?>