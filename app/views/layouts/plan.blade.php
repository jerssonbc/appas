<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Aplicación Auditoria</title>
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/dashboard.css')}}
	{{HTML::style('css/signin.css') }}
	{{HTML::style('css/estiloappas.css') }}
	{{HTML::style('css/bootstrap-datepicker.css')}}
	{{HTML::script('js/ie-emulation-modes-warning.js')}}
	{{HTML::script('js/jquery.min.js')}}
	{{HTML::script('js/bootstrap-datepicker.js')}}
	{{HTML::script('js/bootstrap-datepicker.es.min.js')}}


</head>
<body>
	@include("base.navPlan")
	
	<div class="row">
		<div class="well"> {{ @$notificacion }}</div>		
	</div>
	
	@if(!Session::get('id_usuario'))
		@yield('inicio')
		@yield('modulo')
    @else
    	<div class="container-fluid">
      		<div class="row">
	        <!-- Sidebar -->
	        @include("base.sidebarPlan")
	        <!-- End Sidebar -->
	        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          <h1 class="page-header">PLAN AUDITORIA</h1>
	          
	          
	            <!-- Table -->
	            @yield('modulo')
	            <!-- End Table -->
	          </div>
	        </div>
	      </div>
    	</div>

    @endif
	
	


	{{ HTML::script('js/ie10-viewport-bug-workaround.js') }}
	{{HTML::script('js/appas.js')}}
	@include("base.scripts")


</body>
</html>