@extends("layouts.master")

@section("modulo")
<h2 class="page-header">Registro de Direccionamiento</h2>
{{ Form::open(array('url'=>'registrarDireccionamiento','method'=>'POST','class'=>'form-horizontal fdireccionamiento')) }}


<div class="form-group @if($errors->get('mision')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">MISION:</label>
    <div class="col-sm-9">
        {{ Form::textarea('mision',null,
            array('class'=>'form-control','placeholder'=>'Ingrese MISION',
                    'required'=>'true')) }}
    </div>
</div>
<div class="form-group @if($errors->get('vision')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">VISION:</label>
    <div class="col-sm-9">
        {{ Form::textarea('vision',null,
        array('class'=>'form-control','placeholder'=>'Ingrese VISION',
                'required'=>'true')) }}
    </div>
</div>
<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</div>
{{Form::close()}}

@stop