
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Menu</h5>

                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Principal</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home')?'active':'' }}">
                        <i class="ph-house"></i><span>Inicio</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link {{ Route::is('usuarios*')?'active':'' }}">
                        <i class="ph-users"></i><span>Usuario</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tipos.index') }}" class="nav-link {{ Route::is('tipos*')?'active':'' }}">
                        <i class="ph ph-map-pin"></i><span>Tipos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ubicaciones.index') }}" class="nav-link {{ Route::is('ubicaciones*')?'active':'' }}">
                        <i class="ph ph-users-four"></i><span>Ubicaciones</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('registro.index') }}" class="nav-link {{ Route::is('registro*')?'active':'' }}">
                        <i class="ph ph-pen"></i><span>Registro</span>
                    </a>
                </li>
                

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>
