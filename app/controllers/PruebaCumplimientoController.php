<?php 
	/**
	* 
	*/
	class PruebaCumplimientoController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}
		function listarPCumplimiento(){
			
			$pruebasCumplimiento=PruebaCumplimientoModel::where('planauditoria_id',"=",Session::get('id_plan'))
									->get();

			$pruebasCumplimiento2=PruebaCumplimientoModel::where('planauditoria_id',"=",Session::get('id_plan'))
									->get();

			$marcosutilizados=array();

			foreach ($pruebasCumplimiento2 as $pc ) {
				$minternacionales=DetaCumpInternacionalModel::where('pruebacumplimiento_id','=',$pc->id)->get();
				$num_mi=DetaCumpInternacionalModel::where('pruebacumplimiento_id','=',$pc->id)->count();
				
				$mnacionales=DetaCumpNacionalModel::where('pruebacumplimiento_id','=',$pc->id)->get();
				$num_mn=DetaCumpNacionalModel::where('pruebacumplimiento_id','=',$pc->id)->count();

				$ninstitucionales=DetaCumpInstitucionalModel::where('pruebacumplimiento_id','=',$pc->id)->get();
				$num_ni=DetaCumpInstitucionalModel::where('pruebacumplimiento_id','=',$pc->id)->count();

				array_push($marcosutilizados, array('pcumplimiento'=>$pc,
									'num_mi'=>$num_mi,'marcos_i'=>$minternacionales,
									'num_mn'=>$num_mn,'marcos_n'=>$mnacionales,
									'num_ni'=>$num_ni,'normas_i'=>$ninstitucionales));
			}

			$personas=PersonaEntrevistarModel::select('id',DB::raw('CONCAT(apellidos, ", ", nombre) AS persona'))
							->where('planauditoria_id',Session::get('id_plan'))
							->orderBy('apellidos')->lists('persona','id');

			$oespecificos=ObjetivosModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('descripcion')->lists('descripcion','id');

			return View::make('pruebacumplimiento.index',array('personase'=>$personas,
							'oespecificos'=>$oespecificos,'cuestionariocump'=>$marcosutilizados));
		}
		function nuevaPCumplimiento(){
			$personas=PersonaEntrevistarModel::where('planauditoria_id',Session::get('id_plan'))
									->orderBy('apellidos')->lists('apellidos','id');
			return View::make('pruebacumplimiento.newprueba',array('personase'=>$personas));
		}
		function registrar(){
			if (Request::ajax()) {
				$pcumplimiento=new PruebaCumplimientoModel;
				$pcumplimiento->titulo						= Input::get('tituloc');
				$pcumplimiento->fecha_inicio				= Input::get('fechai');
				$pcumplimiento->fecha_fin					= Input::get('fechaf');
				//$pcumplimiento->tipo_marco					= Input::get('tmarco');

				$pcumplimiento->personaentrevistar_id		= Input::get('pentrevistar');
				$pcumplimiento->objetivos_especificos_id	=Input::get('oespecifico');
				$pcumplimiento->planauditoria_id			=Session::get('id_plan');

				$pcumplimiento->save();
				$last_pc=$pcumplimiento->id;

				//$datamarcos=array();
				$datamarcos= Input::get('mutilizar');

				for($i=0; $i<count($datamarcos); $i++) {
					$vmarco=$datamarcos[$i];
					if($vmarco["tp"] ==1){
						$detacumi=new DetaCumpInternacionalModel;
						$detacumi->pruebacumplimiento_id=$last_pc;
						$detacumi->marco_ref_internacional_id=$vmarco["marco"];
						$detacumi->save();

					}else{
						if($vmarco["tp"]==2){
							$detacumn=new DetaCumpNacionalModel;
							$detacumn->pruebacumplimiento_id=$last_pc;
							$detacumn->marco_ref_nacional_id=$vmarco["marco"];
							$detacumn->save();

						}else{
							if($vmarco["tp"]==3){
								$detacumni=new DetaCumpInstitucionalModel;
								$detacumni->pruebacumplimiento_id=$last_pc;
								$detacumni->normativa_institucional_id=$vmarco["marco"];
								$detacumni->save();

							}else{

							}
						}
					}
					# code...
				}

				$pruebasCumplimiento2=PruebaCumplimientoModel::where('planauditoria_id',"=",Session::get('id_plan'))
									->get();

				$marcosutilizados=array();

				foreach ($pruebasCumplimiento2 as $pc ) {
					$minternacionales=DetaCumpInternacionalModel::where('pruebacumplimiento_id','=',$pc->id)->get();
					$num_mi=DetaCumpInternacionalModel::where('pruebacumplimiento_id','=',$pc->id)->count();
					
					$mnacionales=DetaCumpNacionalModel::where('pruebacumplimiento_id','=',$pc->id)->get();
					$num_mn=DetaCumpNacionalModel::where('pruebacumplimiento_id','=',$pc->id)->count();

					$ninstitucionales=DetaCumpInstitucionalModel::where('pruebacumplimiento_id','=',$pc->id)->get();
					$num_ni=DetaCumpInstitucionalModel::where('pruebacumplimiento_id','=',$pc->id)->count();

					array_push($marcosutilizados, array('pcumplimiento'=>$pc,
										'num_mi'=>$num_mi,'marcos_i'=>$minternacionales,
										'num_mn'=>$num_mn,'marcos_n'=>$mnacionales,
										'num_ni'=>$num_ni,'normas_i'=>$ninstitucionales));
				}

				return array('error'=>'0',
						'dcuestionarios'=>' '.View::make('pruebacumplimiento.listacuestionarioscumpl',
						array('cuestionariocump'=>$marcosutilizados)));
				

				
			}
		}

	}
 ?>