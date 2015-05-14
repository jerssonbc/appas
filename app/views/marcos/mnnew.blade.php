@extends("layouts.plan")

@section("modulo")
<br><br>
<h1 class="page-header"> Marco Referencial Nacional</h1>
{{ Form::open(array('url'=>'registrarMNacional','method'=>'POST','class'=>'form-horizontal')) }}

<div class="form-group @if($errors->get('nombre')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-7">
        {{ Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'ingrese Nombre')) }}
    </div>
</div>
<div class="form-group @if($errors->get('descripcion')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Descripcion</label>
    <div class="col-sm-7">
        {{ Form::text('descripcion',null,array('class'=>'form-control','placeholder'=>'ingrese descripcion')) }}
    </div>
</div>
<div class="form-group">
            <div class="col-sm-offset-2 ">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{url('/marcosListar')}}" class="btn btn-primary">Cancelar</a>
            </div>
</div>

@stop