
@extends("layouts.index")

@section('estilospage')
    {{HTML::style('css/dataTables.bootstrap.css')}}
    {{HTML::style('css/validationEngine.jquery.css')}}
    {{HTML::style('css/jquery-ui.css')}}

@stop

@section("titulo")
<h1 class="page-header">MIS EMPRESAS</h1>
@stop


@section("lista")

    <div class="row">
        <div class="col-lg-12">
           <div class="box primary">
               <header>
                   <div class="icons">
                       <i class="icon-building"></i>
                   </div>
                   <h5>Mis Empresas</h5>
                   <div class="toolbar">
                       <a href="#" class="btn btn-default btn-sm" onClick="openRegEmpresa();">Nueva Emrpesa</a>
                   </div>
               </header>
               <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-empresas">
                            <thead>
                                <tr>
                                    <th>Razon Social</th>
                                    <th>Giro Negocio</th>
                                    <th class="center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="dataempresas">
                                @foreach($empresas as $empresas)
                                <tr>
                                    <td>{{ $empresas->razon_social }}</td>
                                    <td>{{ $empresas->giro_negocio }}</td>
                                    <td class="center">
                                        <a class = "btn btn-info" href="{{url('/Administrar',$empresas->id )}}">Editar</a>
                                        <a class = "btn btn-danger" href="#">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach                          
                            </tbody>
                        </table>
                    </div>
               </div>
           </div>
            
        </div>
    </div>

    
 <div class="col-lg-12">
    <div class="modal fade" id="newEmpresa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H4">Nueva Empresa</h4>
                    </div>
                    <div class="modal-body">
                       {{Form::open(array('id'=>'nueva_empresa','class'=>'form','role'=>'form'))}}

                        <div class="form-group">
                            {{Form::label('rsocial','Razón Social: ')}}
                         
                            {{ Form::text('rsocial',null,array('class'=>'validate[required] form-control','placeholder'=>'Ingrese Razon social','required'=>'true','id'=>'rsocial')) }}
                            
                        </div>
                        <div class="form-group">
                            {{Form::label('gnegocio','Giro del Negocio: ')}}
                            
                            {{ Form::text('gnegocio',null,array('class'=>'validate[required]  form-control','placeholder'=>'Ingrese giro del Negocio','required'=>'true','id'=>'gnegocio')) }}
                            
                        </div>

                        <div class="form-group">
                            {{Form::label('rhistorica','Reseña Historica: ')}}
                            
                            {{ Form::textarea('rhistorica',null,array('class'=>'validate[required]  form-control','placeholder'=>'Ingrese Reseña Histórica','required'=>'true','id'=>'rhistorica')) }}
                            
                        </div>
                        <div class="form-group">
                                <div class="col-sm-offset-8">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                {{
                                    Form::submit('Registrar',array('class'=>'btn btn-primary'))
                                }}
                                </div>
                                
                        </div>
                   
                        {{Form::close()}}
                    </div>
                </div>
            </div>
    </div>
</div>
   
 <div id="mdialog" title="Error">
    Probando diaglo</div>
<div id="cdialog" title="Confirmación">
    Registro Exitoso</div>
    
@stop

@section('scriptspage')
    {{HTML::script('js/jquery-ui.min.js')}}
    {{HTML::script('js/jquery.dataTables.js')}}
    {{HTML::script('js/dataTables.bootstrap.js')}}
    {{HTML::script('js/jquery.validationEngine.js')}}
    {{HTML::script('js/jquery.validationEngine-es.js')}}
    {{HTML::script('js/jquery.validate.min.js')}}
    {{HTML::script('js/validationInit.js')}}

    <script type="text/javascript">
    $(document).ready(function(){
        $('#dataTables-empresas').dataTable();
        formValidation();
        $("#mdialog" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  OK: function() {
                    $(this).dialog("close");
                    $('#newEmpresa').modal('show');
                }
               },
            });
        $("#cdialog" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  OK: function() {
                    $(this).dialog("close");
                }
               },
            });
    });

</script>
@stop

