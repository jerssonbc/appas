 @foreach($empresas as $empresa)
                                <tr>
                                    <td>{{ $empresa->razon_social }}</td>
                                    <td>{{ $empresa->giro_negocio }}</td>
                                    <td class="center">
                                        <a class = "btn btn-info" href="{{url('/Administrar',$empresa->id )}}">Editar</a>
                                        <a class = "btn btn-danger" href="#">Eliminar</a>
                                    </td>
                                </tr>
  @endforeach