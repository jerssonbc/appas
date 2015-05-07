<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Auditoria de Sistemas</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            @if(!Session::get('id_usuario'))
            @else
              <li>
              <!-- Menu para plnas-->
              <a href="{{url('planAuditoria')}}">
                <span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span><span>Planes Auditables</span>
                
              </a>
              </li>
              <li>
              <!-- Menu para empres-->
              <a href="{{url('empresas')}}">
                <span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span><span>Empresa</span>
                
              </a>
              </li>
              <li>
              <!-- Menu para sali-->
              <a href="{{url('/salir')}}">
                <span class="glyphicon glyphicon-share" aria-hidden="true"></span><span>Salir</span>
                
              </a>
              </li>
            @endif
          </ul>
        </div>
      </div>
</nav>