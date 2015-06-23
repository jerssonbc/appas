@extends("layouts.plan")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Personas a Entrevistar</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">
  	<a href="{{url('/personaEntrevistarNueva')}}" class="btn btn-primary">Nueva Persona</a>

		<table class="table table-striped">
		    <thead>
		        <tr>
		            <th>Cargo</th>
		            <th>Apellidos y Nombres</th>
		            <th>Acciones</th>
		        </tr>
		        </thead>
		        <tbody id="tbpersonas">
		            @foreach($personas as $persona)
		            <tr>
		                <td>{{ $persona->cargo }}</td>
		                <td> 
		                    {{$persona->apellidos}}, {{$persona->nombre}}
		                <td>
		                    <a class = "btn btn-info" href="#" 
		                    onClick="openEditPersona('{{$persona->id}}',
		                    '{{$persona->cargo}}','{{$persona->apellidos}}','{{$persona->nombre}}')">Editar</a>
		                    <a class = "btn btn-danger" href="#">Eliminar</a>
		                </td>
		            </tr>
		            @endforeach
		        </tbody>
		</table>
		<div id="editPersonaModal" class="modal" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		              		<h4 class="text-center">Edición Persona Entrevistar</h4>
		              		
							</div>
							<div class="modal-body">
									<div class="errores">
										
									</div>
								{{Form::open(array('id'=>'edit_Persona','class'=>'form-horizontal'))}}
									<input id="edit_persona_id" type="hidden" value="" />
									<div class="form-group">
										{{
											Form::label('cargoe','Cargo:',array('class'=>'col-sm-2 control-label'))
										}}
										<div class="col-sm-10">
										{{
											Form::text('cargoe',null,array('class'=>'form-control','maxlength'=>100,'required'=>'true'))
										}}</div>
									</div>
									<div class="form-group">
										{{
											Form::label('apellidose','Apellidos:',array('class'=>'col-sm-2 control-label'))
										}}
										<div class="col-sm-10">
										{{
											Form::text('apellidose',null,array('class'=>'form-control','maxlength'=>70,'required'=>'true'))
										}}</div>
									</div>
									<div class="form-group">
										{{
											Form::label('nombree','Nombre:',array('class'=>'col-sm-2 control-label'))
										}}
										<div class="col-sm-10">
										{{
											Form::text('nombree',null,array('class'=>'form-control','maxlength'=>100,'required'=>'true'))
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