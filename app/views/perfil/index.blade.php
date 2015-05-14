@extends("layouts.plan")
@section("modulo")
	<h1 class="page-header">Roles</h1>
	<a href="{{url('/nuevoRolPerfil')}}" class="btn btn-primary">Nuevo</a>

	<table class="table table-striped">
	    <thead>
	        <tr>
	            <th>#</th>
	            <th>Rol</th>
	            
	        </tr>
	    </thead>
	    <tbody>
	    		<?php $cont=0; ?>
	            @foreach($roles as $rol)
	            <tr>
	                <td><?php echo $cont+1; ?></td>
	                <td>{{ $rol->rol }}</td>
	                
	            </tr>
	            @endforeach
	    </tbody>
	</table>

	<br>
	<h1 class="page-header">Perfiles de Roles</h1>

	@if($numroles>0)
		<!-- <a href="{{url('/nuevoPerfilRol')}}" class="btn btn-primary">Nuevo</a>
		
		<table class="table table-striped">
		    <thead>
		        <tr>
		            <th>Rol</th>
		            <th>Pefil</th>
		            
		        </tr>
		    </thead>
		    <tbody>
		    		<?php $cont=0; ?>
		            @foreach($roles as $rol)
		            <tr>
		                <td><?php echo $cont+1; ?></td>
		                <td>{{ $rol->rol }}</td>
		                
		            </tr>
		            @endforeach
		    </tbody>
		</table> -->
	@else
		<p>Para registrar un Perfil, Registre los Roles </p>
	@endif
@stop