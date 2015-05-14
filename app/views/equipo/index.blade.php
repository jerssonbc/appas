
@extends("layouts.plan")

@section("modulo")


<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($equipo as $equipo)
            <tr>
                <td>{{ $equipo->razon_social }}</td>
                <td>{{ $equipo->giro_negocio }}</td>
                <td>
                    <a href="#">Editar</a>
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

<a href="#" class="btn btn-primary">Nuevo equipo</a>

@stop