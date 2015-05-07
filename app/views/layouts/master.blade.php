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
	        @include("base.sidebar")
	        <!-- End Sidebar -->
	        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	          <h1 class="page-header">AUDITORIA DE SISTEMAS</h1>
	          
	          <div class="table-responsive">
	            <!-- Table -->
	            @yield('modulo')
	            <!-- End Table -->
	          </div>
	        </div>
	      </div>
    	</div>

    @endif
	
	


	{{ HTML::script('js/ie10-viewport-bug-workaround.js') }}

	@include("base.scripts")


</body>
</html>