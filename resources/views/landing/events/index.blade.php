@extends('landing.app')

@section('title', 'Brilla Futura - Events')

@section('header')
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
@endsection

@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Page Title Area
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-title-area bg-image bg-overlay" style="background-image: url('assets/images/header/1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <div class="page-header-caption">
                        <h2 class="page-title">Our Events</h2>
                    </div>
                    <!--~~./ page-header-caption ~~-->
                    <div class="breadcrumb-area">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('landing') }}">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Our Events</li>
                        </ol>
                    </div>
                    <!--~~./ breadcrumb-area ~~-->
                </div>
                <!--~~./ page-header-content ~~-->
            </div>
        </div>
    </div>
    <!--~~./ end container ~~-->
</div>
<!--~~./ end page title area ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	Start Latest News Block
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="blog-page-block ptb-130">
    <div class="container">
        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- Blog Items -->
                <div class="blog-latest-items">
                    <div class="row">
                        @foreach ($data['events'] as $event)

                        <div class="col-lg-4 col-md-6" style="border-bottom: 1px solid #158682; margin-bottom: 16px;">
                            <article class="post post-grid">
                                    <div class="post-thumb-area">
                                        <figure class="post-thumb">
                                            <a href="{{ route('landing.event.show', $event->id) }}">
                                                <img src="{{ asset('/storage/images/events/'.$event->file_image) }}" alt="{{ $event->file_image }}" />
                                            </a>
                                        </figure>
                                        <!-- /.post-thumb -->
                                    </div>
                                    <!-- /.post-thumb-area -->

                                    <div class="post-details">
                                        <div class="entry-meta entry-meta-date">
                                            <div class="entry-date">{{ $event->date }}</div>
                                        </div>
                                        <!--./ entry-meta-date -->
                                        <h2 class="entry-title">
                                            <a href="{{ route('landing.event.show', $event->id) }}">{{ $event->name }}</a>
                                        </h2>
                                        <!-- /.entry-title -->
                                        <div class="entry-meta">
                                            <div class="entry-meta-author">
                                                <div class="entry-author-name">
                                                    Location: <b>{{ $event->location }}</b>
                                                </div>
                                            </div>
                                            <!--./ entry-meta-author -->
                                        </div>
                                        <!-- /.entry-meta -->
                                    </div>
                                    <!-- /.post-details -->
                            </article>
                            <!-- /.post -->
                        </div>
                        <!-- /.col-lg-4 -->
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!--  /.blog-latest-items -->

                <!--~~~~~ Start View Btn ~~~~~-->
                <!-- <div class="view-btn-area text-center pd-t-50">
                    <a class="btn btn-primary" href="#">View All</a>
                </div> -->
                <!--~./ view-btn-area ~-->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!--  /.container -->
</div>
<!--~~./ end blog page ~~-->

@endsection
