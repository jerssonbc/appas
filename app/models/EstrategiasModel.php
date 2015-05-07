<?php
	class EstrategiasModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_estrategia';

		protected $fillable = array('titulo', 'estrategia', 'empresa_id');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(
			'titulo'     => 'required',
			'estrategia'    => 'required',
			'empresa_id' => 'required'
			);
		private $mensajes=array(

			'titulo.required'   =>'titulo Requirido',
			'estrategia.required'   =>'estrategia Requirido',
			'empresa_id.required'   =>'empresa Requirido'	
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