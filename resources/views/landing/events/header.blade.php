<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
Start Site Header
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<header class="site-header header-style-one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="navigation-area">
                    <!-- Site Branding -->
                    <div class="site-branding">
                        <a href="{{ route('landing') }}">
                            <img src="{{ asset('logo-block.png') }}" width="125" alt="Site Logo" />
                        </a>
                    </div><!--  /.site-branding -->

                    <!-- Site Navigation -->
                    <div class="site-navigation">
                        <nav class="navigation">
                            <!-- Main Menu -->
                            <div class="menu-wrapper">
                                <div class="menu-content">
                                    <ul class="mainmenu">
                                        <li>
                                            <a class="nav-link" href="{{ route('landing') }}">Beranda</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('landing.rentals') }}">Sewa Alat</a>
                                        </li>
                                        <li>
                                            <a class="nav-link active" href="{{ route('landing.events') }}">Event</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#contact-block">Kontak</a>
                                        </li>
                                        @guest
                                        <li>
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        @endguest
                                        @auth
                                        <li class="megamenu">
                                            @if ($data['user']->role === 1)
                                            <a class="nav-link" href="#">Admin {{ $data['user']->name }}</a>
                                            @else
                                            <a class="nav-link" href="#">{{ $data['user']->name }}</a>
                                            @endif
                                            <ul class="sub-menu megamenu-main">
                                                <li>
                                                    <div class="megamenu-wrapper">
                                                        <div class="container megamenu-container">
                                                            <div class="row">
                                                                <div class="col-lg-12 megamenu-column">
                                                                    @if ($data['user']->role === 1)
                                                                    <h3 class="megamenu-heading">Admin {{ $data['user']->name }}</h3>
                                                                    @else
                                                                    <h3 class="megamenu-heading">{{ $data['user']->name }}</h3>
                                                                    @endif
                                                                    <ul class="custom-megamenu">
                                                                        @if ($data['user']->role === 1)
                                                                        <li><a href="{{ route('admin') }}">Dashboard Admin</a></li>
                                                                        @else
                                                                        <li><a href="{{ route('profile.index') }}">Profile</a></li>
                                                                        <li><a href="{{ route('profile.history') }}">Riwayat Pemesanan</a></li>
                                                                        @endif
                                                                        <li>
                                                                            <form action="{{ route('logout') }}" method="POST">
                                                                                @csrf
                                                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit(); return confirm('Apakah Anda yakin ingin logout?')">
                                                                                    Logout
                                                                                </a>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        @endauth
                                    </ul> <!-- /.menu-list -->
                                </div> <!-- /.hours-content-->
                            </div><!-- /.menu-wrapper -->
                        </nav>
                    </div><!--  /.site-navigation -->

                    <div class="header-navigation-right">
                        <div class="hamburger-menus">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!--~./ header-navigation-right ~-->
                </div><!-- /.navigation-area -->
            </div><!-- /.col-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="mobile-sidebar-menu sidebar-menu">
        <div class="overlaybg"></div>
    </div>
</header>
<!--~~./ end site header ~~-->
<!--~~~ Sticky Header ~~~-->
<div id="sticky-header" class="active"></div>
<!--~./ end sticky header ~-->
