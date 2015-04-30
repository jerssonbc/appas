<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Aplicación Auditoria</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/dashboard.css')}}
	{{HTML::style('css/signin.css') }}
	{{HTML::script('js/ie-emulation-modes-warning.js')}}

</head>
<body>
	@include("base.nav")

				@if(!Session::get('id_usuario'))
				@else
					<li>
					<!-- Menu para sali-->
					<a href="{{url('/salir')}}">
						<span>Salir</span>
						
					</a>
					</li>
				@endif
	
	
				{{ @$notificacion }}
		
	
	
	@yield('modulo')


	{{ HTML::script('js/ie10-viewport-bug-workaround.js') }}

	@include("base.scripts")


</body>
</html>