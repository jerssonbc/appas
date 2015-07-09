@extends("layouts.plan")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Objetivos Especificos</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
        {{ Form::open(array('url'=>'registrarObjetivo','method'=>'POST','class'=>'form-horizontal')) }}

        <div class="form-group @if($errors->get('descripcion')) {{'has-error'}} @endif ">
            <label class="col-sm-2 control-label">Descripcion:</label>
            <div class="col-sm-7">
                {{ Form::text('descripcion',null,
                    array('class'=>'form-control','placeholder'=>'Ingrese Objetivo','required'=>'true')) }}
            </div>
        </div>
        <div class="form-group">
                    <div class="col-sm-offset-5">
                      <button type="submit" class="btn btn-primary"><i class="icon-save"> </i> Guardar</button>
                      
                    </div>
        </div>
        {{Form::close()}}
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                @foreach($objetivos as $objetivos)
                <tr>
                    <td>{{ $objetivos->descripcion }}</td>
                    <td style="text-align:center;">
                        <a class = "btn btn-info" href="{{url('/objetivosEdit',$objetivos->id )}}"><i class="icon-edit"> </i>Editar</a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop