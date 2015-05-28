@extends("layouts.plan")

@section("modulo")
<br><br>

<h2 class="page-header">Edición de  Normativa Institucional  </h2>
{{ Form::model($institucional,array('url'=>'institucionalUpdate/' . $institucional->id ,'method'=>'POST','class'=>'form-horizontal marcosutilizar') ) }}

<div class="form-group @if($errors->get('nombre')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-7">
        {{ Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'ingrese Nombre','required'=>'true')) }}
    </div>
</div>
<div class="form-group @if($errors->get('descripcion')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Descripción</label>
    <div class="col-sm-7">
        {{ Form::textarea('descripcion',null,array('class'=>'form-control','placeholder'=>'ingrese Descripción','required'=>'true')) }}
    </div>
</div>

<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    {{ Form::close() }}

@stop