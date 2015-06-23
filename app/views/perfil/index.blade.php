@extends("layouts.plan")
@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Perfil de Equipo Auditor</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">
		<h3>Roles</h3>
		<a href="{{url('/nuevoRolPerfil')}}" class="btn btn-primary">Nuevo</a>

		<table class="table table-hover table-bordered">
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Rol</th>
		            <th>---</th>
		        </tr>
		    </thead>
		    <tbody>
		    		<?php $cont=1; ?>
		            @foreach($roles as $rol)
		            <tr>
		                <td>{{$cont++}}</td>
		                <td><span id="spanrol_{{$rol->id}}">{{ $rol->rol }}</span></td>
		                <td><a class = "btn btn-info" href="#" onClick="openEditRol('{{$rol->id}}');" >Editar</a></td>
		            </tr>
		            @endforeach
		    </tbody>
		</table>
		<div id="editRolModal" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog lgmodal">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class="text-center">Edición de Rol</h4>
	              		
						</div>
						<div class="modal-body">
								<div class="errores">
									
								</div>
							{{Form::open(array('id'=>'edit_rol'))}}
								<input id="edit_rol_id" type="hidden" value="" />
								<div class="form-group">
									{{
										Form::label('erol','Rol:')
									}}
									{{
										Form::text('erol',null,array('class'=>'form-control','id'=>'idedirol','maxlength'=>400,'required'=>'true'))
									}}
								</div>
								<div class="form-group">
								
									{{
										Form::submit('Editar',array('class'=>'btn btn-primary btn-lg btn-block'));
									}}
								</div>
							{{Form::close()}}
						</div>

						<div class="modal-footer">
					        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>
				</div>
		</div>
	</div>
</div>	
<div class="row">
	<div class="col-lg-12">
		<h3>Perfiles de Roles</h3>

		@if($numroles>0)
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
			    <tbody>
			    		<?php $cont=1; ?>
						@for($i=0; $i<count($rolyperfiles); $i++)
							<?php $rp=$rolyperfiles[$i];?>
							<tr> 
								 <td rowspan="{{$rp['numperfiles']}}">{{$cont++}}</td>
								 <td rowspan="{{$rp['numperfiles']}}"><span id="spanrp_{{$rp['rol']->id}}">{{$rp['rol']->rol}}</span></td>
								 <td></td>
								 <td></td>
							</tr>
							
							@foreach($rp['perfil'] as $perfil)
								<tr>
									<td>
										{{$perfil->perfil}}
									</td>
									<td>
										<a class = "btn btn-info" href="{{url('/editarPerfil',$perfil->id )}}">Editar</a>
									</td>
								</tr>
			            	@endforeach
							
						@endfor

			            
			    </tbody>
			</table>		
		@else
			<p>Para registrar un Perfil, Registre los Roles </p>
		@endif
	</div>
</div>
	
@stop