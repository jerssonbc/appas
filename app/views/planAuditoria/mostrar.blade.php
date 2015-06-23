
@extends("layouts.plan")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>DATOS GENERALES DE AUDITORIA</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
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
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Alcance: </h3>
        </div>
        <div class="panel-body">
          {{ $datos->alcance }}
        </div>
      </div>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Alineamiento_negocio: </h3>
        </div>
        <div class="panel-body">
          {{ $datos->alineamiento_negocio }}
        </div>
      </div>  

      <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <a href="{{url('/planAuditoriaEdit')}}" class="btn btn-primary">Editar</a>
                  </div>
      </div>
  </div>
</div>

@stop