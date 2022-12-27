<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">
            <img src="https://via.placeholder.com/256x100" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}">
            <img src="https://via.placeholder.com/256x256" alt="logo" />
        </a>
        <button class="navbar-toggler navbar-toggler align-self-center d-none d-lg-flex" type="button" data-toggle="minimize">
            <span> <ion-icon name="menu-outline" size="large"></ion-icon> </span>
        </button>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
            <li class="nav-item  d-none d-lg-flex">
                <a class="nav-link active" href="#">
                    Operaciones
                </a>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-flex  mr-2">
                <a class="nav-link font-weight-bold text-danger" href="{{ route('logout') }}">
                    Salir <i class="fa-solid fa-bars"></i>
                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span> <ion-icon name="menu-outline" size="large"></ion-icon> </span>
        </button>
    </div>
</nav>
