<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('Empresa*') ? 'active' : '' }}">
        	<a href="{{url('/AdministrarPlan',Session::get('id_empresa') )}}">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>General</a>
        </li>
        <li class="{{ Request::is('categoria*') ? 'active' : '' }}">
        	<a href="{{ url('/direccionamiento')}}">
                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>Normativa Internacional</a>
        </li>
        <li class="{{ Request::is('estrategiasListar*') ? 'active' : '' }}">
            <a href="{{ url('/estrategiasListar')}}">
                <span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span>Normativa Nacional</a>
        </li>
        <!--<li>
            <a href="#">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>Marco Normativo</a></li>
        --><li class="{{ Request::is('Plan*') ? 'active' : '' }}">
            <a href="{{url('/planAuditoria')}}">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>Normativa Institucional</a></li>

        <li>
            <a href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Cargos</a></li>

        <li>
            <a href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Equipo Auditor</a></li>
    </ul>
</div>