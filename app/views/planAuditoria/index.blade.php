
@extends("layouts.index")

@section("titulo")
<h1 class="page-header">MIS PLANES DE AUDITORIA</h1>

@stop

@section("lista")


<br><br>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Titulo Auditoria</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($planAuditoria as $planAuditoria)
            <tr>
                <td>{{ $planAuditoria->titulo_auditoria }}</td>
                <td>
                    <a class = "btn btn-info" href="{{url('/AdministrarPlan',$planAuditoria->id )}}">Editar</a>
                    <a class = "btn btn-danger" href="#">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

<a href="{{url('/planAuditoriaNuevo')}}" class="btn btn-primary">Nuevo Plan de Auditoria</a>
<a href="{{url('/Administrar',Session::get('id_empresa') )}}" class="btn btn-primary">Volver a Empresa</a>


@stop