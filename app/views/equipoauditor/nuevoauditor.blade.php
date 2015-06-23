@extends("layouts.plan")

@section("modulo")
<div class="row">
  	<div class="col-lg-12">
	<h2>Registro de Auditor</h2>
	{{Form::open(array('url'=>'addAuditor','id'=>'add_auditor','class'=>'form-horizontal'))}}
							<div class="form-group">
								{{Form::label('apellidosa','Apellidos: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{Form::text('apellidosa',null,array('placeholder'=>'Ingrese apellidos del auditor','class'=>'form-control','maxlength'=>50,'required'=>'true'));
								}}</div>
							</div>
							<div class="form-group">
								{{Form::label('nombrea','Nombre: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{

									Form::text('nombrea',null,array('placeholder'=>'Ingrese nombres del auditor','class'=>'form-control','maxlength'=>50,'required'=>'true'));
								}}</div>
							</div>
							<div class="form-group">
								{{Form::label('rola','Rol: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{

									Form::select('rola',$roles,null,array('class'=>'form-control','id'=>'idrola'))
								}}</div>
							</div>
							<div class="form-group">
								{{Form::label('dnia','DNI: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{
									Form::text('dnia',null,array('class'=>'form-control','maxlength'=>8,'placeholder'=>'Ingrese DNI del auditor','required'=>'true'));
								}}</div>
							</div>
							<div class="form-group">
							{{Form::label('carreraa','Carrera: ',array('class'=>'col-sm-2 control-label'))}}
							<div class="col-sm-10">
								{{
									Form::text('carreraa',null,array('class'=>'form-control','maxlength'=>100,'placeholder'=>'Ingrese carrer profesional de auditor','required'=>'true'));
								}}</div>
							</div>
							<div class="form-group">
							{{Form::label('direcciona','Direccion: ',array('class'=>'col-sm-2 control-label'))}}
							<div class="col-sm-10">
								{{
									Form::text('direcciona',null,array('class'=>'form-control','maxlength'=>60,'placeholder'=>'Ingrese carrer profesional de auditor','required'=>'true'));
								}}</div>
							</div>
							<div class="form-group">
								{{Form::label('emaila','Email: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{
									Form::email('emaila',null,array('class'=>'form-control','maxlength'=>62,'placeholder'=>'Ingrese e-mail del auditor'));
								}}</div>
							</div>
							
							<div class="form-group">
								{{Form::label('telefonoa','Telefono: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{
									Form::text('telefonoa',null,array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Ingrese telefono del auditor'));
								}}</div>
							</div>
							<div class="form-group">
							{{Form::label('celulara','Celular: ',array('class'=>'col-sm-2 control-label'))}}
							<div class="col-sm-10">
								{{
									Form::text('celulara',null,array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Ingrese celular del auditor'));
								}}</div>
							</div>
							<div class="form-group">
								 <div class="col-sm-offset-2 col-sm-10">
								{{
									Form::submit('Registrar',array('class'=>'btn btn-primary'));
								}}
								<a href="{{url('/equipoAuditor')}}" class="btn btn-danger">Cancelar</a>
								</div>
							</div>
	{{Form::close()}}
	</div>
</div>
@stop