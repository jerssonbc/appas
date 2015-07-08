@extends("layouts.plan")
@section('estilospage')
	{{HTML::style('css/bootstrap-datepicker.css')}}
	{{HTML::style('css/dataTables.bootstrap.css')}}

@stop
@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Prueba Sustantiva</h2>
  </div>
</div>               
<hr />
<div class="row">
  	<div class="col-lg-12">

		<h2>Cuestionarios Sustantivos</h2>
		

		<a href="#" onclick="openRegCuestSustantivo();" class="btn btn-primary">Nuevo</a>

		<table class="table table-hover table-bordered  ">
		    <thead>
		        <tr>
		            <th>#</th>
		            <th>Titulo</th>
		            <th>Responsable</th>
		            <th>Objetivo Especifico</th>
		            <th>Pregunta</th>
		            <th>Marco Ref/Nac/Nor</th>

		             <th>--</th> 
		        </tr>
		    </thead>
		    <tbody id="datacsustantivos">
		    	  	@if($cuestionariosustan)
					    <?php $cont=1; ?>
						@for($i=0;$i<count($cuestionariosustan);$i++)
							<?php 
								$cuestionario=$cuestionariosustan[$i];

								$numrows=$cuestionario["num_mi"]+$cuestionario["num_mn"]+$cuestionario["num_ni"]+1;
							?>
							<tr class="alinea-tdcentro" >
								<td rowspan="{{$numrows}}" style="vertical-align:middle;">{{$cont++}}</td>

								<td rowspan="{{$numrows}}" style="vertical-align:middle;">
									{{$cuestionario["psustantiva"]->titulo}}
								</td>
								
								<td rowspan="{{$numrows}}" style="vertical-align:middle;">
									{{$cuestionario["psustantiva"]->personaResponsable->apellidos
									}}, {{$cuestionario["psustantiva"]->personaResponsable->nombre}}
								</td>


								<td rowspan="{{$numrows}}" style="vertical-align:middle;">
									
								{{$cuestionario["psustantiva"]->objetivoEspecifico->descripcion}}
								</td>

								<td rowspan="{{$numrows}}" style="vertical-align:middle;">
				
								{{$cuestionario["psustantiva"]->pregunta}}
								</td>

								<td></td>
								<td rowspan="{{$numrows}}" style="vertical-align:middle;">
								<a class = "btn btn-success btn-flat btn-rect" href="#" 
								onClick="openAgregarPasoSustantivo('{{$cuestionario['psustantiva']->id}}');">Agregar Paso</a>
								
								<a class = "btn btn-primary btn-flat btn-rect" href="#" 
								onClick="listarPasosSuntantivos('{{$cuestionario['psustantiva']->id}}');">Listar Pasos</a>

								</td>
								
							</tr>
							@if($cuestionario["num_mi"]>0)
					    		@foreach($cuestionario['marcos_i'] as $mi)
											<tr>
												<td>
													{{$mi->marcoInternacional->nombre}}
												</td>
												
											</tr>
						        @endforeach
					    	@endif
					    	@if($cuestionario["num_mn"]>0)
					    		@foreach($cuestionario['marcos_n'] as $mn)
											<tr>
												<td>
													{{$mn->marcoNacional->nombre}}
												</td>
												
											</tr>
						        @endforeach
					    	@endif
					    	@if($cuestionario["num_ni"]>0)
					    		@foreach($cuestionario['normas_i'] as $ni)
											<tr>
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
	<!-- Modal Cuestionario Sustantivo -->
	<div id="nuevapsustantiva" class="modal" role="dialog" aria-hidden="true">
			<div class="modal-dialog lgmodal">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              		<h4 class= "modal-title text-center" >Nuevo Cuestionario Sustantivo</h4>
					</div>
					<div class="modal-body">
							<div class="errores">
								
							</div>

						{{Form::open(array('id'=>'nuevo_cuestionarios','class'=>'form-horizontal'))}}

							
							<div class="form-group">
								{{Form::label('titulo_cs','Titulo: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{Form::text('titulo_cs',null,array('placeholder'=>'Ingrese titulo','class'=>'form-control','maxlength'=>400,'required'=>'true'))
								}}</div>
							</div>

							<div class="form-group">
								{{
									Form::label('oespecifico_cs','O Especifico:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('oespecifico_cs',$oespecificos,null,array('class'=>'form-control tamselect','required'=>'true',
											"id"=>'idoespecifico_cs'))
									}}
								</div>
							</div>

							<div class="form-group">
								{{
									Form::label('tmarco_cs','Tipo Marco:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('tmarco_cs',array('0'=>'--- Seleccione Tipo Marco ---',
											'1'=>'Marco Referencial Internacional',
											'2'=>'Marco Referencial Nacional','3'=>'Normativa Institucional'),
											null,array('class'=>'form-control tamselect','required'=>'true',
												'id'=>'idtipom_cs'))
									}}
								</div>

							</div>

							<div class="form-group">
								{{
									Form::label('mutilizado_cs','M/D a Utilizar:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-9">
									{{

										Form::select('mutilizar_cs',array(),null,array('class'=>'form-control tamselect','required'=>'true','id'=>'imutilizar_cs'))
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
									Form::label('mautilizar_cs','M a Utilizar:',
										array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('mautilizar_cs',array(),null,array('class'=>'form-control tamselect','multiple'=>'multiple','id'=>'mautilizar_cs'))
									}}
								</div>

								<div class="col-sm-offset-10 col-sm-2">

									<button type="button" onClick="removeElement();" class="btn btn-danger btn-line" style="margin:5px;">
										Quitar
									</button>
								</div>
							</div>

							<div class="form-group">
								{{Form::label('pregunta_cs','Pregunta: ',array('class'=>'col-sm-2 control-label'))}}
								<div class="col-sm-10">
								{{Form::text('pregunta_cs',null,array('placeholder'=>'Ingrese Pregunta','class'=>'form-control','maxlength'=>400,'required'=>'true'))
								}}</div>
							</div>

							<div class="form-group">
								{{
									Form::label('responsable_cs','Responsable:',array('class'=>'col-sm-2 control-label'))
								}}
								<div class="col-sm-10">
									{{

										Form::select('responsable_cs',$auditores,null,array('class'=>'form-control tamselect','required'=>'true'
											,'id'=>'responsable_cs'))
									}}
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

	<!-- Modal Pasos Sustantivos -->
		<div id="psustantivo" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog lgmodalmax">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class="modal-title text-center" id="titulo_nuevops" >Pasos del Cuestionario a Seguir</h4>
						</div>
						<div class="modal-body">
							<div class="errores">
									
							</div>
							<table class="table table-hover table-bordered" >
							    <thead>
							         <tr>
							        	<th>Pregunta</th>
							        	<th>Respuesta</th>
							            
							        </tr>
							    </thead>
							    <tbody id="psustantiva_cuest">
							    	

							    </tbody> 
							</table>

							{{Form::open(array('id'=>'nueva_pasoc',
							'class'=>'form-horizontal','role'=>'form'))}}

								{{Form::hidden('ids_cuestionario', '',array('id'=>'ids_cuestionario'))}}

								<div class="form-group">
									{{Form::label('pasoc','Paso: ',
											array('class'=>'col-sm-2 control-label'))}}

								    
								    <div class="col-sm-10">
								      {{Form::text('pasoc',null,array('placeholder'=>'',
								      	'class'=>'form-control','maxlength'=>400,'required'=>'true','id'=>'pasoc'))
									}}
								    </div>
								</div>

								<div class="form-group">
									 <div class="col-sm-offset-5">
										{{
											Form::submit('Registrar',array('class'=>'btn btn-primary btn-sm btn-round'));
										}}

										<a href="#" onclick="limpiarCampoPaso();" 
										class="btn btn-default btn-sm btn-round">
											Limpiar
										</a>
										
									</div>
								</div>

							{{Form::close()}}
							<!-- tabla Pasos -->
							<table class="table table-hover">
							    <thead>
							        <tr>
							        	<th>Pasos a Seguir</th>
							            
							        </tr>
							    </thead>
							    <tbody id="datapasos_sustantivos">

							    </tbody> 
							</table>
							<!-- fin tabla preguntas-->
						</div>

					</div>
				</div>
		</div>
	<!-- Fin Pasos Sustantivos -->

	<!-- Modal Lista Pasos Sustantivos -->
		<div id="listapsustantivos" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog lgmodalmax">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class= "modal-title text-center" id="titulo_ps">Pasos del Cuestionario</h4>
						</div>
						<div class="modal-body">
								<div class="errores">
									
								</div>
							
                            <table class="table table-hover table-bordered" >
							    <thead>
							         <tr>
							        	<th>Pregunta</th>
							        	<th>Respuesta</th>
							            
							        </tr>
							    </thead>
							    <tbody id="psustantiva_c">
							    	

							    </tbody> 
							</table>
							<div class="alert alert-success" id="mensajerespuesta">
                                Respuesta registrada exitosamente.
                            </div>
							{{Form::hidden('id_cuestionariolista', '',array('id'=>'id_cuestionariolista'))}}

							<!-- tabla preguntas -->
							<table class="table table-hover" id="data-listapreguntacumpl">
							    <thead>
							         <tr>
							        	<th>Pasos a Seguir</th>
							            
							        </tr>
							    </thead>
							    <tbody id="listapasos_sustantivos">

							    </tbody> 
							</table>
							<!-- fin tabla preguntas-->
						</div>

					</div>
				</div>
		</div>
	<!-- Find Lista Pasos Sustantivos-->



@stop

@section('scriptspage')
	{{HTML::script('js/jquery.dataTables.js')}}
    {{HTML::script('js/dataTables.bootstrap.js')}}
	{{HTML::script('js/csustantiva.js')}}
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