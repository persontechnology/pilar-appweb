<div class="d-flex d-lg-none me-2">
    <button type="button" class="navbar-toggler sidebar-mobile-main-toggle rounded-pill">
        <i class="ph-list"></i>
    </button>
</div>


<ul class="nav flex-row justify-content-end order-1 order-lg-2">
   

    <li class="nav-item nav-item-dropdown-lg dropdown ms-lg-2">
        <a href="#" class="navbar-nav-link align-items-center rounded-pill p-1" data-bs-toggle="dropdown">
            <div class="status-indicator-container">
                <img src="../../../assets/images/demo/users/face11.jpg" class="w-32px h-32px rounded-pill" alt="">
                <span class="status-indicator bg-success"></span>
            </div>
            <span class="d-none d-lg-inline-block mx-lg-2">{{ Auth::user()->name }}</span>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
            

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();"
                    class="dropdown-item">
                    <i class="ph-sign-out me-2"></i>
                    {{ __('Logout') }}
                </a>
            </form>
            
        </div>
    </li>
</ul>