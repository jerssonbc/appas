<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('Administrar*') ? 'active' : '' }}">
        	<a href="{{url('/Administrar',Session::get('id_empresa') )}}">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Datos de Empresa</a>
        </li>
        <li class="{{ Request::is('direccionamiento*') ? 'active' : '' }}">
        	<a href="{{ url('/direccionamiento')}}">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Direccionamiento Estratégico</a>
        </li>
        <li class="{{ Request::is('estrategiasListar*') ? 'active' : '' }}">
            <a href="{{ url('/estrategiasListar')}}">
                <span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span>Estrategias</a>
        </li>
        <!--<li>
            <a href="#">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>Marco Normativo</a></li>
        --><li class="{{ Request::is('planAuditoria*') ? 'active' : '' }}">
            <a href="{{url('/planAuditoria')}}">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>Plan Auditoria</a></li>
        <!--<li>
            <a href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Equipo</a></li>-->
    </ul>
</div>