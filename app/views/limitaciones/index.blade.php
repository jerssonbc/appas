
@extends("layouts.plan")

@section("modulo")

<div class="row">
  <div class="col-lg-12">
    <h2>Limitaciones</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">

        <a href="{{url('/limitacionesNuevo')}}" class="btn btn-primary">Nueva Limitacion</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Limitacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($limitaciones as $limitaciones)
                    <tr>
                        <td>{{ $limitaciones->limitacion }}</td>
                        <td>
                            <a class = "btn btn-info" href="{{url('/limitacionesEdit',$limitaciones->id )}}">Editar</a>
                            <a class = "btn btn-danger" href="{{url('/limitacionesDelete',$limitaciones->id )}}">Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>


@stop