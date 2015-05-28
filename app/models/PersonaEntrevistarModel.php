<?php 
	/**
	* 
	*/
	class PersonaEntrevistarModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_personaentrevistar';
		
		function __construct()
		{
			# code...
		}
		private $regla=array(
			'nombre'    => 'required|max:100|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
			'apellidos' => 'required|max:70|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
			'cargo' 	=> 'required|max:50|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/'
			);
		private $mensajes=array(
			'nombre.regex'     =>'El nombre debe contener solamente letras ',
			'apellidos.regex'   =>'Los apellidos debe contener solamente letras',
			'cargo.regex'   =>'Los apellidos debe contener solamente letras',
			'nombre.required'  =>'El nombre es obligatorio',
			'apellidos.required'=>'Los apellido es obligatorio',
			'cargo.required'=>'Los apellido es obligatorio',
			'nombre.max'		=>'La direccion debe contener como máximo 50 caracteres',
			'apellidos.max'		=>'La direccion debe contener como máximo 70 caracteres',
			'cargo.max'			=>'La direccion debe contener como máximo 10 caracteres'
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