@section('estilospage')
	{{HTML::style('css/login.css')}}
	{{HTML::style('css/magic.css')}}
@stop
@section('inicio')
	<div class="container">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<section class="login-form">
				{{Form::open(array('url'=>'autenticar',
						'class'=>'','role'=>'login'))}}
						<h3 class="form-signin-heading">
				          <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span>
				          	APPAS
				        </h3>
				        <!-- <img src="http://i.imgur.com/RcmcLv4.png" class="img-responsive" alt="" /> -->

							{{Form::email('email',null,array(
								'class'      => 'form-control input-lg',
								'maxlength'  => 62,
								'placeholder'=>'Ingrese su email',
								'required'   =>'true'
							))}}
						
							{{
								Form::password('password',array(
								'class'      => 'form-control input-lg',
								'maxlength'  => 16,
								'placeholder'=>'Ingrese su password',
								'required'   =>'true'
							))

							}}
						
							{{Form::submit('Acceder!',array('class'=>'btn btn-lg btn-primary btn-block'))}}
							
							<div>
								<a href="{{url('/registrar')}}">Registrate!
								</a>
							</div>
								
						
				{{Form::close()}}
			</section>
		</div>
		<div class="col-md-4"></div>
	</div>
		
@stop