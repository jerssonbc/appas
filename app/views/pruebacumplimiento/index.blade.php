@extends("layouts.plan")
@section('estilospage')
	{{HTML::style('css/bootstrap-datepicker.css')}}
	{{HTML::style('css/dataTables.bootstrap.css')}}

@stop
@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Prueba de Cumplimiento</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">

		<h2>Cuestionarios de Cumplimiento</h2>
		<div class="btn btn-info">
			Objetivos Especificos
		</div>
		<div class="obj1">
			Evaluar la validez de las operaciones gestionadas por el Sistema de Ventas (DSS01)
		</div>
		<div class="obj2 ">
			Verificar la gestión de problemas del Sistema de Ventas (DSS03)
		</div>
		<div class="obj3 ">
			Evaluar los servicios de seguridad incorporadas en el Sistema de Ventas (DSS05)
		</div>
		<div class="obj4 ">
			Evaluar el grado de satisfacción del trabajador en el momento que hace uso del sistema para procesar alguna venta (ISO9126)
		</div>
		<br>
		<!-- <a href="{{url('/nuevoCuestionarioCumplimiento')}}" class="btn btn-primary">Nuevo</a> -->

		<a href="#" onclick="openRegCuesCumplimiento();" class="btn btn-primary">Nuevo</a>

		<table class="table  table-bordered  ">
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Titulo</th>
		            <th>Fecha Inicio</th>
		            <th>Fecha Fin</th>
		            <th>Auditado</th>
		            <th>Objetivo Especifico</th>
		            <th>Marco Ref/Nac/Nor</th>
		             <th>--</th> 
		        </tr>
		    </thead>
		    <tbody id="datacuestionarios">
		    	@if($cuestionariocump)
			    	<?php $cont=1; ?>
			    	@for($i=0;$i<count($cuestionariocump);$i++)
			    		<?php 
			    			$cuestionario=$cuestionariocump[$i];

			    			$numrows=$cuestionario["num_mi"]+$cuestionario["num_mn"]+$cuestionario["num_ni"]+1;
			    		?>
			    		<tr class="alinea-tdcentro 
			    			@if($cuestionario['pcumplimiento']->objetivos_especificos_id==1)
			    			 	objetivo1 
			    			@else
			    				@if($cuestionario['pcumplimiento']->objetivos_especificos_id==2)
			    					objetivo2
			    				@else
			    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==3)
			    						objetivo3
				    				@else
				    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==4)
			    						objetivo4
					    				@else
					    					
					    				@endif
				    					
				    				@endif

			    				@endif
			    			@endif ">
							<td rowspan="{{$numrows}}" style="vertical-align:middle;">{{$cont++}}</td>

							<td rowspan="{{$numrows}}" style="vertical-align:middle;">
								{{$cuestionario["pcumplimiento"]->titulo}}
							</td>
							<td rowspan="{{$numrows}}" style="vertical-align:middle;">
								{{
									date("d/m/Y", strtotime($cuestionario["pcumplimiento"]->fecha_inicio))
									
								}}
							</td>
							<td rowspan="{{$numrows}}" style="vertical-align:middle;">
								{{
									date("d/m/Y", strtotime($cuestionario["pcumplimiento"]->fecha_fin))
									}}
								
							</td>
							<td rowspan="{{$numrows}}" style="vertical-align:middle;">
								{{$cuestionario["pcumplimiento"]->personaEntrevistar->apellidos
								}}, {{$cuestionario["pcumplimiento"]->personaEntrevistar->nombre}}
							</td>
							<td rowspan="{{$numrows}}" style="vertical-align:middle;">
								
							{{$cuestionario["pcumplimiento"]->objetivoEspecifico->descripcion}}
							</td>

							<td></td>
							<td rowspan="{{$numrows}}" style="vertical-align:middle;">
							<a class = "btn btn-success btn-flat btn-rect" href="#" 
							onClick="openAgregarPreguntaCumplimiento('{{$cuestionario['pcumplimiento']->id}}');">Agregar Pregunta</a>
							
							<a class = "btn btn-primary btn-flat btn-rect" href="#" 
							onClick="listarPreguntasCumplimiento('{{$cuestionario['pcumplimiento']->id}}');">Listar Pregunta</a>

							</td>
			    			
			    		</tr>
			    		@if($cuestionario["num_mi"]>0)
				    		@foreach($cuestionario['marcos_i'] as $mi)
										<tr  class="alinea-tdcentro 
			    			@if($cuestionario['pcumplimiento']->objetivos_especificos_id==1)
			    			 	objetivo1 
			    			@else
			    				@if($cuestionario['pcumplimiento']->objetivos_especificos_id==2)
			    					objetivo2
			    				@else
			    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==3)
			    						objetivo3
				    				@else
				    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==4)
			    						objetivo4
					    				@else
					    					
					    				@endif
				    					
				    				@endif

			    				@endif
			    			@endif "  >
											<td>
												{{$mi->marcoInternacional->nombre}}
											</td>
											
										</tr>
					        @endforeach
				    	@endif
				    	@if($cuestionario["num_mn"]>0)
				    		@foreach($cuestionario['marcos_n'] as $mn)
										<tr  class="alinea-tdcentro 
			    			@if($cuestionario['pcumplimiento']->objetivos_especificos_id==1)
			    			 	objetivo1 
			    			@else
			    				@if($cuestionario['pcumplimiento']->objetivos_especificos_id==2)
			    					objetivo2
			    				@else
			    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==3)
			    						objetivo3
				    				@else
				    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==3)
			    						objetivo4
					    				@else
					    					
					    				@endif
				    					
				    				@endif

			    				@endif
			    			@endif "  >
											<td>
												{{$mn->marcoNacional->nombre}}
											</td>
											
										</tr>
					        @endforeach
				    	@endif
				    	@if($cuestionario["num_ni"]>0)
				    		@foreach($cuestionario['normas_i'] as $ni)
										<tr class="alinea-tdcentro 
			    			@if($cuestionario['pcumplimiento']->objetivos_especificos_id==1)
			    			 	objetivo1 
			    			@else
			    				@if($cuestionario['pcumplimiento']->objetivos_especificos_id==2)
			    					objetivo2
			    				@else
			    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==3)
			    						objetivo3
				    				@else
				    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==3)
			    						objetivo4
					    				@else
					    					
					    				@endif
				    					
				    				@endif

			    				@endif
			    			@endif " >
											<td>
												{{$ni->normaInstitucional->nombre}}
											</td>
											
										</tr>
					        @endforeach
				    	@endif
			    	@endfor

			    	
			    @endif
		            
		    </tbody>
		</table>
	</div>
