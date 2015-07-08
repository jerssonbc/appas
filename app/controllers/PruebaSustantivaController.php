<?php 
	class PruebaSustantivaController extends BaseController
	{
		function __construct(){

		}
		public function ListPSusantivas(){
			$pruebasSustantivas=PruebaSustantivaModel::where('planauditoria_id',"=",Session::get('id_plan'))
									->get();
			$marcosutilizados=array();

				foreach ($pruebasSustantivas as $ps ) {
					$minternacionales=DetaSustInternacionalModel::where('pruebasustantiva_id','=',$ps->id)->get();
					$num_mi=DetaSustInternacionalModel::where('pruebasustantiva_id','=',$ps->id)->count();
					
					$mnacionales=DetaSustNacionalModel::where('pruebasustantiva_id','=',$ps->id)->get();
					$num_mn=DetaSustNacionalModel::where('pruebasustantiva_id','=',$ps->id)->count();

					$ninstitucionales=DetaSustInstitucionalModel::where('pruebasustantiva_id','=',$ps->id)->get();
					$num_ni=DetaSustInstitucionalModel::where('pruebasustantiva_id','=',$ps->id)->count();


					array_push($marcosutilizados, array('psustantiva'=>$ps,
										'num_mi'=>$num_mi,'marcos_i'=>$minternacionales,
										'num_mn'=>$num_mn,'marcos_n'=>$mnacionales,
										'num_ni'=>$num_ni,'normas_i'=>$ninstitucionales));
			}

			$auditores=AuditorModel::select('id',DB::raw('CONCAT(apellidos,",", nombre) AS auditor'))
									->where('planauditoria_id',Session::get('id_plan'))
									->orderBy('apellidos')->lists('auditor','id');

			$oespecificos=ObjetivosModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('descripcion')->lists('descripcion','id');
			return View::make('pruebasustantiva.index',array('auditores'=>$auditores,
							'oespecificos'=>$oespecificos,'cuestionariosustan'=>$marcosutilizados));

		}
		function Save(){
			if (Request::ajax()) {
				$psustantiva=new PruebaSustantivaModel;
				$psustantiva->titulo 					=Input::get('titulo_cs');
				$psustantiva->pregunta					=Input::get('pregunta');
				$psustantiva->objetivos_especificos_id	=Input::get('oespecifico_cs');
				$psustantiva->auditor_id 				=Input::get('responsable');
				$psustantiva->planauditoria_id			=Session::get('id_plan');

				$psustantiva->save();
				$last_ps=$psustantiva->id;


				//$datamarcos=array();
				$datamarcos= Input::get('mutilizar');

				for($i=0; $i<count($datamarcos); $i++) {
					$vmarco=$datamarcos[$i];
					if($vmarco["tp"] ==1){
						$detasusti=new DetaSustInternacionalModel;
						$detasusti->pruebasustantiva_id=$last_ps;
						$detasusti->marco_ref_internacional_id=$vmarco["marco"];
						$detasusti->save();

					}else{
						if($vmarco["tp"]==2){
							$detasustn=new DetaSustNacionalModel;
							$detasustn->pruebasustantiva_id=$last_ps;
							$detasustn->marco_ref_nacional_id=$vmarco["marco"];
							$detasustn->save();

						}else{
							if($vmarco["tp"]==3){
								$detasustni=new DetaSustInstitucionalModel;
								$detasustni->pruebasustantiva_id=$last_ps;
								$detasustni->normativa_institucional_id=$vmarco["marco"];
								$detasustni->save();

							}else{

							}
						}
					}
					# code...
				}

				$pruebasSustantivas=PruebaSustantivaModel::where('planauditoria_id',"=",Session::get('id_plan'))
									->get();
				$marcosutilizados=array();

				foreach ($pruebasSustantivas as $ps ) {
					$minternacionales=DetaSustInternacionalModel::where('pruebasustantiva_id','=',$ps->id)->get();
					$num_mi=DetaSustInternacionalModel::where('pruebasustantiva_id','=',$ps->id)->count();
					
					$mnacionales=DetaSustNacionalModel::where('pruebasustantiva_id','=',$ps->id)->get();
					$num_mn=DetaSustNacionalModel::where('pruebasustantiva_id','=',$ps->id)->count();

					$ninstitucionales=DetaSustInstitucionalModel::where('pruebasustantiva_id','=',$ps->id)->get();
					$num_ni=DetaSustInstitucionalModel::where('pruebasustantiva_id','=',$ps->id)->count();


					array_push($marcosutilizados, array('psustantiva'=>$ps,
										'num_mi'=>$num_mi,'marcos_i'=>$minternacionales,
										'num_mn'=>$num_mn,'marcos_n'=>$mnacionales,
										'num_ni'=>$num_ni,'normas_i'=>$ninstitucionales));
				}



				return array('error'=>'0',
						'dcuestionarios'=>' '.View::make('pruebasustantiva.listacuestionariosustantivos',
						array('cuestionariosustan'=>$marcosutilizados)));
				

				
			}
		}
	}
 ?>