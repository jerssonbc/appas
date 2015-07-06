<?php 
	/**
	* 
	*/
	class PruebaCumplimientoModel extends Eloquent
	{
		public $timestamps = false;
		protected $table='tbla_pruebacumplimiento';
		function __construct()
		{
			# code...
		}

		public function personaEntrevistar(){
			return $this->belongsTo('PersonaEntrevistarModel','personaentrevistar_id');
		}
		public function objetivoEspecifico(){
			return $this->belongsTo('ObjetivosModel','objetivos_especificos_id');
		}
	}
 ?>