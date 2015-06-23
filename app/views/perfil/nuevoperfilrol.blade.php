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
  	<h2>Registro de Perfil</h2>
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
		 
		<a href="{{url('/perfilEquipo')}}" class="btn btn-danger">Cancelar</a>
		{{
			Form::close()
		}}
		</div>

	@else
		<p>Registre primero Roles para poder agregar su perfil respectivo</p>
		<a href="{{url('/perfilEquipo')}}" class="btn btn-primary">Regresar a Perfil</a>
	@endif
  	</div>
 </div>

	
	
	
@stop