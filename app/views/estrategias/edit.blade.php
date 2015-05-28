@extends("layouts.master")

@section("modulo")

{{ Form::model($estrategias,array('url'=>'estrategiasUpdate/' . $estrategias->id ,'method'=>'POST','class'=>'form-horizontal') ) }}

<div class="form-group @if($errors->get('titulo')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Titulo:</label>
    <div class="col-sm-7">
        {{ Form::text('titulo',null,array('class'=>'form-control','placeholder'=>'ingrese razon social')) }}
    </div>
</div>
<div class="form-group @if($errors->get('estrategia')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Estategia:</label>
    <div class="col-sm-7">
        {{ Form::text('estrategia',null,array('class'=>'form-control','placeholder'=>'ingrese giro negocio')) }}
    </div>
</div>

<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    {{ Form::close() }}

@stop