<?php
	class LimitacionesModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_limitacion';

		protected $fillable = array('limitacion','planauditoria_id');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(


			'limitacion'    => 'required'
			);
		private $mensajes=array(

			'limitacion.required'   =>'limitacion Requirida'	
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