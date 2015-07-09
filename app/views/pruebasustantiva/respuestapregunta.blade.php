@if($pcsustantiva)
	@foreach($pcsustantiva as $psustantiva)
	<tr>
		<td>
			<span>
				{{$psustantiva->pregunta}}
			</span>

		</td>
		<td>
			<div class="form-group">
				 <label class="radio-inline">
					
					@if($psustantiva->respuesta=='1')
	                  <input type="radio" name="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}" 
	                  id="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}1" checked value="1" 
	                  onclick="guardarRespuestaSustantiva({{$psustantiva->id}},{{$psustantiva->planauditoria_id}});" />
	                @else
	                	<input type="radio" name="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}" 
	                  id="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}1" value="1" 
	                  onclick="guardarRespuestaSustantiva({{$psustantiva->id}},{{$psustantiva->planauditoria_id}});" />
	                @endif

	                  SI
	              </label>
	              <label class="radio-inline">
	              	@if($psustantiva->respuesta=='2')
	                  <input type="radio" name="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}"
	                   id="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}2" checked="true" value="2" 
	                   onclick="guardarRespuestaSustantiva({{$psustantiva->id}},{{$psustantiva->planauditoria_id}});"
	                   />
	                 @else
	                 	<input type="radio" name="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}"
	                   id="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}2"  value="2" 
	                   onclick="guardarRespuestaSustantiva({{$psustantiva->id}},{{$psustantiva->planauditoria_id}});"
	                   />

	                 @endif

	                   NO
	              </label>
	              <label class="radio-inline">

	              	@if($psustantiva->respuesta=='3')
	                  <input type="radio" name="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}" 
	                  id="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}3" checked="true" value="3"
	                  onclick="guardarRespuestaSustantiva({{$psustantiva->id}},{{$psustantiva->planauditoria_id}});"
	                   />
	                 @else
	                 	 <input type="radio" name="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}" 
	                  id="opcps{{$psustantiva->id}}{{$psustantiva->planauditoria_id}}3" value="3"
	                  onclick="guardarRespuestaSustantiva({{$psustantiva->id}},{{$psustantiva->planauditoria_id}});"
	                   />
	                 @endif
	                 NA
	              </label>
			</div>

		</td>
	</tr>
	@endforeach
@endif