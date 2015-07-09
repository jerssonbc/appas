
@extends("layouts.plan")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h2>Aclaraciones</h2>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">

        <a href="{{url('/aclaracionesNuevo')}}" class="btn btn-primary"><i class="icon-file-alt"></i> Nueva Aclaración</a>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th style="text-align:center;">Aclaracion</th>
                    <th style="text-align:center;" >Tipo Aclaracion</th>
                    <th style="text-align:center;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($aclaraciones as $aclaracion)
                    <tr>
                        <td style="vertical-align:middle;">{{ $aclaracion->aclaracion }}</td>
                        <td style="vertical-align:middle;"> 
                                @if($aclaracion->tipoaclaracion_id == '1' )
                                Se Realiza
                                @else
                                No se realiza 
                                @endif </td>
                        <td style="vertical-align:middle; text-align:center;">
                            <a class = "btn btn-info" href="{{url('/aclaracionesEdit',$aclaracion->id )}}"><i class="icon-edit"> </i> Editar</a>
                            <a class = "btn btn-danger" href="{{url('/aclaracionesDelete',$aclaracion->id )}}"><i class="icon-minus-sign"> </i> Eliminar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@stop