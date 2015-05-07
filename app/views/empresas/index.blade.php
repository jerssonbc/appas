
@extends("layouts.index")

@section("titulo")
<h1 class="page-header">MIS EMPRESAS</h1>

@stop


@section("lista")


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
            @foreach($empresas as $empresas)
            <tr>
                <td>{{ $empresas->razon_social }}</td>
                <td>{{ $empresas->giro_negocio }}</td>
                <td>
                    <a class = "btn btn-info" href="{{url('/Administrar',$empresas->id )}}">Editar</a>
                    <a class = "btn btn-danger" href="#">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

<a href="{{url('/empresaNuevo')}}" class="btn btn-primary">Nueva empresa</a>


@stop