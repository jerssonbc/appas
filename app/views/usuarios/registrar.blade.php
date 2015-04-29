@section('modulo')
	<div class="row">
		<div class="push_three six columns formulario">

			<div class="encabezado">
				Registrate como nuevo usuario funciona
			</div>
			<div class="contenido">
				<!-- id_oficina: nombre del select-->
			{{
				Form::open(array('url'=>'registrar'))

			}}
			<ul>
				
				<li class="field">
				{{
					Form::text('nombre',null,array('placeholder'=>'Ingrese su nombre','class'=>'input xxwide','maxlength'=>30,'required'=>'true'));
				}}
				</li>

				<li class="field">
				{{
					Form::text('apellido',null,array('placeholder'=>'Ingrese sus apellidos','class'=>'input xxwide','maxlength'=>30,'required'=>'true'));
				}}
				</li>

				<li class="field">
				{{
					Form::email('email',null,array('class'=>'input xxwide','maxlength'=>62,'placeholder'=>'Ingrese su e-mail','required'=>'true'));
				}}
				</li>

				<li class="field">
				{{
					Form::password('password',array('class'=>'input xxwide','maxlength'=>16,'placeholder'=>'Ingrese su password','required'=>'true'));
				}}
				</li>

				<li>
					<div class="medium primary btn">
						{{
							Form::submit('Registrate !');
						}}
					</div>
				</li>

			</ul>
			{{
				Form::close()
				}}
			</div>
		</div>
	</div>
@stop