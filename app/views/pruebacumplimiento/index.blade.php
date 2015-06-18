@extends("layouts.plan")
@section("modulo")
	<h1 class="page-header">Cuestionarios de Cumplimiento</h1>
	<a href="{{url('/nuevoCuestionarioCumplimiento')}}" class="btn btn-primary">Nuevo</a>

	<table class="table table-hover table-bordered">
	    <thead>
	        <tr>
	            <th>#</th>
	            <th>Titulo</th>
	            <th>Fecha Inicio</th>
	            <th>Fecha Fin</th>
	            <th>Auditado</th>
	            <th>Marco Ref/Nac/Nor</th>
	            <th>Objetivo Especifico</th>
	            <th>---</th>
	        </tr>
	    </thead>
	    <!-- <tbody>
	    		
	            
	    </tbody> -->
	</table>
	
	<br>
	<h1 class="page-header">Preguntas de Cumplimiento</h1>


		 <a href="{{url('/nuevoPerfilRol')}}" class="btn btn-primary">Nuevo</a>
		
		<table class="table table-hover">
		    <thead>
		        <tr>
		        	<th>#</th>
		            <th>Rol</th>
		            <th>Pefil</th>
		            <td>---</td>
		        </tr>
		    </thead>
		    <!-- <tbody>
		    		

		            
		    </tbody> -->
		</table>
		

@stop