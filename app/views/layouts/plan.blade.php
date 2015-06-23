<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
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
<body class="padTop53">
	<div id="wrap">
		<div id="top">
			@include("base.navPlan")
		</div>
		@if(!Session::get('id_usuario'))
			@yield('inicio')
			@yield('modulo')
	    @else
	      	<div id="left">
	     		 <!-- Sidebar -->
		        @include("base.sidebarPlan")
		        <!-- End Sidebar -->
		    </div> 

		    <!--PAGE CONTENT -->
        		<div id="content">
        			<div class="inner"> 
        				 <!-- PUEDE SER BREACUM-->
		         	
		            	@yield('modulo')
		            </div>
		    	</div>
        	<!--END PAGE CONTENT -->     
	    @endif	
	</div>
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