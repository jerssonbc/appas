<?php
	class ObjetivosModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_objetivos_especificos';

		protected $fillable = array('descripcion','planauditoria_id','estado');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(


			'descripcion'    => 'required'
			);
		private $mensajes=array(

			'descripcion.required'   =>'descripcion Requirido'	
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