</div>
	<!-- Modal Cuestionario Cumplimeinto -->
	<div id="nuevapcumplimiento" class="modal" role="dialog" aria-hidden="true">
			<div class="modal-dialog lgmodal">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              		<h4 class= "modal-title text-center" >Nuevo Cuestionario de Cumplimiento</h4>
					</div>
					<div class="modal-body">
							<div class="errores">
								
							</div>

						{{Form::open(array('id'=>'nuevo_cuestionarioc','class'=>'form-horizontal'))}}

							
							<div class="form-group">
								{{Form::label('tituloc','Titulo: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{Form::text('tituloc',null,array('placeholder'=>'Ingrese titulo','class'=>'form-control','maxlength'=>400,'required'=>'true'))
								}}</div>
							</div>

							<div class="form-group">
								{{
									Form::label('oespecifico','O Especifico:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('oespecifico',$oespecificos,null,array('class'=>'form-control tamselect','required'=>'true',
											"id"=>'idoespecifico'))
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
									Form::label('mutilizado','M/D a Utilizar:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-9">
									{{

										Form::select('mutilizar',array(),null,array('class'=>'form-control tamselect','required'=>'true','id'=>'imutilizar'))
									}}
								</div>
								<div class="col-sm-1">
								 <button type="button" 
								 	class="btn btn-success btn-xs btn-line" onClick="agregarMarco();">
								 	Agregar</button></div>
								<!-- ,'disabled'=>'true' -->
							</div>

							<div class="form-group">
								{{
									Form::label('mautilizar','M a Utilizar:',
										array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('mautilizar',array(),null,array('class'=>'form-control tamselect','multiple'=>'multiple','id'=>'mautilizar'))
									}}
								</div>

								<div class="col-sm-offset-10 col-sm-2">

									<button type="button" onClick="removeElement();" class="btn btn-danger btn-line" style="margin:5px;">
										Quitar
									</button>
								</div>
							</div>

							<div class="form-group">
								{{
									Form::label('personae','Auditado:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('personae',$personase,null,array('class'=>'form-control tamselect','required'=>'true'
											,'id'=>'ipentrevistar'))
									}}
								</div>
							</div>
							

							<div class="form-group">
								{{Form::label('fechail','Fecha Inicio: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-4" >
									<div class="input-group input-append date" id="finicio">
									{{

										Form::text('fechai',null,array('class'=>'form-control','required'=>'true'));
									}}
									<span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							
								{{Form::label('fechafl','Fecha Fin: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-4" >
									<div class="input-group input-append date" id="ffin">
										{{

											Form::text('fechaf',null,array('class'=>'form-control','required'=>'true'));
										}}
										<span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
									</div>
								</div>
							</div>
							
							<div class="form-group">
								 <div class="col-sm-offset-9">
									{{
										Form::submit('Guardar',array('class'=>'btn btn-primary '));
									}}
									 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

								</div>
							</div>
						{{Form::close()}}
					</div>

				</div>
			</div>
	</div>

	<!-- Modal Preguntas Cumplimiento -->
		<div id="pcumplimiento" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog lgmodalmax">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class="modal-title text-center" id="titulo_nuevopc" >Preguntas del Cuestionario</h4>
						</div>
						<div class="modal-body">
								<div class="errores">
									
								</div>

							{{Form::open(array('id'=>'nueva_preguntac',
							'class'=>'form-horizontal','role'=>'form'))}}

								{{Form::hidden('id_cuestionario', '',array('id'=>'id_cuestionario'))}}

								<div class="form-group">
									{{Form::label('preguntac','Pregunta: ',
											array('class'=>'col-sm-2 control-label'))}}

								    
								    <div class="col-sm-10">
								      {{Form::text('preguntac',null,array('placeholder'=>'',
								      	'class'=>'form-control','maxlength'=>400,'required'=>'true','id'=>'preguntac'))
									}}
								    </div>
								</div>

								<div class="form-group">
									 <div class="col-sm-offset-5">
										{{
											Form::submit('Registrar',array('class'=>'btn btn-primary btn-sm btn-round'));
										}}

										<a href="#" onclick="limpiarCampoPregunta();" 
										class="btn btn-default btn-sm btn-round">
											Limpiar
										</a>
										

									</div>
								</div>

							{{Form::close()}}
							<!-- tabla preguntas -->
							<table class="table table-hover">
							    <thead>
							        <tr>
							        	<th>Pregunta</th>
							            <th>Respuesta</th>
							            <th>Observación</th>
							        </tr>
							    </thead>
							    <tbody id="datapreguntacumpl">

							    </tbody> 
							</table>
							<!-- fin tabla preguntas-->
						</div>

					</div>
				</div>
		</div>
	<!-- Find Preguntas Cumplimiento -->

	<!-- Modal Lista Preguntas Cumplimiento -->
		<div id="listapcumplimiento" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog lgmodalmax">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class= "modal-title text-center" id="titulo_pc">Preguntas del Cuestionario</h4>
						</div>
						<div class="modal-body">
								<div class="errores">
									
								</div>
							<div class="alert alert-success" id="mensajerespuesta">
                                Respuesta registrada exitosamente.
                            </div>
							{{Form::hidden('id_cuestionariolista', '',array('id'=>'id_cuestionariolista'))}}

							<!-- tabla preguntas -->
							<table class="table table-hover" id="data-listapreguntacumpl">
							    <thead>
							        <tr>
							        	<th>Pregunta</th>
							            <th>Respuesta</th>
							            <th>Observación</th>
							        </tr>
							    </thead>
							    <tbody id="listapreguntacumpl">
							    	<tr>
							    		<td></td>
							    		<td></td>
							    		<td></td>
							    	</tr>

							    </tbody> 
							</table>
							<!-- fin tabla preguntas-->
						</div>

					</div>
				</div>
		</div>
	<!-- Find Lista Preguntas Cumplimiento -->



@stop

@section('scriptspage')
	{{HTML::script('js/jquery.dataTables.js')}}
    {{HTML::script('js/dataTables.bootstrap.js')}}
	{{HTML::script('js/ccumplimiento.js')}}
	{{HTML::script('js/bootstrap-datepicker.js')}}
	{{HTML::script('js/bootstrap-datepicker.es.min.js')}}
	<script type="text/javascript">
		$(document).ready(function(){
		
		$('#finicio').datepicker({
			language:'es',
	    	format: "dd/mm/yyyy"
		});
		$('#ffin').datepicker({
			language:'es',
	    	format: "dd/mm/yyyy"
		});
	});
	</script>
@stop