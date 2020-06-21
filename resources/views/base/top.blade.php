<div class="top_nav flex-grow-1">
    <div class="container d-flex flex-row h-100 align-items-center">
        <!--=========================*
                              Logo
                *===========================-->
        <div class="text-center rt_nav_wrapper d-flex align-items-center">
            <a class="nav_logo rt_logo" href="index.html"><img src="images/logo.svg" alt="logo" /></a>
            <a class="nav_logo nav_logo_mob" href="index.html"><img src="images/mobile-logo.svg" alt="logo" /></a>
        </div>
        <!--=========================*
                           End Logo
               *===========================-->
        <div class="nav_wrapper_main d-flex align-items-center justify-content-between flex-grow-1">
            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">

                <!--==================================*
                                 Profile Menu
                        *====================================-->
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="profile_name">{{ Auth::user()->nombre }}
                            {{ Auth::user()->apellido}}<i class="feather ft-chevron-down"></i></span>
                        <img src="images/user.jpg" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown pt-2"
                        aria-labelledby="profileDropdown">
                        <a class="dropdown-item">
                            <i class="ti-user text-dark mr-3"></i> Actualizar datos
                        </a>

                        <span role="separator" class="divider"></span>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-dark mr-3"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                <!--==================================*
                                 End Profile Menu
                        *====================================-->
            </ul>
            <!--=========================*
                               Mobile Menu
                   *===========================-->
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="feather ft-menu text-white"></span>
            </button>
            <!--=========================*
                           End Mobile Menu
                   *===========================-->
        </div>
    </div>
</div>