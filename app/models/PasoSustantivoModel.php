<?php 
/**
* 
*/
class PasoSustantivoModel extends Eloquent
{
		public $timestamps = false;
		protected $table='tbla_pasos_sustantivos';
		
		private $regla=array(
			'descripcion'     => 'required'
			
			);
		private $mensajes=array(

			'descripcion.required'   =>'Descripción de paso es campo Obligatorio'
				
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