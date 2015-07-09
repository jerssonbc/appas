@foreach($personas as $persona)
            <tr>
                <td>{{ $persona->cargo }}</td>
                <td> 
                    {{$persona->apellidos}}, {{$persona->nombre}}
                <td>
                    <a class = "btn btn-info" href="#" 
                    onClick="openEditPersona('{{$persona->id}}',
                    '{{$persona->cargo}}','{{$persona->apellidos}}','{{$persona->nombre}}')"><i class="icon-edit"> </i> Editar</a>
                    
                </td>
            </tr>
 @endforeach