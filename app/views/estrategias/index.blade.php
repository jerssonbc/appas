
@extends("layouts.master")

@section("modulo")


<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Razon Social</th>
            <th>Giro Negocio</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($estrategias as $estrategia)
            <tr>
                <td>{{ $estrategia->razon_social }}</td>
                <td>{{ $estrategia->giro_negocio }}</td>
                <td>
                    <a href="{{url('/Administrar',$estrategia->id )}}">Editar</a>
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

<a href="{{url('/empresaNuevo')}}" class="btn btn-primary">Nueva empresa</a>


@stop