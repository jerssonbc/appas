@extends("layouts.plan")

@section("modulo")

<script>

$(document).ready(function()
{
    $('#form-horizontal').click(function() {
        $.ajax({
            type: "POST",
            data: '',
            url: "registrarObjetivo",
            success: function(datos) {
                if (datos == '') {
                    $("#cuerpo").html("<th><td>No tiene cursos asignados</td></th>");
                } else {
                        $("#cuerpo").html("<th><td>Si lista</td></th>");
                }
            },
            error: function(datos) {
                $("#cuerpo").html("<th><td>Error 404</td></th>");
            }
        });
    });

});

</script>
<br><br>
<h1 class="page-header">Objetivos Especificos</h1>
{{ Form::open(array('url'=>'registrarObjetivo','method'=>'POST','class'=>'form-horizontal')) }}

<div class="form-group @if($errors->get('descripcion')) {{'has-error'}} @endif ">
    <label class="col-sm-2 control-label">Descripcion:</label>
    <div class="col-sm-7">
        {{ Form::text('descripcion',null,
            array('class'=>'form-control','placeholder'=>'Ingrese Objetivo','required'=>'true')) }}
    </div>
</div>
<div class="form-group">
            <div class="col-sm-offset-2 ">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="{{url('/empresas')}}" class="btn btn-danger">Cancelar</a>
            </div>
</div>
{{Form::close()}}
<br><br>
<div id="cuerpo">
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Descripcion</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($objetivos as $objetivos)
            <tr>
                <td>{{ $objetivos->descripcion }}</td>
                <td>
                    <a class = "btn btn-info" href="{{url('/objetivosEdit',$objetivos->id )}}">Editar</a>
                    <a class = "btn btn-danger" href="#">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
</div>


@stop