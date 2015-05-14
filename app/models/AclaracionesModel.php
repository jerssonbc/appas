<?php
	class AclaracionesModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_aclaracion';

		protected $fillable = array('aclaracion','planauditoria_id','tipoaclaracion_id');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(


			'aclaracion'    => 'required',
			'planauditoria_id'    => 'required',
			'tipoaclaracion_id'    => 'required'
			);
		private $mensajes=array(

			'aclaracion.required'   =>'Aclaración Requirida',
			'tipoaclaracion_id.required'    => 'tipo Aclaracion Requierida'	
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