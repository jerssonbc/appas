<?php 
	/**
	* 
	*/
	class PlanAuditoriaController extends BaseController
	{
		protected $layout='layouts.master';
		public function Index()
		{
			$empresas= EmpresaModel::all();
			return View::make('empresa.Index')->with('empresas',$empresas);
		}
		public function Nuevo()
		{
			$planAuditoria= PlanAuditoriaModel::all();
			return View::make('planAuditoria.new')->with('planAuditoria',$planAuditoria);
		}
		public function Administrar($id)
		{
			
			Session::put('id_plan',$id);


			$datos= PlanAuditoriaModel::find($id);
			if (is_null($datos))
			{
				return Redirect::to('planAuditoria');
			}
			return View::make('planAuditoria.mostrar')->with('datos', $datos);
		}
		public function Create()
		{
			return View::make('empresa.new');
		}

		public function Mostrar($id)
		{
			$Empresa = EmpresaModel::find($id);
			return View::make('Empresa.mostrar')->with('Empresa',$Empresa);
		}
		public function Edit()
		{
			$planAuditoria = PlanAuditoriaModel::find(Session::get('id_empresa'));
			
			return View::make('planAuditoria.edit')->with('planAuditoria',$planAuditoria);
		}
		public function Update()
		{
			$datos = PlanAuditoriaModel::find(Session::get('id_plan'));
			$datos->fill(Input::all());
			$datos->save();
			return View::make('planAuditoria.mostrar',array('datos' => $datos));
		}

		public function Save()
		{
			$planAuditoria=new PlanAuditoriaModel;
			$planAuditoria->empresa_id	=Session::get('id_empresa');
			$planAuditoria->realidad_problematica	    =Input::get('realidad_problematica');
			$planAuditoria->titulo_auditoria 		=Input::get('titulo_auditoria');
			$planAuditoria->objetivo_general 	=Input::get('objetivo_general');
			$planAuditoria->alcance 	=Input::get('alcance');
			$planAuditoria->alineamiento_negocio 	=Input::get('alineamiento_negocio');
			$planAuditoria->estado 	=1;

			$data=array(
				'empresa_id'		=>Session::get('id_empresa'),
				'realidad_problematica' 	=>Input::get('realidad_problematica'),
				'titulo_auditoria'			=>Input::get('titulo_auditoria'),
				'objetivo_general'		=>Input::get('objetivo_general'),
				'alcance'		=>Input::get('alcance'),
				'alineamiento_negocio'		=>Input::get('alineamiento_negocio'),
				'estado'		=>1
				);

			if (!$planAuditoria->validador($data)) {
				$this->layout->modulo=View::make('mensaje',array('encabezado' => 'Advertencia:',
					'cuerpo' =>$planAuditoria->mostrar_errores()));
			}else{
				$planAuditoria->save();
				$this->layout->notificacion='Registro Exitoso';
				return Redirect::to('planAuditoria');
			}
		}
		public function Listar()
		{
			$planAuditoria= PlanAuditoriaModel::where('empresa_id',Session::get('id_empresa'))->get();
			if (is_null($planAuditoria))
			{
				App::abort(404);
			}

			return View::make('planAuditoria.index',array('planAuditoria' => $planAuditoria));
		}
	}
 ?>