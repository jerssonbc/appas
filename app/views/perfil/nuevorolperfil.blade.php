@extends("layouts.plan")

@section("modulo")

<div class="row">
  <div class="col-lg-12">
    <h2>Perfil de Equipo Auditor</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">
		<h2>Registro de Rol</h2>
		{{
			Form::open(array('url'=>'registrarRol'))
			}}
		<div class="form-group">
		{{
			Form::label('rol','Rol:')
		}}
		{{
			Form::text('rol',null,array('class'=>'form-control','placeholder'=>'Ingrese descripción del rol','maxlength'=>400,'required'=>'true'))
		}}</div>
		<div class="form-group">
		{{
			Form::submit('Registrar!',array('class'=>'btn btn-primary'));
		}}
		
		<a href="{{url('/perfilEquipo')}}" class="btn btn-danger">Cancelar</a>
		</div>
		{{
			Form::close()
		}}
	</div>
</div>
@stop