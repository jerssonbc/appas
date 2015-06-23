@extends("layouts.plan")
@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Personas a Entrevistar</h2>
  </div>
</div>               
<hr />
<div class="row">
    <div class="col-lg-12">
	   <h2>Registro de Persona a Entrevistar</h2>
            {{ Form::open(array('url'=>'registrarPersona',
            			'method'=>'POST','class'=>'form-horizontal')) }}

            <div class="form-group @if($errors->get('cargo')) {{'has-error'}} @endif ">
                <label class="col-sm-2 control-label">Cargo:</label>
                <div class="col-sm-7">
                    {{ Form::text('cargo',null,array('class'=>'form-control','placeholder'=>'ingrese Cargo','required'=>'true')) }}
                </div>
            </div>
            <div class="form-group @if($errors->get('apellidos')) {{'has-error'}} @endif ">
                <label class="col-sm-2 control-label">Apellidos:</label>
                <div class="col-sm-7">
                    {{ Form::text('apellidos',null,array('class'=>'form-control','placeholder'=>'ingrese Apellidos','required'=>'true')) }}
                </div>
            </div>
            <div class="form-group @if($errors->get('nombre')) {{'has-error'}} @endif ">
                <label class="col-sm-2 control-label">Nombre:</label>
                <div class="col-sm-7">
                    {{ Form::text('nombre',null,array('class'=>'form-control','placeholder'=>'ingrese Nombre','required'=>'true')) }}
                </div>
            </div>

            <div class="form-group">
                        <div class="col-sm-offset-2 ">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                          <a href="{{url('/personasEntrevistar')}}" class="btn  btn-danger">Cancelar</a>
                        </div>
            </div>
            {{Form::close()}}
    </div>
</div>
@stop