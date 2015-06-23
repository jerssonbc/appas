@extends("layouts.plan")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Objetivos Especificos/Edición</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
		{{ Form::model($objetivos,array('url'=>'objetivosUpdate/' . $objetivos->id ,'method'=>'POST','class'=>'form-horizontal') ) }}

		<div class="form-group @if($errors->get('descripcion')) {{'has-error'}} @endif ">
		    <label class="col-sm-2 control-label">Objetivo Especifico:</label>
		    <div class="col-sm-7">
		        {{ Form::textarea('descripcion',null,array('class'=>'form-control','placeholder'=>'ingrese objetivo')) }}
		    </div>
		</div>


		<div class="form-group">
		            <div class="col-sm-offset-2 col-sm-10">
		              <button type="submit" class="btn btn-primary">Actualizar</button>
		            </div>
		        </div>
		    {{ Form::close() }}
	</div>
</div>

@stop