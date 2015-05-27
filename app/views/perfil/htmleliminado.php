<?php 
{{
		Form::label('cargo','Cargo:')
	}}
	{{

		Form::select('cargo',$cargos,1,array('class'=>'form-control tamselect'))
	}}
 ?>