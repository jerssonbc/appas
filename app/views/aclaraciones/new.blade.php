@extends("layouts.plan")

@section("modulo")

<div class="row">
  <div class="col-lg-12">
    <h2>Aclaraciones</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
    <h2 >Registro de Aclaración</h2>
        {{ Form::open(array('url'=>'registrarAclaraciones','method'=>'POST','class'=>'form-horizontal')) }}

        <div class="form-group @if($errors->get('aclaracion')) {{'has-error'}} @endif ">
            <label class="col-sm-2 control-label">Aclaración:</label>
            <div class="col-sm-7">
                {{ Form::textarea('aclaracion',null,array('class'=>'form-control','placeholder'=>'ingrese Aclaración','required'=>'true')) }}
            </div>
        </div>
        <div class="form-group @if($errors->get('tipoaclaracion_id')) {{'has-error'}} @endif ">
            <label class="col-sm-2 control-label">Tipo Aclaración:</label>
            <div class="col-sm-9">
                {{ Form::select('tipoaclaracion_id',$tipoAclaraciones,null,array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
                    <div class="col-sm-offset-2 ">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                      <a href="{{url('/aclaracionesListar')}}" class="btn  btn-danger">Cancelar</a>
                    </div>
        </div>
        {{Form::close()}}
  </div>
</div>


@stop