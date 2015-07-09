
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

        <a href="{{url('/limitacionesNuevo')}}" class="btn btn-primary"><i class="icon-file-alt"> </i> Nueva Limitacion</a>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Limitacion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($limitaciones as $limitaciones)
                    <tr>
                        <td style="vertical-align:middle;">{{ $limitaciones->limitacion }}</td>
                        <td style="vertical-align:middle; text-align:center">
                            <a class = "btn btn-info" href="{{url('/limitacionesEdit',$limitaciones->id )}}"><i class="icon-edit"> </i> Editar</a>
                            <a class = "btn btn-danger" href="{{url('/limitacionesDelete',$limitaciones->id )}}"><i class="icon-minus-sign"> </i> Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>


@stop