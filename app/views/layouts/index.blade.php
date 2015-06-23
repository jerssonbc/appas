<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Aplicación Auditoria</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- estilos globales -->
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/main.css')}}
    {{HTML::style('css/theme.css')}}
    {{HTML::style('css/MoneAdmin.css')}}
    {{HTML::style('css/font-awesome.css')}}
    {{HTML::style('css/estiloappas.css')}}

    <!-- fin de estilos globales-->
	<!-- estilos de paginas -->
    @section('estilospage')
    @show
	<!-- fin de estilod de paginas-->

</head>
<body class="padTo53">
	<div id="wrap">
		<div id="top">
			@include("base.nav")
		</div>
	{{--<div class="row">
		<div class="well"> {{ @$notificacion }}</div>		
	</div> --}}
	
	@if(Session::get('id_usuario'))
		
			<div class="container">

					<br><br><br><br>
				{{--	<div class="row">
						<div class="col-lg-12">
							@yield('titulo')	
						</div>
					</div>--}}

					@yield('lista')
				
			</div>
		
	@endif
	</div>
	<br><br><br><br><br><br>
	<br>
	<!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Appas &nbsp;2015 &nbsp;</p>
    </div>
    <!--END FOOTER -->
	
	<!--SCRIPTS GLOBALES  -->
		{{HTML::script('js/jquery-2.0.3.min.js')}}
		{{HTML::script('js/bootstrap.min.js')}}
		{{HTML::script('js/modernizr-2.6.2-respond-1.1.0.min.js')}}
	<!-- FIN SCRIPTS GLOBALES-->
	{{HTML::script('js/appas.js')}}

	@section('scriptspage')
	
    @show
	


</body>
</html>