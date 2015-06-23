
<nav class="navbar navbar navbar-fixed-top colornav" role="navigation" style="padding-top: 10px;">
  <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
       <i class="icon-align-justify"></i>
  </a>
  <!-- LOGO SECTION -->
        <header class="navbar-header">

            <a href="{{url('empresas')}}" class="navbar-brand">
           Auditoria de Sistemas
            <img src="assets/img/logo.png" alt="" />
                
                </a>
        </header>
   <!-- END LOGO SECTION -->
  <ul class="nav navbar-top-links navbar-right">
    @if(!Session::get('id_usuario'))
            @else
              <li>
                <!-- Menu para empresas-->

                <a href="{{url('empresas')}}">
                         <i class="icon-list"></i>   Empresas 
               </a>
               
              </li>
              <li>
              <!-- Menu para sali-->
              <a href="{{url('/salir')}}">
                <i class="icon-signout"></i>Salir
                
              </a>
              </li>
    @endif
  </ul>

   
</nav>


