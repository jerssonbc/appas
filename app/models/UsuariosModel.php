<?php 
	class UsuariosModel extends Eloquent
	{
		protected $table='tbla_usuario';
		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(
			'email'     => 'unique:tbla_usuario|required|email',
			'nombre'    => 'required|alpha',
			'apellidos' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
			'password'  => 'required|min:6'
			);
		private $mensajes=array(
			'email.unique'     =>'La cuenta de correo electrónico ya se encuentra registrada',
			'email.required'   =>'La dirección de correo electrónico es un campo obligatorio',
			'nombre.alpha'     =>'El nombre de usuario debe contener solamente letras ',
			'apellidos.alpha'   =>'El apellido del usuario debe contener solamente letras',
			'nombre.required'  =>'El nombre es obligatorio',
			'apellidos.required'=>'El apellido es obligatorio',
			'password.required'=>'El password es abligatorio',
			'password.min'     =>'El password debe tener al menos un total de 9 caracteres'
			);
		private $errores;
		function validador($data){
			$validacion=Validator::make($data,$this->regla,$this->mensajes);
			if($validacion->fails()){
				$this->errores=$validacion->messages()->all();
				return false;
			}else{
				return true;
			}
		}
		function mostrar_errores(){
			return $this->errores;
		}
	}
 ?>