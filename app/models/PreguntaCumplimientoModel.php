<?php 
	/**
	* 
	*/
	class PreguntaCumplimientoModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_preguntacumplimiento';
		
		private $regla=array(
			'pregunta'     => 'required'
			
			);
		private $mensajes=array(

			'pregunta.required'   =>'Pregunta es campo Obligatorio'
				
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