@section('inicio')
	<div class="container">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		{{
			Form::open(array('url'=>'registrar','class'=>'form-horizontal'))

		}}
			<h2 class="form-signin-heading">
      		<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
      		APPAS REGISTRO
    		</h2>
	
			<div class="form-group">
				{{
					Form::label('nombre', 'Nombre:', array('class' => 'col-sm-2 control-label'))
				}}
				<div class="col-sm-10">
					{{
						Form::text('nombre',null,array('placeholder'=>'Ingrese su nombre','class'=>'form-control','maxlength'=>50,'required'=>'true'))
					}}
				</div>
			</div>
			
			<div class="form-group">
				{{
					Form::label('apellidos', 'Apellidos:', array('class' => 'col-sm-2 control-label'))
				}}
				<div class="col-sm-10">
					{{
						Form::text('apellidos',null,array('placeholder'=>'Ingrese sus apellidos','class'=>'form-control','maxlength'=>70,'required'=>'true'))
					}}
				</div>
			</div>

			
			
			<div class="form-group">
				{{
					Form::label('email', 'E-mail:', array('class' => 'col-sm-2 control-label'))
				}}
				<div class="col-sm-10">
					{{
						Form::email('email',null,array('class'=>'form-control','maxlength'=>62,'placeholder'=>'Ingrese su e-mail','required'=>'true'));
					}}
				</div>
			</div>
			
			
			
			<div class="form-group">
				{{
					Form::label('password', 'Password:', array('class' => 'col-sm-2 control-label'))
				}}
				<div class="col-sm-10">
					{{
						Form::password('password',array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Ingrese su password','required'=>'true'))
					}}
				</div>
			</div>
			
			
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					{{
						Form::submit('Registrar!',array('class'=>'btn btn-lg btn-primary btn-block'))
					}}
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10 alinear-centro">
					<a  href="{{url('/login')}}">Login!
							</a>
				</div>
			</div>
			
			
			
						

	
		{{
		Form::close()
		}}
		</div>
		<div class="col-md-3"></div>

	</div>
	
@stop