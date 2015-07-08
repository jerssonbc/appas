<?php 
	/**
	* 
	*/
	class PruebaSustantivaModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_pruebasustantiva';
		function __construct()
		{
			# code...
		}

		public function personaResponsable(){
		 	return $this->belongsTo('AuditorModel','auditor_id');
		}
		public function objetivoEspecifico(){
			return $this->belongsTo('ObjetivosModel','objetivos_especificos_id');
		}
	}
 ?>