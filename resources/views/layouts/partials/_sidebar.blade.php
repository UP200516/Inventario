<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Usuario' }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" 
                       type="search" 
                       placeholder="Search" 
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fa fa-box nav-icon"></i>
                        <p>
                            Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{ route('glasses.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Vidrio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('aluminum_profiles.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Perfiles de Aluminio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rabbitgoos.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Peliculas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('polycarbonates.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Policarbonato</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('aluminum_fittings.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Herrajes para aluminio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('glass_fittings.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Herrajes para vidrio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('plushes.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Felpa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vinyls.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Vinil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sizes.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Pijas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('consumables.index') }}" class="nav-link">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>Consumibles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link">
                        <i class="fa fa-layer-group nav-icon"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('providers.index') }}" class="nav-link">
                        <i class="fa fa-industry nav-icon"></i>
                        <p>Proveedores</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>