@extends("layouts.index")

@section("lista")
<h2 class="page-header">Registro de Empresa</h2>
{{ Form::open(array('url'=>'registrarEmpresa','method'=>'POST','class'=>'form-horizontal')) }}

<div class="form-group @if($errors->get('razon_social')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Razon Social</label>
    <div class="col-sm-7">
        {{ Form::text('razon_social',null,
        array('class'=>'form-control','placeholder'=>'ingrese razon social','required'=>'true')) }}
    </div>
</div>
<div class="form-group @if($errors->get('giro_negocio')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Giro Negocio</label>
    <div class="col-sm-7">
        {{ Form::text('giro_negocio',null,array('class'=>'form-control','placeholder'=>'ingrese giro negocio','required'=>'true')) }}
    </div>
</div>
<div class="form-group @if($errors->get('resena_historica')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Reseña Historica</label>
    <div class="col-sm-7">
        {{ Form::textarea('resena_historica',null,array('class'=>'form-control','placeholder'=>'ingrese resena_historica','required'=>'true')) }}
    </div>
</div>
<div class="form-group">
            <div class="col-sm-offset-2 ">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{url('/empresas')}}" class="btn btn-primary">Cancelar</a>
            </div>
</div>

@stop