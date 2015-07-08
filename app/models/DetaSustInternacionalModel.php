<?php 
	class DetaSustInternacionalModel extends Eloquent
	{

		public $timestamps = false;

		protected $table = 'tbla_deta_ps_mi';

		public function marcoInternacional(){
			return $this->belongsTo('MInternacionalModel','marco_ref_internacional_id');
		}
	}
 ?>