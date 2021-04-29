        <div class="navbar nav_title" style="border: 0;">
              <a href="/dashboard" class="site_title"><i class="fa fa-cogs"></i> <span>CME-AMIR</span></a><br>
              
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                  @if (Auth::check())
              <img src="{{Auth::user()->foto()}}" alt="..." class="img-circle profile_img img-responsive">
              @endif
              </div>
              <div class="profile_info">
                <span>Hola,</span>
                <h2>
                  @if (Auth::user() != null)
                  {{Auth::user()->name}}
                  @else
                    <script>  </script>
                  @endif
          
                </h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            @if (Auth::check())
               
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
             <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    @if(Auth::user()->userType <= 2)
                       <li><a href="/dashboard"><i class="fa fa-list-alt"></i> War Room </a>  
                    @endif
                    @if (Auth::user()->userType <=3)
                        <li><a href="/clientes"><i class="fa fa-user fa-lg"></i> Ver Clientes </a>  
                        <li><a href="/clientes/create"><i class="fa fa-user-plus fa-lg"></i> Agregar Clientes </a>  
                        <li><a href="/materiales"><i class="fa fa-cubes fa-lg"></i> Materiales </a>
                    @endif
                    @if (Auth::user()->userType ==5)
                    <li><a href="/materiales"><i class="fa fa-cubes fa-lg"></i> Materiales </a>
                    @endif
                      <li><a href="/motores"><i class="fa fa-th-list fa-lg"></i> Ver Todos los Motores </a>
                 
                  
                  
                </ul>
              </div>
              @if (Auth::user()->userType <=2)
                  <div class="menu_section">
                    <h3>Utilidades de Administrador</h3>
                    <ul class="nav side-menu">    
                      <li><a><i class="fa fa-sitemap"></i> Configuracion<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/empleados">Ver Empleados</a>
                              
                            <li><a>Utilidades<span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                
                                <li><a href="/myprofile">Perfil</a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    Salir de Sesion
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                </li>
                              </ul>
                            </li>
                            <li><a href="/empleados/create">Agregar Nuevo Empleado</a>
                            </li>
                        </ul>
                      </li>                  
                      
                    </ul>
                  </div>
              @endif
            </div>
          @else
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
               <h3>General</h3>
               <ul class="nav side-menu">
                 <li><a href="#"><i class="fa fa-user"></i> Solicitud de Activacion</a>
                  
                 </li>
               </ul>
            </div>
          </div>
          @endif