
 @foreach($pasos as $paso)
	<tr>
		<td>
			- {{$paso->descripcion}}
		</td>
		<td style="text-align:center;">
			<div class="form-group">
					
	                                            
	              <label class="radio-inline">
					
					@if($paso->cumplimiento==1)
	                  <input type="radio" name="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}" 
	                  id="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}1" checked="true" value="1" 
	                  onclick="guardarCumplimiento({{$paso->id}},{{$paso->pruebasustantiva_id}});" />
	                @else
	                	<input type="radio" name="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}" 
	                  id="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}1" value="1" 
	                  onclick="guardarCumplimiento({{$paso->id}},{{$paso->pruebasustantiva_id}});" />
	                @endif

	                  SI
	              </label>
	              <label class="radio-inline">
	              	@if($paso->cumplimiento==2)
	                  <input type="radio" name="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}"
	                   id="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}2" checked="true" value="2" 
	                   onclick="guardarCumplimiento({{$paso->id}},{{$paso->pruebasustantiva_id}});"
	                   />
	                 @else
	                 	<input type="radio" name="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}"
	                   id="opc{{$paso->id}}{{$paso->pruebasustantiva_id}}2"  value="2" 
	                   onclick="guardarCumplimiento({{$paso->id}},{{$paso->pruebasustantiva_id}});"
	                   />

	                 @endif

	                   NO
	              </label>
	              
           	</div>
		</td>
		
	</tr>
	

@endforeach