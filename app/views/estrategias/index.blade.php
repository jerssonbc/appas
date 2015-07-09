
@extends("layouts.master")

@section("modulo")
<div class="row">
  <div class="col-lg-12">
    <h1>ESTRATEGIAS EMPRESARIALES</h1>
  </div>
</div>               
<hr />
<div class="row">
    <div class="col-lg-12">
        <a href="{{url('/estrategiasNuevo')}}" class="btn btn-primary"> <i class="icon-file-alt"> </i>  Nueva Estrategia</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Estrategia</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($estrategias as $estrategia)
                        <tr>
                            <td style="vertical-align:middle;">{{ $estrategia->titulo }}</td>
                            <td style="vertical-align:middle;">{{ $estrategia->estrategia }}</td>
                            <td style="text-align:center;vertical-align:middle;">
                                <a class = "btn btn-info" href="{{url('/estrategiasEdit',$estrategia->id )}}"><i class="icon-edit"> </i> Editar</a>
                                <a class = "btn btn-danger" href="{{url('/estrategiasDelete',$estrategia->id )}}"><i class="icon-collapse-alt"> </i> Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
</div>

@stop