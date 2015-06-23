@extends("layouts.master")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h1>DIRECCIONAMIENTO ESTATÉGICO</h1>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
      @if($direccionamiento)
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Misión: </h3>
        </div>
        <div class="panel-body">
          {{ $direccionamiento->mision }}
        </div>
      </div> 
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Visión: </h3>
        </div>
        <div class="panel-body">
          {{ $direccionamiento->vision }}
        </div>
      </div> 
      <a href="{{url('/direccionamientoEdit')}}" class="btn btn-primary">Editar Direccionamiento</a>
      @else
          <a href="{{url('/direccionamientoNuevo')}}" class="btn btn-primary">Nuevo Direccionamiento</a>
      @endif
  </div>
</div>
@stop