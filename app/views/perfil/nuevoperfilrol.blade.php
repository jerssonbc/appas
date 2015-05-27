@extends("layouts.plan")

@section("modulo")
	<h1 class="page-header">Perfil de Rol</h1>
	@if($numroles>0)
		{{
		Form::open(array('url'=>'registrarPerfil'))
		}}
		<div class="form-group">
		{{
			Form::label('rol','Rol:')
		}}
		{{

			Form::select('rol',$roles,null,array('class'=>'form-control tamselect'))
		}}
		</div>
		<div class="form-group">
		{{
			Form::label('perfil','Perfil:')
		}}
		{{
			Form::text('perfil',null,array('class'=>'form-control','placeholder'=>'Ingrese descripción del rol','maxlength'=>400,'required'=>'true'))
		}}
		</div>
		<div class="form-group">
		{{
			Form::submit('Registrar!',array('class'=>'btn btn-primary'));
		}}
		<a href="{{url('/perfilEquipo')}}" class="btn btn-primary">Cancelar</a>
		{{
			Form::close()
		}}
		</div>

	@else
		<p>Registre primero Roles para poder agregar su perfil respectivo</p>
		<a href="{{url('/perfilEquipo')}}" class="btn btn-primary">Regresar a Perfil</a>
	@endif
	
	
@stop