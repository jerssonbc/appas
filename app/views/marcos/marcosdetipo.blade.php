@if($marcos)
	
@foreach($marcos as $marco)
            <option value='{{ $marco->id }}'>{{$marco->nombre}}</option> 
 @endforeach
@else
	<option value=""></option>
@endif
