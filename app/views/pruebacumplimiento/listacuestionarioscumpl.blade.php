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
			    			@endif " >
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
							<td>
								{{$mi->marcoInternacional->nombre}}
							</td>
							
						</tr>
	        @endforeach
    	@endif
    	@if($cuestionario["num_mn"]>0)
    		@foreach($cuestionario['marcos_n'] as $mn)
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
			    			@endif " >
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
				    					@if($cuestionario['pcumplimiento']->objetivos_especificos_id==4)
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