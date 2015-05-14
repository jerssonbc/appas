<?php 
	/**
	* 
	*/
	class PerfilEquipoModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_perfilequipo';

		private $regla=array(
			'rol'     => 'required',
			);
		private $mensajes=array(

			'rol.required'   =>'El campo rol es Requerido'
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