@extends("layouts.plan")

@section("modulo")

{{ Form::model($planAuditoria,array('url'=>'planAuditoriaUpdate','method'=>'POST','class'=>'form-horizontal') ) }}

<div class="form-group @if($errors->get('titulo_auditoria')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Titulo Auditoría </label>
    <div class="col-sm-7">
        {{ Form::text('titulo_auditoria',null,array('class'=>'form-control','placeholder'=>'ingrese Titulo Auditoría')) }}
    </div>
</div>
<div class="form-group @if($errors->get('realidad_problematica')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Realidad Problematica</label>
    <div class="col-sm-7">
        {{ Form::text('realidad_problematica',null,array('class'=>'form-control','placeholder'=>'ingrese Realidad Problematica')) }}
    </div>
</div>
<div class="form-group @if($errors->get('objetivo_general')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Objetivo General</label>
    <div class="col-sm-7">
        {{ Form::textarea('objetivo_general',null,array('class'=>'form-control','placeholder'=>'ingrese Objetivo General')) }}
    </div>
</div>
<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    {{ Form::close() }}

@stop