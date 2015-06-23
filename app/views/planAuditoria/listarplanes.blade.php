@foreach($planesAuditoria as $planAuditoria)
                                <tr>
                                    <td>{{ $planAuditoria->titulo_auditoria }}</td>
                                    <td>
                                        <a class = "btn btn-info" href="{{url('/AdministrarPlan',$planAuditoria->id )}}">Editar</a>
                                        <a class = "btn btn-danger" href="#">Eliminar</a>
                                    </td>
                                </tr>
@endforeach