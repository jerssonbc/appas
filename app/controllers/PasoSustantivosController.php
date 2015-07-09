<?php 
/**
* 
*/
class PasoSustantivosController extends BaseController
{
	
	function __construct()
	{
		# code...
	}
	public function ListPasos(){
			if (Request::ajax()) {

				$pasos=DB::table('tbla_pruebasustantiva')
				            ->join('tbla_pasos_sustantivos', 'tbla_pruebasustantiva.id', '='
				            			, 'tbla_pasos_sustantivos.pruebasustantiva_id')
				            ->where('tbla_pruebasustantiva.planauditoria_id', '=',Session::get('id_plan'))
				            ->where('tbla_pasos_sustantivos.pruebasustantiva_id', '=',Input::get('idcuestionario'))

				            ->select('tbla_pasos_sustantivos.id', 'tbla_pasos_sustantivos.descripcion',
				            		'tbla_pasos_sustantivos.cumplimiento',
				            	 'tbla_pasos_sustantivos.pruebasustantiva_id')
				            ->get();

				// $psustantiva=PruebaSustantivaModel::where('planauditoria_id',"=",Session::get('id_plan'))
				// 					->where('id','=',Input::get('idcuestionario'))
				// 					->get();

				$psustantiva=DB::table('tbla_pruebasustantiva')
									->where('planauditoria_id',"=",Session::get('id_plan'))
									->where('id','=',Input::get('idcuestionario'))
									->get();

				return array(
						'dpregunta'=>' '.View::make('pruebasustantiva.respuestapregunta',
									array('pcsustantiva'=>$psustantiva)),
						'dpasos'=>' '.View::make('pruebasustantiva.listapasos',
							array('pasos' => $pasos)));

			}
	}
	public function SavePaso()
	{
			if (Request::ajax()) {
				$pasosustantivo=new PasoSustantivoModel;
				$pasosustantivo->descripcion	=Input::get('descripcion');
				$pasosustantivo->pruebasustantiva_id	=Input::get('idcuestionario');


				$data=array(
					'descripcion' 	=>Input::get('descripcion')
					);

				if (!$pasosustantivo->validador($data)) {
					$data=View::make('erroresmensaje',array('cuerpo'=>$pasosustantivo->mostrar_errores()));

					return array('error'=>'1',
						'edata'=>'Lista de Errores:'.$data);
				
				}else{
					$pasosustantivo->save();
					
					$pasos=DB::table('tbla_pruebasustantiva')
				            ->join('tbla_pasos_sustantivos', 'tbla_pruebasustantiva.id', '='
				            			, 'tbla_pasos_sustantivos.pruebasustantiva_id')
				            ->where('tbla_pruebasustantiva.planauditoria_id', '=',Session::get('id_plan'))
				            ->where('tbla_pasos_sustantivos.pruebasustantiva_id', '=',Input::get('idcuestionario'))

				            ->select('tbla_pasos_sustantivos.id', 'tbla_pasos_sustantivos.descripcion',
				            	'tbla_pasos_sustantivos.cumplimiento',
				            	 'tbla_pasos_sustantivos.pruebasustantiva_id')
				            ->get();

					return array('error'=>'0',
						'edata'=>'Registro Exitoso',
						'dpasos'=>' '.View::make('pruebasustantiva.listapasos',
							array('pasos' => $pasos)));
					
				}
			}else{

			}
		}
		public function SaveCumplimiento(){
			if (Request::ajax()) {
				 PasoSustantivoModel::where('id','=',Input::get('idpaso_sustantivo'))
				 							->where('pruebasustantiva_id','=',Input::get('idcuestionario'))
				 							->update(array('cumplimiento' => Input::get('respuesta_s')));

				 return array('mrespuesta'=>'OK');

			}
		}
}
 ?>