@extends("layouts.plan")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Limitaciones</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
		{{ Form::model($limitaciones,array('url'=>'limitacionesUpdate/' . $limitaciones->id ,'method'=>'POST','class'=>'form-horizontal') ) }}
		<h1 class="page-header">Edición de Limitacion</h1>
		<div class="form-group @if($errors->get('limitacion')) {{'has-error'}} @endif ">
		    <label class="col-sm-2 control-label">Limitacion:</label>
		    <div class="col-sm-7">
		        {{ Form::textarea('limitacion',null,array('class'=>'form-control','placeholder'=>'ingrese Limitacion')) }}
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