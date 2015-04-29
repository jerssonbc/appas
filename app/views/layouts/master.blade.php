<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Aplicación Auditoria</title>
	{{HTML::style('css/gumby.css')}}
	{{HTML::style('css/main.css')}}
	{{HTML::script('js/jquery.min.js'); }}

	{{HTML::script('js/modernizr-2.6.2.min.js'); }}

	{{HTML::script('js/gumby.js'); }}

	{{HTML::script('js/gumby.toggleswitch.js'); }}

	{{HTML::script('js/gumby.init.js'); }}
	
	{{HTML::script('js/plugins.js'); }}

</head>
<body>
	<div class="navbar" id="navegacion">
		<div class="items_navegacion" gumby-trigger="#navegacion >.items_navegacion > ul">
			<a href="#" class="toggle">
				<i class="icon-menu"></i>
			</a>
		</div>
	</div>
	<div class="notificaciones">
		<div class="row">
			<div class="twelve columns">
				{{ @$notificacion }}
			</div>
		</div>
	</div>

	@yield('modulo')

</body>
</html>