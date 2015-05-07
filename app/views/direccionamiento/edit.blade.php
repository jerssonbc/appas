@extends("layouts.master")

@section("modulo")

{{ Form::model($direccionamiento,array('url'=>'direccionamientoUpdate','method'=>'POST','class'=>'form-horizontal') ) }}


<div class="form-group @if($errors->get('mision')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Misión</label>
    <div class="col-sm-7">
        {{ Form::textarea('mision',null,array('class'=>'form-control','placeholder'=>'ingrese Misión')) }}
    </div>
</div>
<div class="form-group @if($errors->get('vision')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Visión</label>
    <div class="col-sm-7">
        {{ Form::textarea('vision',null,array('class'=>'form-control','placeholder'=>'ingrese Visión')) }}
    </div>
</div>

<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    {{ Form::close() }}

@stop