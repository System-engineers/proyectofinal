<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ URL::asset('plantilla/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Cerrar Sesion</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="{{! Route::is('home') ?: 'active'}}">
                <a href="{{route('home')}}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>

            <li class="header">Gestion Usuario</li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">school</i>
                    <span>Usuario</span>
                </a>
                <ul class="ml-menu">
                        <li>
                                <a href="{{route('roles.index')}}">
                                    <span>Listado de Roles</span>
                                </a>
                            </li>
                    <li>
                        <a href="{{route('users.index')}}">
                            <span>Listado de Usuarios</span>
                        </a>
                    </li>   
                </ul>
            </li>

            <li class="header">Gestion Categorias y Servicios</li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">school</i>
                    <span>Categoria y Servicios</span>
                </a>
                <ul class="ml-menu">
                    @can('categoria-list')
                    <li>
                    <a href="{{route('categoria.index')}}">
                            <span>Categorias y Servicios</span>
                        </a>
                    </li>  
                    @endcan
                    @can('cliente-list')
                    <li>
                        <a href="{{route('cliente.index')}}">
                            <span>Clientes y Servicios</span>
                        </a>
                    </li>
                    @endcan
                    @can('empleado-list')
                    <li>
                        <a href="{{route('empleado.index')}}">
                            <span>Empleado</span>
                        </a>
                    </li>
                    @endcan
                    @can('orden-list')
                    <li>
                        <a href="{{route('orden.index')}}">
                            <span>Orden</span>
                        </a>
                    </li>
                    @endcan
                    @can('empleadoorden-list')
                    <li>
                        <a href="{{route('empleadoorden.index')}}">
                            <span>Empleado y Orden</span>
                        </a>
                    </li> 
                    @endcan
                </ul>
            </li>


           
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2019 <a href="javascript:void(0);">Laravel - Backend</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.0
        </div>
    </div>
    <!-- #Footer -->
</aside>