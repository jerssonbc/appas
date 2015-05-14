@extends("layouts.plan")

@section("modulo")
	<h1 class="page-header">Roles</h1>
	{{
		Form::open(array('url'=>'registrarRol'))
		}}
	
	{{
		Form::label('cargo','Cargo:')
	}}
	{{

		Form::select('cargo',$cargos,1,array('class'=>'form-control tamselect'))
	}}
	{{
		Form::label('rol','Rol:')
	}}
	{{
		Form::text('rol',null,array('class'=>'form-control','placeholder'=>'Ingrese descripción del rol','maxlength'=>400,'required'=>'true'))
	}}
	{{
		Form::submit('Registrar!',array('class'=>'btn btn-primary'));
	}}
	<a href="{{url('/perfilEquipo')}}" class="btn btn-primary">Cancelar</a>
	{{
		Form::close()
	}}
@stop