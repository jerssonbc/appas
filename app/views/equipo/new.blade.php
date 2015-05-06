
@extends("layouts.master")

@section("modulo")

{{ Form::open(array('url'=>'registrarEquipo','method'=>'POST','class'=>'form-horizontal')) }}

<div class="form-group @if($errors->get('nombre')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Razon Social</label>
    <div class="col-sm-9">
        {{ Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'ingrese razon social')) }}
    </div>
</div>
<div class="form-group @if($errors->get('apellido')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Giro Negocio</label>
    <div class="col-sm-9">
        {{ Form::text('apellido',null,array('class'=>'form-control','placeholder'=>'ingrese giro negocio')) }}
    </div>
</div>
<div class="form-group @if($errors->get('cargo')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Reseña Historica</label>
    <div class="col-sm-9">
        {{ Form::text('cargo',null,array('class'=>'form-control','placeholder'=>'ingrese resena_historica')) }}
    </div>
</div>
<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
</div>

@stop