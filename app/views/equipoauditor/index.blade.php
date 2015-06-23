@extends("layouts.plan")
@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Equipo Auditor</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">
		<!-- <a href="#" onClick="openRegAuditor();" class="btn btn-primary">Nuevo</a> -->
		<a href="{{url('/nuevoAuditor')}}" class="btn btn-primary">Nuevo</a>

		<table class="table table-striped">
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Apellidos y  Nombre</th>
		            <th>DNI</th>
		            <th>Email</th>
		            <th>Telefono/Celular</th>
		            <th>Dirección</th>
		            <th>Carrera</th>
		            <th>Rol</th>
		            <th>---</th>
		        </tr>
		    </thead>
		    <tbody id="tbauditores">
		    		<?php $cont=1; ?>
		            @foreach($auditores as $auditor)
		            <tr id="auditor_{{$auditor->id}}">
		                <td>{{$cont++}}</td>
		                <td>{{$auditor->apellidos}},{{$auditor->nombre}}</td>
		                <td>{{$auditor->dni}}</td>
		                <td>{{$auditor->email}}</td>
		                @if($auditor->telefono)
		                	<td>{{$auditor->telefono}}
		                	@if($auditor->celular)
		                		/{{$auditor->celular}}</td>
		                	@else
								</td>
		                	@endif
		                @else
		                	<td>{{$auditor->celular}}</td>
		                @endif
		               <!--  <td>{{$auditor->telefono}}/{{$auditor->celular}}</td> -->
		                <td>{{$auditor->direccion}}</td>
		                <td>{{$auditor->carrera_profesional}}</td>
		                <td>{{$auditor->rolequipo->rol}}</td>
		                <td><a class = "btn btn-info" href="#" 
		                	onClick="openEditAuditor('{{$auditor->apellidos}}','{{$auditor->nombre}}',
										'{{$auditor->telefono}}','{{$auditor->celular}}','{{$auditor->id}}',
		                				'{{$auditor->perfilequipo_id}}');" >Editar</a></td>
		            </tr>
		            @endforeach
		    </tbody>
		</table>

		<div id="editarAuditorModal" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class= "modal-title text-center">Edición de Auditor</h4>
						</div>
						<div class="modal-body">
								<div class="errores">
									
								</div>

							{{Form::open(array('id'=>'edit_auditor','class'=>'form-horizontal'))}}

								{{Form::hidden('idauditor')}}
								<div class="form-group">
									{{Form::label('apellidosae','Apellidos: ',array('class'=>'col-sm-2 control-label'))}}
									<div class="col-sm-10">
									{{Form::text('apellidosae',null,array('placeholder'=>'Ingrese apellidos del auditor','class'=>'form-control','maxlength'=>50,'required'=>'true'));
									}}</div>
								</div>
								<div class="form-group">
									{{Form::label('nombreae','Nombre: ',array('class'=>'col-sm-2 control-label'))}}
									<div class="col-sm-10">
									{{

										Form::text('nombreae',null,array('placeholder'=>'Ingrese nombres del auditor','class'=>'form-control','maxlength'=>50,'required'=>'true'));
									}}</div>
								</div>
								<div class="form-group">
									{{Form::label('rolae','Rol: ',array('class'=>'col-sm-2 control-label'))}}
									<div class="col-sm-10">
									{{

										Form::select('rolae',$roles,null,array('class'=>'form-control','id'=>'idrolae'))
									}}</div>
								</div>
								<div class="form-group">
									{{Form::label('dniae','DNI: ',array('class'=>'col-sm-2 control-label'))}}
									<div class="col-sm-10">
									{{
										Form::text('dniae',null,array('class'=>'form-control','maxlength'=>8,'placeholder'=>'Ingrese DNI del auditor','required'=>'true'));
									}}</div>
								</div>
								<div class="form-group">
								{{Form::label('carreraae','Carrera: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
									{{
										Form::text('carreraae',null,array('class'=>'form-control','maxlength'=>100,'placeholder'=>'Ingrese carrer profesional de auditor','required'=>'true'));
									}}</div>
								</div>
								<div class="form-group">
								{{Form::label('direccionae','Direccion: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
									{{
										Form::text('direccionae',null,array('class'=>'form-control','maxlength'=>60,'placeholder'=>'Ingrese carrer profesional de auditor','required'=>'true'));
									}}</div>
								</div>
								<div class="form-group">
									{{Form::label('emailae','Email: ',array('class'=>'col-sm-2 control-label'))}}
									<div class="col-sm-10">
									{{
										Form::email('emailae',null,array('class'=>'form-control','maxlength'=>62,'placeholder'=>'Ingrese e-mail del auditor'));
									}}</div>
								</div>
								
								<div class="form-group">
									{{Form::label('telefonoae','Telefono: ',array('class'=>'col-sm-2 control-label'))}}
									<div class="col-sm-10">
									{{
										Form::text('telefonoae',null,array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Ingrese telefono del auditor'));
									}}</div>
								</div>
								<div class="form-group">
								{{Form::label('celularae','Celular: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
									{{
										Form::text('celularae',null,array('class'=>'form-control','maxlength'=>16,'placeholder'=>'Ingrese celular del auditor'));
									}}</div>
								</div>
								<div class="form-group">
									 <div class="col-sm-offset-2 col-sm-10">
									{{
										Form::submit('Editar',array('class'=>'btn btn-primary btn-block'));
									}}</div>
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
@stop