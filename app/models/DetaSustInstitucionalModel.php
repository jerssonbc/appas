<?php 
	class DetaSustInstitucionalModel extends Eloquent
	{

		public $timestamps = false;

		protected $table = 'tbla_deta_ps_ni';

		public function normaInstitucional(){
			return $this->belongsTo('NInstitucionalModel','	normativa_institucional_id');
		}
	}
 ?>