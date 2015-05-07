<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('Empresa*') ? 'active' : '' }}">
        	<a href="{{url('/Administrar',Session::get('id_empresa') )}}">Datos de Empresa</a>
        </li>
        <li class="{{ Request::is('categoria*') ? 'active' : '' }}">
        	<a href="{{ url('/estrategia')}}">Direccionamiento Estratégico</a>
        </li>
        <li><a href="#">Estrategias</a></li>
        <li><a href="#">Marcos</a></li>
        <li><a href="#">Equipo</a></li>
    </ul>
</div>