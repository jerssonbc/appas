
<?php 
	class DetaCumpNacionalModel extends Eloquent
	{

		public $timestamps = false;

		protected $table = 'tbla_deta_pc_mn';
		public function marcoNacional(){
			return $this->belongsTo('MNacionalModel','marco_ref_nacional_id');
		}
	}
 ?>