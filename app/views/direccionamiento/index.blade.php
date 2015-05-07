@extends("layouts.master")

@section("modulo")

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
<a href="{{url('/direccionamientoEdit')}}" class="btn btn-primary">Editar Direccinamiento</a>
@else
    <a href="{{url('/direccionamientoNuevo')}}" class="btn btn-primary">Nuevo Direccinamiento</a>
@endif
@stop