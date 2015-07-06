<?php 
	class DetaCumpInstitucionalModel extends Eloquent
	{

		public $timestamps = false;

		protected $table = 'tbla_deta_pc_ni';

		public function normaInstitucional(){
			return $this->belongsTo('NInstitucionalModel','	normativa_institucional_id');
		}
	}
 ?>