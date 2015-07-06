<?php 
	class DetaCumpInternacionalModel extends Eloquent
	{

		public $timestamps = false;

		protected $table = 'tbla_deta_pc_mi';

		public function marcoInternacional(){
			return $this->belongsTo('MInternacionalModel','marco_ref_internacional_id');
		}
	}
 ?>