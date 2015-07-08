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