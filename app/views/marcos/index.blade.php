
@extends("layouts.plan")

@section("modulo")
<!-- <div class="row">
  <div class="col-lg-12">
    <h2>Marcos a Utilizar</h2>
  </div>
</div>               
<hr /> -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Normativa Institucional </h1>
        <a href="{{url('/NInstitucionalNuevo')}}" class="btn btn-primary"><i class="icon-file-alt"> </i>  Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($institucional as $institucional)
                    <tr>
                        <td style="vertical-align:middle;" >{{ $institucional->nombre }}</td>
                        <td style="vertical-align:middle;" >{{ $institucional->descripcion }}</td>
                        <td style="vertical-align:middle; text-align:center;">
                            <a class = "btn btn-info" href="{{url('/institucionalEdit',$institucional->id )}}"><i class="icon-edit"> </i> Editar</a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Marco Referencial Internacional </h1>
        <a href="{{url('/MInternacionalNuevo')}}" class="btn btn-primary"><i class="icon-file-alt"> </i>Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($internacional as $internacional)
                    <tr>
                        <td style="vertical-align:middle;" >{{ $internacional->nombre }}</td>
                        <td style="vertical-align:middle;" >{{ $internacional->descripcion }}</td>
                        <td style="vertical-align:middle; text-align:center;" >
                            <a class = "btn btn-info" href="{{url('/internacionalEdit',$internacional->id )}}"><i class="icon-edit"> </i> Editar</a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Marco Referencial Nacional</h1>
        <a href="{{url('/MNacionalNuevo')}}" class="btn btn-primary"><i class="icon-file-alt"> </i> Nuevo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($nacional as $nacional)
                    <tr>
                        <td style="vertical-align:middle;">{{ $nacional->nombre }}</td>
                        <td style="vertical-align:middle;">{{ $nacional->descripcion }}</td>
                        <td style="vertical-align:middle;" >
                            <a class = "btn btn-info" href="{{url('/nacionalEdit',$nacional->id )}}"><i class="icon-edit"> </i> Editar</a>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>

@stop