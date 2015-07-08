<?php 
	/**
	* 
	*/
	class PreguntaCumplimientoController extends BaseController
	{
		
		function __construct()
		{
			# code...
		}

		public function ListPreguntas(){
			if (Request::ajax()) {

				$preguntas=DB::table('tbla_pruebacumplimiento')
				            ->join('tbla_preguntacumplimiento', 'tbla_pruebacumplimiento.id', '='
				            			, 'tbla_preguntacumplimiento.pruebacumplimiento_id')
				            ->where('tbla_pruebacumplimiento.planauditoria_id', '=',Session::get('id_plan'))
				            ->where('tbla_preguntacumplimiento.pruebacumplimiento_id', '=',Input::get('idcuestionario'))

				            ->select('tbla_preguntacumplimiento.id', 'tbla_preguntacumplimiento.pregunta',
				            	 'tbla_preguntacumplimiento.respuesta','tbla_preguntacumplimiento.obervaciones',
				            	 'tbla_preguntacumplimiento.pruebacumplimiento_id')
				            ->get();

				return array(
						'dpreguntas'=>' '.View::make('pruebacumplimiento.listapreguntas',
							array('preguntas' => $preguntas)));

			}
		}



		public function Save()
		{
			if (Request::ajax()) {
				$preguntacumpl=new PreguntaCumplimientoModel;
				$preguntacumpl->pregunta 	=			Input::get('preguntac');
				$preguntacumpl->pruebacumplimiento_id=	Input::get('idcuestionario');


				$data=array(
					'pregunta' 	=>Input::get('preguntac')
					);

				if (!$preguntacumpl->validador($data)) {
					$data=View::make('erroresmensaje',array('cuerpo'=>$preguntacumpl->mostrar_errores()));

					return array('error'=>'1',
						'edata'=>'Lista de Errores:'.$data);
				
				}else{
					$preguntacumpl->save();
					// $preguntas=PreguntaCumplimientoModel::where('pruebacumplimiento_id','=',Input::get('idcuestionario'))
					// 									->get();

					$preguntas=DB::table('tbla_pruebacumplimiento')
				            ->join('tbla_preguntacumplimiento', 'tbla_pruebacumplimiento.id', '='
				            			, 'tbla_preguntacumplimiento.pruebacumplimiento_id')
				            ->where('tbla_pruebacumplimiento.planauditoria_id', '=',Session::get('id_plan'))
				            ->where('tbla_preguntacumplimiento.pruebacumplimiento_id', '=',Input::get('idcuestionario'))

				            ->select('tbla_preguntacumplimiento.id', 'tbla_preguntacumplimiento.pregunta',
				            	 'tbla_preguntacumplimiento.respuesta','tbla_preguntacumplimiento.obervaciones',
				            	 'tbla_preguntacumplimiento.pruebacumplimiento_id')
				            ->get();

					return array('error'=>'0',
						'edata'=>'Registro Exitoso',
						'dpreguntas'=>' '.View::make('pruebacumplimiento.listapreguntas',
							array('preguntas' => $preguntas)));
					// $this->layout->notificacion='Registro Exitoso';
					// return Redirect::to('empresas');
				}
			}else{

			}
		}

		public function SaveRespuesta(){
			if (Request::ajax()) {
				 PreguntaCumplimientoModel::where('id','=',Input::get('idpregunta'))
				 							->where('pruebacumplimiento_id','=',Input::get('idcuestionario'))
				 							->update(array('respuesta' => Input::get('respuestac')));

				 return array('mrespuesta'=>'OK');

			}
		}

		public function SaveObservacion(){
			if (Request::ajax()) {
				 PreguntaCumplimientoModel::where('id','=',Input::get('idpregunta'))
				 							->where('pruebacumplimiento_id','=',Input::get('idcuestionario'))
				 							->update(array('obervaciones' => Input::get('observacionc')));

				 return array('mrespuesta'=>'OK');

			}

		}
	}
 ?>