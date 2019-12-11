<!-- header section -->
<header class="elementskit-header main-header">
    @php
    if (Auth::check()){
    $loggin = 'loggin';

    }
    else{
    $loggin = '';

    }
    @endphp
    <div class="header-top {{ $loggin }}">
        <div class="container ">
            <div class="top-outer clearfix">
                <!-- Top Left -->
                {{-- <ul class="top-left">
                        <li>
                                <div class="image">
                                    <img src="images/resource/author-1.jpg" alt=""> 
                                </div>
                                <span>Miguel Angel </span>
                            </li>
                         <li><span class="icon flaticon-clock-1"></span>Mon-Fri (8am - 6pm)</li>
                            <li><a href="mailto:info@example.com"><span
                                        class="icon flaticon-letter"></span>info@example.com</a></li>
                    </ul>--}}

                <!-- Top Right -->
                <div class="top-right clearfix">
                    @auth
                    <div class="top-right-content float-left text-white mr-2">
                        <div class="user-movil">
                            <div data-toggle="modal" data-target="#exampleModal" class="image">
                                <img src="/images/{{ Auth::user()->employee()->hurempvimgh }}" alt="">

                            </div>
                            <span data-toggle="modal" data-target="#exampleModal"
                                class="float-left">{{ Auth::user()->employee()->huremptfnam}} </span>
                            <form action="{{ route('logout') }}" method="POST" class="float-right">
                                @csrf
                                <button style="line-height: 15px;" title="Cerrar Sesión"
                                    class="theme-btn btn-style-four p-1">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </div>
                        <!-- start menu item list -->
                        <div class="user-normal">

                            <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">
                                <ul class="elementskit-navbar-nav nav-alignment-dynamic">
                                    <li class="elementskit-dropdown-has li-image p-0">
                                        <div class="image">
                                            <img src="/images/{{ Auth::user()->employee()->hurempvimgh }}" alt="">
                                        </div>
                                        <span>{{ Auth::user()->employee()->huremptfnam   }}</span>
                                        <ul class="elementskit-dropdown elementskit-submenu-panel">
                                            <li><a data-toggle="modal" data-target="#exampleModal"><i
                                                        class="fa fa-user-o"></i> Perfil</a></li>
                                            <li><a
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out"></i> Cerrar Sesión
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="float-left">
                            <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="line-height: 15px;" title="Cerrar Sesión" class="theme-btn btn-style-four p-1">
                    </button>
                    </form>
                </div> --}}

                @endauth
                @guest
                <a style="line-height: 15px;" href="/login" class="theme-btn btn-style-four float-left">Login</a>
                @endguest
                <!-- Cart Button -->


                <!-- Main Menu End-->
                <div class="nav-box">
                    <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-3"></span>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    <!-- End Header Top -->

    <!-- Header Upper -->
    <div class="header-upper">
        <!-- xs-container -->
        <div class="container">
            <div class="xs-navbar clearfix">

                <div class="logo-outer">
                    <div class="logo"><a href="/"><img src="images/logo.png" alt="" title=""></a></div>
                </div>

                <nav class="elementskit-navbar">

                    <!-- ---------------------------------------
                                            // god menu markup start
                                        ---------------------------------------- -->

                    <div class="xs-mobile-search">
                        <a href="#modal-popup-2" class="xs-modal-popup"><i class="icon icon-search"></i></a>
                    </div>

                    <!-- start humberger (for offcanvas toggler) -->
                    <button class=" elementskit-menu-toggler xs-bold-menu">

                        <div class="xs-gradient-group">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <span>
                            Menu
                        </span>
                    </button>
                    <!-- end humberger -->

                    <!-- start menu container -->
                    <div class="elementskit-menu-container elementskit-menu-offcanvas-elements">

                        <!-- start menu item list -->
                        <ul class="elementskit-navbar-nav nav-alignment-dynamic">
                            @auth
                            @if (Auth::user()->contypscode == 0)
                            @include('layouts.menu-client')
                            @else
                            @include('layouts.menu-admin')
                            @endif
                            @endauth
                            @guest
                            @include('layouts.menu-client')
                            @endguest

                        </ul> <!-- end menu item list -->


                        <!-- start menu logo and close button (for mobile offcanvas menu) -->
                        <div class="elementskit-nav-identity-panel">
                            <h1 class="elementskit-site-title">
                                <a href="#" class="elementskit-nav-logo">Less Menu</a>
                            </h1>
                            <button class="elementskit-menu-close elementskit-menu-toggler" type="button"><i
                                    class="icon icon-cross"></i></button>
                        </div>
                        <!-- end menu logo and close button -->

                    </div>
                    <!-- end menu container -->

                    <!-- start offcanvas overlay -->
                    <div class="elementskit-menu-overlay elementskit-menu-offcanvas-elements elementskit-menu-toggler">
                    </div>
                    <!-- end offcanvas overlay -->
                    <!-- ---------------------------------------
                                            // god menu markup end
                                        ---------------------------------------- -->

                </nav>
                {{-- <ul class="xs-menu-tools">
                        <li>
                            <a href="#modal-popup-2" class="navsearch-button xs-modal-popup"><i
                                    class="icon icon-search"></i></a>
                        </li>
                    </ul> 
                    --}}
            </div>
        </div>
    </div>
    <!-- .container END -->
</header><!-- End header section -->