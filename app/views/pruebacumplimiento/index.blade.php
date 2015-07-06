@extends("layouts.plan")
@section('estilospage')
	{{HTML::style('css/bootstrap-datepicker.css')}}
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

		<h1>Cuestionarios de Cumplimiento</h1>
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
		            <th>Objetivo Especifico</th>
		            <th>Marco Ref/Nac/Nor</th>
		            
		            <th>---</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php $cont=1; ?>
		    	@for($i=0;$i<count($cuestionariocump);$i++)
		    		<?php 
		    			$cuestionario=$cuestionariocump[$i];
		    			$numrows=$cuestionario["num_mi"]+$cuestionario["num_mn"]+$cuestionario["num_ni"]+1;
		    		?>
		    		<tr>
						<td rowspan="{{$numrows}}">{{$cont++}}</td>
						<td rowspan="{{$numrows}}">
							{{$cuestionario["pcumplimiento"]->titulo}}
						</td>
						<td rowspan="{{$numrows}}">
							{{$cuestionario["pcumplimiento"]->fecha_inicio}}
						</td>
						<td rowspan="{{$numrows}}">
							{{$cuestionario["pcumplimiento"]->fecha_fin}}
						</td>
						<td rowspan="{{$numrows}}">
							{{$cuestionario["pcumplimiento"]->personaEntrevistar->apellidos
							}}, {{$cuestionario["pcumplimiento"]->personaEntrevistar->nombre}}
						</td>
						<td rowspan="{{$numrows}}">
							
						{{$cuestionario["pcumplimiento"]->objetivoEspecifico->descripcion}}
						</td>
						<td></td>
		    			
		    		</tr>
		    	@endfor

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
		            
		    </tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		
		<h1>Preguntas de Cumplimiento</h1>
			 <a href="{{url('#')}}" class="btn btn-primary">Nuevo</a>
			
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
		    	

		            
		    </tbody> 
		</table>
			
		<div id="nuevapcumplimiento" class="modal" role="dialog" aria-hidden="true">
				<div class="modal-dialog lgmodal">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	              		<h4 class= "modal-title text-center">Nuevo Cuestionario de Cumplimiento</h4>
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
	</div>
</div>

	
@stop

@section('scriptspage')
	{{HTML::script('js/ccumplimiento.js')}}
	{{HTML::script('js/bootstrap-datepicker.js')}}
	{{HTML::script('js/bootstrap-datepicker.es.min.js')}}
	<script type="text/javascript">
	$('#finicio').datepicker({
		language:'es',
    	format: "dd/mm/yyyy"
	});
	$('#ffin').datepicker({
		language:'es',
    	format: "dd/mm/yyyy"
	});
	</script>
@stop