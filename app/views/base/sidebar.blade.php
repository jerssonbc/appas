<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li class="{{ Request::is('producto*') ? 'active' : '' }}">
        	<a href="{{ route('producto.index') }}">Producto</a>
        </li>
        <li class="{{ Request::is('categoria*') ? 'active' : '' }}">
        	<a href="{{ route('categoria.index') }}">Categoria</a>
        </li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
    </ul>
</div>