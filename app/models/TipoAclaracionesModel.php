<?php
	class TipoAclaracionesModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_tipoaclaracion';

		protected $fillable = array('tipo_aclaracion');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(


			'tipo_aclaracion'    => 'required'
			);
		private $mensajes=array(

			'tipo_aclaracion.required'   =>'tipo aclaracion Requirida'	
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