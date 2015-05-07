
@extends("layouts.plan")

@section("modulo")


<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Titulo Auditoria: </h3>
  </div>
  <div class="panel-body">
    {{ $datos->titulo_auditoria }}
  </div>
</div> 
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Realidad Problemática: </h3>
  </div>
  <div class="panel-body">
    {{ $datos->realidad_problematica }}
  </div>
</div> 
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Objetivo General: </h3>
  </div>
  <div class="panel-body">
    {{ $datos->objetivo_general }}
  </div>
</div>  

<div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <a href="{{url('/planAuditoriaEdit')}}" class="btn btn-primary">Editar</a>
            </div>
</div>

@stop