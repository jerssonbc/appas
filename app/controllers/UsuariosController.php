<?php 

	class UsuariosController extends BaseController
	{
		protected $layout='layouts.master';
		function __construct()
		{
			# code...
		}
		function registrar(){
			$this->layout->notificacion="Bienvendio a Auditoria Applicación";
			$this->layout->modulo=View::make('usuarios.registrar');
		}
	}
 ?>