
@extends("layouts.plan")

@section("modulo")
<!-- <div class="row">
  <div class="col-lg-12">
    <h2>Marcos a Utilizar</h2>
  </div>
</div>               
<hr /> -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Normativa Institucional </h1>
        <a href="{{url('/NInstitucionalNuevo')}}" class="btn btn-primary">Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($institucional as $institucional)
                    <tr>
                        <td>{{ $institucional->nombre }}</td>
                        <td>{{ $institucional->descripcion }}</td>
                        <td>
                            <a class = "btn btn-info" href="{{url('/institucionalEdit',$institucional->id )}}">Editar</a>
                            <a class = "btn btn-danger" href="#">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Marco Referencial Internacional </h1>
        <a href="{{url('/MInternacionalNuevo')}}" class="btn btn-primary">Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($internacional as $internacional)
                    <tr>
                        <td>{{ $internacional->nombre }}</td>
                        <td>{{ $internacional->descripcion }}</td>
                        <td>
                            <a class = "btn btn-info" href="{{url('/internacionalEdit',$internacional->id )}}">Editar</a>
                            <a class = "btn btn-danger" href="#">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Marco Referencial Nacional</h1>
        <a href="{{url('/MNacionalNuevo')}}" class="btn btn-primary">Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($nacional as $nacional)
                    <tr>
                        <td>{{ $nacional->nombre }}</td>
                        <td>{{ $nacional->descripcion }}</td>
                        <td>
                            <a class = "btn btn-info" href="{{url('/nacionalEdit',$nacional->id )}}">Editar</a>
                            <a class = "btn btn-danger" href="#">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@stop