@extends("layouts.plan")

@section('modulo')

<div class="row">
  <div class="col-lg-12">
    <h2>Perfil de Equipo Auditor</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">
	  	<h2>Editar Perfil</h2>
			{{
			Form::open(array('url'=>'actualizarPerfil/'.$perfil->id,'method'=>'POST','
				class'=>''))
			}}
				<div class="form-group">
				{{
					Form::label('rol','Rol:')
				}}
				{{

					Form::select('rol',$roles,$perfil->perfilequipo_id,array('class'=>'form-control tamselect'))
				}}
				</div>
				<div class="form-group">
				{{
					Form::label('perfil','Perfil:')
				}}
				{{
					Form::text('perfil',$perfil->perfil,array('class'=>'form-control','placeholder'=>'Ingrese descripción del rol','maxlength'=>400,'required'=>'true'))
				}}
				</div>
				<div class="form-group">
				{{
					Form::submit('Registrar!',array('class'=>'btn btn-primary'));
				}}
				<a href="{{url('/perfilEquipo')}}" class="btn btn-danger">Cancelar</a></div>
			{{
				Form::close()
			}}
		
	</div>
</div>
	

@stop