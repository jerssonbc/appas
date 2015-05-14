<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('AdministrarPlan*') ? 'active' : '' }}">
        	<a href="{{url('/AdministrarPlan',Session::get('id_empresa') )}}">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>General</a>
        </li>
        <li class="{{ Request::is('objetivosListar*') ? 'active' : '' }}">
            <a href="{{ url('/objetivosListar')}}">
                <span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span>Objetivos Especificos</a>
        </li>
        
        <li class="{{ Request::is('marcosListar*') ? 'active' : '' }}">
            <a href="{{ url('/marcosListar')}}">
                <span class="glyphicon glyphicon-indent-left" aria-hidden="true"></span>Marco Normativo</a>
        </li>
        <!--<li>
            <a href="#">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>Marco Normativo</a></li>
        --><li class="{{ Request::is('planAuditoria*') ? 'active' : '' }}">
            <a href="{{url('/planAuditoria')}}">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>Normativa Institucional</a></li>
        <li>
            <a href="#">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>Equipo Auditor</a></li>
    </ul>
</div>