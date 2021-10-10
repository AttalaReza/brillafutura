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
                                            <a class="nav-link" href="{{ route('landing') }}">Home</a>
                                        </li>
                                        <li>
                                            <a class="nav-link active" href="{{ route('landing.events') }}">Events</a>
                                        </li>
                                        <li class="megamenu">
                                            <a class="nav-link" href="#">Sewa Alat</a>
                                            <ul class="sub-menu megamenu-main">
                                                <li>
                                                    <div class="megamenu-wrapper">
                                                        <div class="container megamenu-container">
                                                            <div class="row">
                                                                <div class="col-lg-12 megamenu-column">
                                                                    <h3 class="megamenu-heading">Sewa Alat</h3>
                                                                    <ul class="custom-megamenu">
                                                                        <li><a href="#">Ligthing</a></li>
                                                                        <li><a href="#">Sound</a></li>
                                                                        <li><a href="#">Event</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="#contact-block">Contact Us</a>
                                        </li>
                                    </ul> <!-- /.menu-list -->
                                </div> <!-- /.hours-content-->
                            </div><!-- /.menu-wrapper -->
                        </nav>
                    </div><!--  /.site-navigation -->

                    <div class="header-navigation-right">
                        <div class="search-wrap">
                            <div class="search-btn">
                                <i class="icofont-search"></i>
                            </div>
                            <div class="search-form">
                                <form action="#">
                                    <input type="search" placeholder="Search">
                                    <button type="submit"><i class="icofont-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!--~./ search-wrap ~-->
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
