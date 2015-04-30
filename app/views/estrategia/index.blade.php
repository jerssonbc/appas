@extends("layouts.master")

@section("modulo")

{{ Form::open(array('url'=>'registrarEstrategia','method'=>'POST','class'=>'form-horizontal')) }}


<div class="form-group @if($errors->get('mision')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">MISION</label>
    <div class="col-sm-9">
        {{ Form::textarea('mision',null,array('class'=>'form-control','placeholder'=>'ingrese MISION')) }}
    </div>
</div>
<div class="form-group @if($errors->get('vision')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">VISION</label>
    <div class="col-sm-9">
        {{ Form::textarea('vision',null,array('class'=>'form-control','placeholder'=>'ingrese VISION')) }}
    </div>
</div>
<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
</div>

@stop