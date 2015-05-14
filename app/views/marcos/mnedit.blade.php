@extends("layouts.plan")

@section("modulo")
<br><br>
<h1 class="page-header">Marco Referencial Nacional</h1>
{{ Form::model($nacional,array('url'=>'nacionalUpdate/' . $nacional->id ,'method'=>'POST','class'=>'form-horizontal') ) }}

<div class="form-group @if($errors->get('nombre')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-7">
        {{ Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'ingrese Nombre')) }}
    </div>
</div>
<div class="form-group @if($errors->get('descripcion')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-7">
        {{ Form::text('descripcion',null,array('class'=>'form-control','placeholder'=>'ingrese Descripción')) }}
    </div>
</div>

<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    {{ Form::close() }}

@stop