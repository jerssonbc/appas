@extends("layouts.plan")
@section("modulo")
	<h1 class="page-header">Cuestionarios de Cumplimiento</h1>
	<!-- <a href="{{url('/nuevoCuestionarioCumplimiento')}}" class="btn btn-primary">Nuevo</a> -->

	<a href="#" onclick="openRegCuesCumplimiento();" class="btn btn-primary">Nuevo</a>

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
		
	<div id="nuevapcumplimiento" class="modal" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              		<h4 class= "modal-title text-center">Nuevo Cuestionario de Cumplimiento</h4>
					</div>
					<div class="modal-body">
							<div class="errores">
								
							</div>

						{{Form::open(array('id'=>'nuevo_cuestionario','class'=>'form-horizontal'))}}

							
							<div class="form-group">
								{{Form::label('titulo','Titulo: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{Form::text('titulo',null,array('placeholder'=>'Ingrese titulo','class'=>'form-control','maxlength'=>400,'required'=>'true'));
								}}</div>
							</div>

							<div class="form-group">
								{{
									Form::label('oespecifico','O Especifico:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('oespecifico',$oespecificos,null,array('class'=>'form-control tamselect','required'=>'true'))
									}}
								</div>
							</div>

							<div class="form-group">
								{{
									Form::label('tmarco','Tipo Marco:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('tmarco',array('0'=>'--- Seleccione Tipo Marco ---',
											'1'=>'Marco Referencial Internacional',
											'2'=>'Marco Referencial Nacional','3'=>'Normativa Institucional'),
											null,array('class'=>'form-control tamselect','required'=>'true',
												'id'=>'idtipom'))
									}}
								</div>
							</div>

							<div class="form-group">
								{{
									Form::label('mutilizado','M a Utilizar:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('mutilizado',array(),null,array('class'=>'form-control tamselect','required'=>'true','id'=>'imutilizar'))
									}}
								</div>
								<!-- ,'disabled'=>'true' -->
							</div>


							<div class="form-group">
								{{
									Form::label('personae','Auditado:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('personae',$personase,null,array('class'=>'form-control tamselect','required'=>'true'))
									}}
								</div>
							</div>
							

							<div class="form-group">
								{{Form::label('fechai','Fecha Inicio: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-4" id="finicio">
								{{

									Form::text('fechai',null,array('class'=>'form-control','required'=>'true'));
								}}</div>

								{{Form::label('fechaf','Fecha Inicio: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-4" id="ffin">
								{{

									Form::text('fechaf',null,array('class'=>'form-control','required'=>'true'));
								}}<span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span></div>
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
	<script type="text/javascript">
	$('#finicio input').datepicker({
		language:'es',
    	format: "dd/mm/yyyy"
	});
	$('#ffin input').datepicker({
		language:'es',
    	format: "dd/mm/yyyy"
	});

	
	</script>
@stop