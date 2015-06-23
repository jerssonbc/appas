
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
        <a href="{{url('/estrategiasNuevo')}}" class="btn btn-primary">Nueva Estrategia</a>

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
                            <td>{{ $estrategia->titulo }}</td>
                            <td>{{ $estrategia->estrategia }}</td>
                            <td>
                                <a class = "btn btn-info" href="{{url('/estrategiasEdit',$estrategia->id )}}">Editar</a>
                                <a class = "btn btn-danger" href="{{url('/estrategiasDelete',$estrategia->id )}}">Eliminar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
    </div>
</div>

@stop