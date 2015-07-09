 <?php $cont=1; ?>
 @foreach($preguntas as $preguntac)
	<tr>
		<td>
			{{$cont}}.{{$preguntac->pregunta}}
		</td>
		<td>
			<div class="form-group">
					
	                                            
	              <label class="radio-inline">
					
					@if($preguntac->respuesta==1)
	                  <input type="radio" name="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}" 
	                  id="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}1" checked="true" value="1" 
	                  onclick="guardarRespuesta({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});" />SI
	                @else
	                	<input type="radio" name="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}" 
	                  id="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}1" value="1" 
	                  onclick="guardarRespuesta({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});" />SI
	                @endif 
	              </label>
	              <label class="radio-inline">
	              	@if($preguntac->respuesta==2)
	                  <input type="radio" name="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}"
	                   id="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}2" checked="true" value="2" 
	                   onclick="guardarRespuesta({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});"
	                   />NO 
	                 @else
	                 	<input type="radio" name="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}"
	                   id="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}2"  value="2" 
	                   onclick="guardarRespuesta({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});"
	                   />NO 
	                 @endif  
	              </label>
	              <label class="radio-inline">
	              	@if($preguntac->respuesta==3)
	                  <input type="radio" name="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}" 
	                  id="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}3" checked="true" value="3"
	                  onclick="guardarRespuesta({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});" />NA 
	                 @else
	                 	 <input type="radio" name="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}" 
	                  id="opc{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}3" value="3"
	                  onclick="guardarRespuesta({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});" />NA 
	                 @endif 
	              </label>
           	</div>
			
		</td>
		<td>
			<div class="form-group">
            	<textarea class="form-control" rows="1" 
            	onclick="detectarCampoObservacion({{$preguntac->id}},{{$preguntac->pruebacumplimiento_id}});" 
            	id="obs{{$preguntac->id}}{{$preguntac->pruebacumplimiento_id}}">{{$preguntac->obervaciones}}
            	</textarea>
               
            </div>
			
		</td>
	</tr>
	<?php 
		$cont++;
	 ?>

 @endforeach

