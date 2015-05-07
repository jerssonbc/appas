<?php
	class PlanAuditoriaModel extends Eloquent
	{
		public $timestamps = false;

		protected $table = 'tbla_planauditoria';

		protected $fillable = array('realidad_problematica','titulo_auditoria', 'empresa_id', 'objetivo_general','estado');

		// function __construct()
		// {
		// 	# code...
		// }
		private $regla=array(
			'realidad_problematica'     => 'required',
			'titulo_auditoria'     => 'required',
			'empresa_id'    => 'required',
			'objetivo_general' => 'required',
			'estado' => 'required'
			);
		private $mensajes=array(

			'realidad_problematica.required'   =>'realidad_problematica Requirido',
			'titulo_auditoria.required'   =>'titulo_auditoria Requirido',
			'objetivo_general.required'   =>'objetivo_general Requirido'	
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