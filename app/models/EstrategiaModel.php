<?php
	class EstrategiaModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_direccionamientoestrategico';

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(

			'mision'     => 'required',
			'vision'    => 'required'
			);
		private $mensajes=array(

			'mision.required'   =>'Mision Requirido',
			'vision.required'   =>'Mision historica Requirido'	
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