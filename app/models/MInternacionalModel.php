<?php
	class MInternacionalModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_marco_ref_internacional';

		//protected $fillable = array('nombre', 'descripcion','planauditoria_id','estado');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(

			'nombre'     => 'required',
			'descripcion'    => 'required'
			);
		private $mensajes=array(

			'nombre.required'   =>'nombre Requirido',
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