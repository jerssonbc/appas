
@extends("layouts.plan")

@section("modulo")

<h1 class="page-header">ACLARACIONES</h1>
<br><br>
<a href="{{url('/aclaracionesNuevo')}}" class="btn btn-primary">Nueva Aclaración</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Aclaracion</th>
            <th>Tipo Aclaracion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($aclaraciones as $aclaracion)
            <tr>
                <td>{{ $aclaracion->aclaracion }}</td>
                <td> 
                        @if($aclaracion->tipoaclaracion_id == '1' )
                        Se Realiza
                        @else
                        No se realiza 
                        @endif </td>
                <td>
                    <a class = "btn btn-info" href="{{url('/aclaracionesEdit',$aclaracion->id )}}">Editar</a>
                    <a class = "btn btn-danger" href="{{url('/aclaracionesDelete',$aclaracion->id )}}">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>


@stop