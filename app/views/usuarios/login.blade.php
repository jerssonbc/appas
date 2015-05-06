@section('inicio')
	<div class="container">
				{{Form::open(array('url'=>'autenticar','class'=>'form-signin'))}}
						<h2 class="form-signin-heading">
          <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
          APPAS
        </h2>
							{{Form::email('email',null,array(
								'class'      => 'form-control',
								'maxlength'  => 62,
								'placeholder'=>'Ingrese su email',
								'required'   =>'true'
							))}}
						
							{{
								Form::password('password',array(
								'class'      => 'form-control',
								'maxlength'  => 16,
								'placeholder'=>'Ingrese su password',
								'required'   =>'true'
							));

							}}
						
							
								{{Form::submit('Acceder!',array('class'=>'btn btn-lg btn-primary btn-block'))}}
							
							
								<a class="btn btn-success" href="{{url('/registrar')}}">Registrate!
								</a>
							
						



					
				{{Form::close()}}
		</div>
		
@stop