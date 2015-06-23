
@extends("layouts.master")

@section('estilospage')
    {{HTML::style('css/dataTables.bootstrap.css')}}
    {{HTML::style('css/validationEngine.jquery.css')}}
    {{HTML::style('css/jquery-ui.css')}}

@stop

@section("modulo")

<div class="row">
  <div class="col-lg-12">
    <h1>MIS PLANES DE AUDITORIA</h1>
  </div>
</div>               
<hr />
<div class="row">
  <div class="col-lg-12">
    <div class="box info">
               <header>
                   <div class="icons">
                       <i class="icon-building"></i>
                   </div>
                   <h5>Planes de Auditoria</h5>
                   <div class="toolbar">
                        <a href="#" class="btn btn-default btn-sm" onclick="openRegPlan();">Nuevo Plan</a>
                   </div>
                </header>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-planes">
                            <thead>
                                <tr>
                                    <th>Titulo Auditoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="dataplanes">
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
                    </div>
                </div>
    </div>
  </div>
</div>

 <div class="col-lg-12">
    <div class="modal fade" id="newPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog lgmodal">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="H4">Nuevo Plan</h4>
                    </div>
                    <div class="modal-body">
                       {{Form::open(array('id'=>'nuevo_plan','class'=>'form-horizontal newplanauditoria','role'=>'form'))}}

                        <div class="form-group">
                            {{Form::label('tauditoria','Titulo Auditoria:',array('class'=>'col-sm-2'))}}
                            <div class="col-sm-10">
                                 {{ Form::text('tauditoria',null,array('class'=>'form-control','placeholder'=>'Ingrese Titulo de Auditoria','required'=>'true','id'=>'tauditoria')) }}
                            </div>   
                        </div>
                        <div class="form-group">
                            {{Form::label('rploblematica','Realidad Problemática:',array('class'=>'col-sm-2'))}}
                            <div class="col-sm-10">
                            {{ Form::textarea('rploblematica',null,array('class'=>'form-control','placeholder'=>'Ingrese Realidad Problemática','required'=>'true','id'=>'rploblematica')) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{Form::label('ogeneral','Objetivo General:',array('class'=>'col-sm-2'))}}
                            <div class="col-sm-10">
                                 {{ Form::text('ogeneral',null,array('class'=>'form-control','placeholder'=>'Ingrese Objetivo General','required'=>'true','id'=>'ogeneral')) }}
                            </div>   
                        </div>
                        <div class="form-group">
                            {{Form::label('alcance','Alcance:',array('class'=>'col-sm-2'))}}
                            <div class="col-sm-10">
                            {{ Form::textarea('alcance',null,array('class'=>'form-control','placeholder'=>'Ingrese Alcance','required'=>'true','id'=>'alcance')) }}
                            </div>
                        </div>
                            
                        <div class="form-group">
                            {{Form::label('anegocio','Alineamiento Del Negocio:',array('class'=>'col-sm-2'))}}
                            <div class="col-sm-10">
                            {{ Form::textarea('anegocio',null,array('class'=>'form-control','placeholder'=>'Ingrese Alineamiento al Negocio','required'=>'true','id'=>'anegocio')) }}
                            </div>
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
        $('#dataTables-planes').dataTable();
        formValidation();
        $("#mdialog" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  OK: function() {
                    $(this).dialog("close");
                    $('#newPlan').modal('show');
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