
<ul class="collapse" id="menu">
    <li class="{{ Request::is('Administrar*') ? 'active' : '' }}">
        <a href="{{url('/Administrar',Session::get('id_empresa') )}}">
           <i class="icon-suitcase"></i> Datos de empresa   
        </a>
    </li> 

    <li class="{{ Request::is('direccionamiento*') ? 'active' : '' }}">
        <a href="{{ url('/direccionamiento')}}">
           <i class=" icon-eye-open"></i> Direccionamiento Estratégico
        </a>
    </li> 

    <li class="{{ Request::is('estrategiasListar*') ? 'active' : '' }}">
        <a href="{{ url('/estrategiasListar')}}">
           <i class="icon-cog"></i> Estrategias
        </a>
    </li> 
    
    <li class="{{ Request::is('planAuditoria*') ? 'active' : '' }}">
        <a href="{{url('/planAuditoria')}}">
           <i class="icon-book"></i> Plan Auditoria
        </a>
    </li>

    
</ul>
