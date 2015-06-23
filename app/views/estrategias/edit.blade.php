@extends("layouts.master")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h1>ESTRATEGIAS EMPRESARIALES</h1>
  </div>
</div>                
<hr />
<di class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Actualizar Datos De Estrategia
            </div>
            <div class="panel-body">
                {{ Form::model($estrategias,array('url'=>'estrategiasUpdate/' . $estrategias->id ,'method'=>'POST','class'=>'form-horizontal') ) }}

                <div class="form-group @if($errors->get('titulo')) {{'has-error'}} @endif ">
                    <label class="col-sm-2 control-label">Titulo:</label>
                    <div class="col-sm-10">
                        {{ Form::text('titulo',null,array('class'=>'form-control','placeholder'=>'ingrese razon social')) }}
                    </div>
                </div>
                <div class="form-group @if($errors->get('estrategia')) {{'has-error'}} @endif ">
                    <label class="col-sm-2 control-label">Estategia:</label>
                    <div class="col-sm-10">
                        {{ Form::text('estrategia',null,array('class'=>'form-control','placeholder'=>'ingrese giro negocio')) }}
                    </div>
                </div>

                <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">Actualizar</button>
                              <a href="{{url('/estrategiasListar')}}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </div>
                    {{ Form::close() }}
            </div>
        </div>
    </div>
</di>
@stop