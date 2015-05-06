@section('inicio')
			<div class="container">
			{{
				Form::open(array('url'=>'registrar','class'=>'form-signin'))

			}}
				<h2 class="form-signin-heading">
          		<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          		APPAS REGISTRO
        		</h2>
		
				
				{{
					Form::text('nombre',null,array('placeholder'=>'Ingrese su nombre','class'=>'form-control','maxlength'=>50,'required'=>'true'));
				}}
				

				{{
					Form::text('apellidos',null,array('placeholder'=>'Ingrese sus apellidos','class'=>'form-control','maxlength'=>70,'required'=>'true'));
				}}
				

				
				{{
					Form::email('email',null,array('class'=>'form-control','maxlength'=>62,'placeholder'=>'Ingrese su e-mail','required'=>'true'));
				}}
				

				
				{{
					Form::password('password',array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Ingrese su password','required'=>'true'));
				}}
			
				{{
					Form::submit('Registrar!',array('class'=>'btn btn-lg btn-primary btn-block'));
				}}
				

			
				{{
				Form::close()
				}}

		</div>
	
@stop