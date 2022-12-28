<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <div class="d-flex sidebar-profile">
                <div class="sidebar-profile-image">
                    <img src="https://via.placeholder.com/256x256" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                <div class="sidebar-profile-name">
                    <p class="sidebar-name">
                        @if (Session()->has('user'))
                            {{ Session('user')['username'] }}
                        @else
                            [Desconocido]
                        @endif
                    </p>
                    <p class="sidebar-designation">
                        Bienvenido
                    </p>
                </div>
            </div>
            <p class="sidebar-menu-title">Dash menu</p>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <!--<i class="typcn typcn-device-desktop menu-icon"></i>-->
                <i class="menu-icon">
                    <ion-icon name="file-tray-stacked-outline"></ion-icon>
                </i>
                <span class="menu-title">Operaciones</span>
            </a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="menu-icon">
                    <ion-icon name="pricetags-outline"></ion-icon>
                </i>
                <span class="menu-title">Productos</span>
            </a>
        </li>-->
    </ul>
</nav>
