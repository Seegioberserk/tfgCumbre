<aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset ('storage/general/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a class="js-arrow" href="{{ route('login') }}">
                                <i class="fas fa-home"></i>Panel de inicio
                            </a>
                        </li>
                        <li>
                            <li class="has-sub">
                             <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Permiso</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('index.permiso') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="#">Register</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop mb-2"></i>Equipo</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('equipo.index')}}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="{{ route('equipo.create') }}">Registrar equipo</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <li class="has-sub">
                             <a class="js-arrow" href="#">
                                <i class="fas fa-cogs mb-2"></i>Servicio</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('index.servicio')}}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="#">Register</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user"></i>Usuario</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{route('index.usuario')}}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="#">Register</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user-shield mb-2"></i>Rol</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('index.rol') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="{{ route('index.crear.rol') }}">Registrar</a>
                                </li>
                            </ul>
                             <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-user-circle mb-2"></i>Cliente</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('index.cliente') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="">Registrar</a>
                                </li>
                                </ul>
                                 <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tools mb-2"></i>Diagnostico</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('index.diagnostico') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="">Registrar</a>
                                </li>
                                </ul>
                               <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-cart-shopping"></i>Venta</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('venta.index') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="">Registrar</a>
                                </li>
                            </ul>
                            <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-clipboard-list"></i>Historial de servicios</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('index.historial_servicio') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="">Registrar</a>
                                </li>
                            </ul>
                            <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>Productos</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="{{ route('index.producto') }}">Visualizar</a>
                                </li>
                                <li>
                                    <a href="">Registrar</a>
                                </li>
                            </ul>
                            </li>
                    </ul>
                </nav>
            </div>
</aside>