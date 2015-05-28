<?php 
	/**
	* 
	*/
	class AuditorModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_auditor';
		protected $fillable= array('apellidos','nombre','dni',
								'email','telefono','celular','direccion',
								'carrera_profesiona','planauditoria_id',
								'perfilequipo_id','estado');
		function __construct()
		{
			# code...
		}
		private $regla=array(
			'email'     => 'required|email',
			'nombre'    => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
			'apellidos' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
			'dni' 		=> 'required|numeric|min:8',
			'direccion'	=> 'max:60',
			'carrera_profesional'=>'max:100'
			);
		private $mensajes=array(
			'email.email'     =>'La cuenta de correo electrónico no es valida',
			'email.required'   =>'La dirección de correo electrónico es un campo obligatorio',
			'nombre.alpha'     =>'El nombre debe contener solamente letras ',
			'apellidos.alpha'   =>'Los apellidos debe contener solamente letras',
			'nombre.required'  =>'El nombre es obligatorio',
			'apellidos.required'=>'Los apellido es obligatorio',
			'dni.required'		=>'El dni es campo obligatorio',
			'dni.numeric'		=>'El dni debe contener caracteres numericos',
			'dni.min'			=>'El dni debe tener 8 digitos',
			'direccion.max'		=>'La direccion debe contener como máximo 60 caracteres',
			'carrera_profesional.max'=>'La carrera profesional debe contener como máximo 100 caracteres'
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
		public function rolequipo(){
			return $this->belongsTo('PerfilEquipoModel','perfilequipo_id');
		}

	}
 ?>