@extends("layouts.index")

@section("lista")

{{ Form::open(array('url'=>'registrarPlanAuditoria','method'=>'POST','class'=>'form-horizontal')) }}

<div class="form-group @if($errors->get('titulo_auditoria')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Titulo Auditoria</label>
    <div class="col-sm-7">
        {{ Form::text('titulo_auditoria',null,array('class'=>'form-control','placeholder'=>'ingrese Titulo ')) }}
    </div>
</div>
<div class="form-group @if($errors->get('realidad_problematica')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Realidad Problemática</label>
    <div class="col-sm-7">
        {{ Form::textarea('realidad_problematica',null,array('class'=>'form-control','placeholder'=>'ingrese Realidad Problemática')) }}
    </div>
</div>
<div class="form-group @if($errors->get('objetivo_general')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Objetivo General</label>
    <div class="col-sm-7">
        {{ Form::text('objetivo_general',null,array('class'=>'form-control','placeholder'=>'ingrese Objetivo General')) }}
    </div>
</div>
<div class="form-group @if($errors->get('alcance')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Alcance</label>
    <div class="col-sm-7">
        {{ Form::textarea('alcance',null,array('class'=>'form-control','placeholder'=>'ingrese Alcance')) }}
    </div>
</div>
<div class="form-group @if($errors->get('alineamiento_negocio')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Alineamiento del Negocio</label>
    <div class="col-sm-7">
        {{ Form::textarea('alineamiento_negocio',null,array('class'=>'form-control','placeholder'=>'ingrese Alineamiento del Negocio')) }}
    </div>
</div>


<div class="form-group">
            <div class="col-sm-offset-2 ">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{url('/empresas')}}" class="btn btn-primary">Cancelar</a>
            </div>
</div>

@stop