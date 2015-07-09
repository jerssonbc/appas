@foreach($planesAuditoria as $planAuditoria)
                                <tr>
                                    <td>{{ $planAuditoria->titulo_auditoria }}</td>
                                    <td style="text-align:center;">
                                        <a class = "btn btn-info" href="{{url('/AdministrarPlan',$planAuditoria->id )}}"  >Editar</a>
                                        
                                    </td>
                                </tr>
@endforeach