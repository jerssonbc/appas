
<?php 
	class DetaSustNacionalModel extends Eloquent
	{

		public $timestamps = false;

		protected $table = 'tbla_deta_ps_mn';
		public function marcoNacional(){
			return $this->belongsTo('MNacionalModel','marco_ref_nacional_id');
		}
	}
 ?>