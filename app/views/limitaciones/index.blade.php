
@extends("layouts.plan")

@section("modulo")

<h1 class="page-header">LIMITACIONES</h1>
<br><br>
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


@stop