<?php $cont=1; ?>
@foreach($auditores as $auditor)
<tr id="auditor_{{$auditor->id}}">
    <td>{{$cont++}}</td>
    <td>{{$auditor->apellidos}},{{$auditor->nombre}}</td>
    <td>{{$auditor->dni}}</td>
    <td>{{$auditor->email}}</td>
    <td>{{$auditor->telefono}}/{{$auditor->celular}}</td>
    <td>{{$auditor->direccion}}</td>
    <td>{{$auditor->carrera_profesional}}</td>
    <td>{{$auditor->rolequipo->rol}}</td>
    <td><a class = "btn btn-info" href="#" 
    	onClick="openEditAuditor('{{$auditor->apellidos}}','{{$auditor->nombre}}',
					'{{$auditor->telefono}}','{{$auditor->celular}}','{{$auditor->id}}',
    				'{{$auditor->perfilequipo_id}}');" >Editar</a></td>
</tr>
@endforeach


        