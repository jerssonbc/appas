<?php 
	/**
	* 
	*/
	class PerfilModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_perfil';

		private $regla=array(
			'perfil'     => 'required',
			);
		private $mensajes=array(

			'perfil.required'   =>'El campo perfil es Requerido'
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