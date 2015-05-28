@extends("layouts.plan")

@section("modulo")

{{ Form::model($limitaciones,array('url'=>'limitacionesUpdate/' . $limitaciones->id ,'method'=>'POST','class'=>'form-horizontal') ) }}

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

@stop