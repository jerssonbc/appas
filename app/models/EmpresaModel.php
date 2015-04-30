<?php
	class EmpresaModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_empresa';

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(
			'usuario_id'     => 'required',
			'razon_social'     => 'required',
			'giro_negocio'    => 'required',
			'resena_historica' => 'required'
			);
		private $mensajes=array(

			'razon_social.required'   =>'Razon social Requirido',
			'giro_negocio.required'   =>'Giro del Negocio Requirido',
			'resena_historica.required'   =>'reseñia historica Requirido'	
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