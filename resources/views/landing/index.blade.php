@extends('landing.app')

@section('title', 'Brilla Futura')

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
                                            <a class="nav-link active" href="#hero-block">Home</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" href="{{ route('landing.events') }}">Events</a>
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
                                        @guest
                                        <li>
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        @endguest
                                        @auth
                                        <li class="megamenu">
                                            <a class="nav-link" href="#">{{ $data['user']->name }}</a>
                                            <ul class="sub-menu megamenu-main">
                                                <li>
                                                    <div class="megamenu-wrapper">
                                                        <div class="container megamenu-container">
                                                            <div class="row">
                                                                <div class="col-lg-12 megamenu-column">
                                                                    <h3 class="megamenu-heading">{{ $data['user']->name }}</h3>
                                                                    <ul class="custom-megamenu">
                                                                        <li><a href="#">Profile</a></li>
                                                                        <li><a href="#">Logout</a></li>
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
				Hero Block
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="hero-block" class="hero-block bg-white-smoke hero-block-one">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/rectangle2.png') }}" alt="Element">
        </div>
    </div>
    <div class="social-status-area">
        <div class="social-status">
            <a href="#"><i class="icofont-facebook"></i></a>
            <a href="#"><i class="icofont-twitter"></i></a>
            <a href="#"><i class="icofont-dribbble"></i></a>
            <a href="#"><i class="icofont-behance"></i></a>
            <a href="#"><i class="icofont-pinterest"></i></a>
        </div>
    </div>
    <div class="waves-effect bottom" style="background-image: url('assets/images/shape/shape-bottom1.png');">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <!-- Testimonial Slider -->
                <div id="hero-slider" class="swiper-container hero-slider-one">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="hero-content-area">
                                <h2 class="hero-title">
                                    <span>Pixel Perfect</span> Build for the future.
                                </h2>
                                <!-- /.hero-title -->
                                <div class="hero-desc">
                                    <p>You will enjoy modern home comforts in a traditional setting.</p>
                                </div>
                                <!-- /.hero-content-area -->
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="hero-content-area">
                                <h2 class="hero-title">
                                    <span>Pixel Perfect</span> Build for the future.
                                </h2>
                                <!-- /.hero-title -->
                                <div class="hero-desc">
                                    <p>You will enjoy modern home comforts in a traditional setting.</p>
                                </div>
                                <!-- /.hero-content-area -->
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-mockup-area">
                    <div class="hero-mockup-thumb one">
                        <img src="{{ asset('albireo/images/others/hero2.png') }}" alt="Thumb">
                        <div class="element-group">
                            <div class="element one">
                                <img src="{{ asset('albireo/images/element/circle2.png') }}" alt="Element">
                            </div>
                        </div>
                        <div class="promo-video">
                            <a href="https://player.vimeo.com/video/4760972" class="video-btn video-popup">
                                <span class="icofont-ui-play"></span>
                            </a>
                        </div><!-- /.promo-video -->
                    </div>
                    <div class="hero-mockup-thumb two">
                        <img src="{{ asset('albireo/images/others/hero2-1.png') }}" alt="Thumb">
                    </div>
                </div><!-- /.hero-mockup-area -->
            </div>
        </div>
    </div>
</div>
<!-- /.hero-block -->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start Services Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="service-block" class="services-block style-one">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/circle-helf1.png') }}" alt="Element">
        </div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="text-feature-block md-mrb-55">
                    <h2 class="title">
                        We Are <br />
                        Creative Brands.
                    </h2>
                    <div class="sub-title">
                        We are a fully in-house digital agency focusing on branding,
                        marketing, web design and development with clients ranging
                        from start-ups.
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                        volutpat imperdiet turpis, ut tincidunt ipsum. Ut dictum
                        bibendum ex, sed sagittis purus ornare rhoncus. Duis eu urna
                        tortor.
                    </p>
                    <a class="btn btn-default" href="#">Get Started</a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row service-items-area">
                    <div class="col-lg-6 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <img src="{{ asset('albireo/images/icon/services/1/1.png') }}" alt="Icon" />
                            </div>
                            <!-- /.service-icon -->
                            <div class="service-info">
                                <h3 class="title">Web Design</h3>
                                <p>
                                    Integer viverra saptien mollis, pharetra lectus sit
                                    amet, iaculis purus. Quisque pharetra arcu nulla
                                </p>
                                <a class="read-more-text" href="#">
                                    Learn More
                                    <i class="icofont-long-arrow-right"></i>
                                </a>
                            </div>
                            <!-- /.service-info -->
                        </div>
                        <!-- /.service-item -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <img src="{{ asset('albireo/images/icon/services/1/2.png') }}" alt="Icon" />
                            </div>
                            <!-- /.service-icon -->
                            <div class="service-info">
                                <h3 class="title">Digital Marketing</h3>
                                <p>
                                    Integer viverra saptien mollis, pharetra lectus sit
                                    amet, iaculis purus. Quisque pharetra arcu nulla
                                </p>
                                <a class="read-more-text" href="#">
                                    Learn More
                                    <i class="icofont-long-arrow-right"></i>
                                </a>
                            </div>
                            <!-- /.service-info -->
                        </div>
                        <!-- /.service-item -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <img src="{{ asset('albireo/images/icon/services/1/3.png') }}" alt="Icon" />
                            </div>
                            <!-- /.service-icon -->
                            <div class="service-info">
                                <h3 class="title">App Design</h3>
                                <p>
                                    Integer viverra saptien mollis, pharetra lectus sit
                                    amet, iaculis purus. Quisque pharetra arcu nulla
                                </p>
                                <a class="read-more-text" href="#">
                                    Learn More
                                    <i class="icofont-long-arrow-right"></i>
                                </a>
                            </div>
                            <!-- /.service-info -->
                        </div>
                        <!-- /.service-item -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-lg-6 col-md-6">
                        <div class="service-item">
                            <div class="service-icon">
                                <img src="{{ asset('albireo/images/icon/services/1/4.png') }}" alt="Icon" />
                            </div>
                            <!-- /.service-icon -->
                            <div class="service-info">
                                <h3 class="title">Development</h3>
                                <p>
                                    Integer viverra saptien mollis, pharetra lectus sit
                                    amet, iaculis purus. Quisque pharetra arcu nulla
                                </p>
                                <a class="read-more-text" href="#">
                                    Learn More
                                    <i class="icofont-long-arrow-right"></i>
                                </a>
                            </div>
                            <!-- /.service-info -->
                        </div>
                        <!-- /.service-item -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!--~~./ end services block ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start About Us Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="about-block" class="about-us-block style-one bg-white-smoke">
    <div class="waves-effect top" style="background-image: url('assets/images/shape/shape-top1.png');"></div>
    <div class="waves-effect bottom" style="background-image: url('assets/images/shape/shape-bottom2.png');">
    </div>
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/rectangle1.png') }}" alt="Element">
        </div>
        <div class="element two">
            <img src="{{ asset('albireo/images/element/circle3.png') }}" alt="Element">
        </div>
    </div>
    <div class="container">
        <!-- Title Row -->
        <div class="row align-items-center md-wrap-reverse">
            <div class="col-lg-6">
                <div class="mock-up-thumb">
                    <img src="{{ asset('albireo/images/about/about1.png') }}" alt="About Mock" />
                </div>
                <!-- /.mock-up-block -->
            </div>
            <!-- /.col-lg-5 -->
            <div class="col-lg-6">
                <div class="text-feature-block md-mrb-55">
                    <h2 class="title">
                        More than 1M+ People Are Happy With Us
                    </h2>
                    <div class="sub-title">
                        We are a fully in-house digital agency focusing on branding,
                        marketing, web design and development with clients ranging
                        from start-ups.
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                        volutpat imperdiet turpis, ut tincidunt ipsum. Ut dictum
                        bibendum .
                    </p>
                    <a class="btn btn-default btn-green" href="#">Get Started</a>
                </div>
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!--~~./ end about us block ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start Fanfact Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="fanfact-block style-one pd-t-100">
    <div class="container">
        <div class="row fanfact-promo-numbers">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="promo-number">
                    <div class="promo-number-inner">
                        <div class="icon">
                            <img src="{{ asset('albireo/images/icon/fanfact/1.png') }}" alt="Icon" />
                        </div>
                        <!-- /.icon -->
                        <div class="info">
                            <div class="odometer-wrap">
                                <div class="odometer" data-odometer-final="100">0</div>
                                k
                            </div>
                            <!-- /.odometer-wrap -->
                            <h4 class="promo-title">Satisfy Customers</h4>
                            <!-- /.promo-title -->
                        </div>
                        <!-- /.info -->
                    </div>
                </div>
                <!-- /.promo-number -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="promo-number">
                    <div class="promo-number-inner">
                        <div class="icon">
                            <img src="{{ asset('albireo/images/icon/fanfact/2.png') }}" alt="Icon" />
                        </div>
                        <!-- /.icon -->
                        <div class="info">
                            <div class="odometer-wrap">
                                <div class="odometer" data-odometer-final="1500">0</div>
                                +
                            </div>
                            <!-- /.odometer-wrap -->
                            <h4 class="promo-title">Completed Projects</h4>
                            <!-- /.promo-title -->
                        </div>
                        <!-- /.info -->
                    </div>
                </div>
                <!-- /.promo-number -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="promo-number">
                    <div class="promo-number-inner">
                        <div class="icon">
                            <img src="{{ asset('albireo/images/icon/fanfact/3.png') }}" alt="Icon" />
                        </div>
                        <!-- /.icon -->
                        <div class="info">
                            <div class="odometer-wrap">
                                <div class="odometer" data-odometer-final="15">0</div>
                                +
                            </div>
                            <!-- /.odometer-wrap -->
                            <h4 class="promo-title">Team Members</h4>
                            <!-- /.promo-title -->
                        </div>
                        <!-- /.info -->
                    </div>
                </div>
                <!-- /.promo-number -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="promo-number">
                    <div class="promo-number-inner">
                        <div class="icon">
                            <img src="{{ asset('albireo/images/icon/fanfact/4.png') }}" alt="Icon" />
                        </div>
                        <!-- /.icon -->
                        <div class="info">
                            <div class="odometer-wrap">
                                <div class="odometer" data-odometer-final="1850">0</div>
                                +
                            </div>
                            <!-- /.odometer-wrap -->
                            <h4 class="promo-title">Our Blog Posts</h4>
                            <!-- /.promo-title -->
                        </div>
                        <!-- /.info -->
                    </div>
                </div>
                <!-- /.promo-number -->
            </div>
            <!-- /.col-lg-3 -->
        </div>
        <!-- /.fanfact-promo-numbers -->
    </div>
</div>
<!--~~./ end fanfact block ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start Team Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="team-block pd-t-130">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/circle-helf2.png') }}" alt="Element">
        </div>
    </div>
    <div class="container ml-b-55">
        <div class="row">
            <div class="col-lg-7 col-md-8">
                <div class="section-title">
                    <h2 class="title-main">
                        They've Already Learned To The Programming But You?
                    </h2>
                    <!-- /.title-main -->
                </div>
                <!-- /.section-title -->
            </div>
            <!-- /.col-lg-7 -->
        </div>
        <!-- /.row -->
        <div class="row team-items-list">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-item">
                    <div class="team-thumbnail-area">
                        <figure class="team-thumb">
                            <img src="{{ asset('albireo/images/team/1.png') }}" alt="Sport Thumb" />
                        </figure>
                        <!-- /.team-thumb -->
                    </div>
                    <!-- /.team-thumbnail-area -->
                    <div class="team-info text-center">
                        <h3 class="team-name">
                            <a href="single-team.html">Mary Adams</a>
                        </h3>
                        <p class="designation color-orange">Founder</p>
                        <div class="social-status">
                            <a href="#"><i class="icofont-facebook"></i></a>
                            <a href="#"><i class="icofont-twitter"></i></a>
                            <a href="#"><i class="icofont-dribbble"></i></a>
                            <a href="#"><i class="icofont-behance"></i></a>
                            <a href="#"><i class="icofont-pinterest"></i></a>
                        </div>
                        <!-- /.social-status -->
                    </div>
                    <!-- /.team-info -->
                </div>
                <!-- /.team-item -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-item">
                    <div class="team-thumbnail-area">
                        <figure class="team-thumb">
                            <img src="{{ asset('albireo/images/team/2.png') }}" alt="Sport Thumb" />
                        </figure>
                        <!-- /.team-thumb -->
                    </div>
                    <!-- /.team-thumbnail-area -->
                    <div class="team-info text-center">
                        <h3 class="team-name">
                            <a href="single-team.html">Neil Chad</a>
                        </h3>
                        <p class="designation color-green">Senior Creative Designer</p>
                        <div class="social-status">
                            <a href="#"><i class="icofont-facebook"></i></a>
                            <a href="#"><i class="icofont-twitter"></i></a>
                            <a href="#"><i class="icofont-dribbble"></i></a>
                            <a href="#"><i class="icofont-behance"></i></a>
                            <a href="#"><i class="icofont-pinterest"></i></a>
                        </div>
                        <!-- /.social-status -->
                    </div>
                    <!-- /.team-info -->
                </div>
                <!-- /.team-item -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="team-item">
                    <div class="team-thumbnail-area">
                        <figure class="team-thumb">
                            <img src="{{ asset('albireo/images/team/3.png') }}" alt="Sport Thumb" />
                        </figure>
                        <!-- /.team-thumb -->
                    </div>
                    <!-- /.team-thumbnail-area -->
                    <div class="team-info text-center">
                        <h3 class="team-name">
                            <a href="single-team.html">Sarah Tyler</a>
                        </h3>
                        <p class="designation">Marketing Manager</p>
                        <div class="social-status">
                            <a href="#"><i class="icofont-facebook"></i></a>
                            <a href="#"><i class="icofont-twitter"></i></a>
                            <a href="#"><i class="icofont-dribbble"></i></a>
                            <a href="#"><i class="icofont-behance"></i></a>
                            <a href="#"><i class="icofont-pinterest"></i></a>
                        </div>
                        <!-- /.social-status -->
                    </div>
                    <!-- /.team-info -->
                </div>
                <!-- /.team-item -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!--~~./ end team block ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
										Start Work brand Block
								~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="work-brand-block style-one">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--~~ Start Brands Carousel ~~-->
                <div class="swiper-container brands-carousel-one">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="brands-link">
                                <img src="{{ asset('albireo/images/brand/1.png') }}" alt="logo" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brands-link">
                                <img src="{{ asset('albireo/images/brand/2.png') }}" alt="logo" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brands-link">
                                <img src="{{ asset('albireo/images/brand/3.png') }}" alt="logo" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brands-link">
                                <img src="{{ asset('albireo/images/brand/4.png') }}" alt="logo" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brands-link">
                                <img src="{{ asset('albireo/images/brand/5.png') }}" alt="logo" />
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="brands-link">
                                <img src="{{ asset('albireo/images/brand/6.png') }}" alt="logo" />
                            </div>
                        </div>
                    </div>
                </div>
                <!--~./ end brands carousel ~-->
            </div>
        </div>
    </div>
</div>
<!--~./ end popular brands block ~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start Portfolio Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="portfolio-block" class="portfolio-block bg-white-smoke style-one">
    <div class="waves-effect top" style="background: url('assets/images/shape/shape-top2.png');"></div>
    <div class="waves-effect bottom" style="background: url('assets/images/shape/shape-bottom4.png');"></div>
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/circle3.png') }}" alt="Element">
        </div>
        <div class="element two">
            <img src="{{ asset('albireo/images/element/element.png') }}" alt="Element">
        </div>
    </div>
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-6 col-md-7">
                <div class="section-title">
                    <h2 class="title-main">
                        Let’s See <br> Our Latest Works.
                    </h2>
                    <!-- /.title-main -->
                </div>
                <!-- /.section-title -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6 col-md-5">
                <div class="btn-more-area text-right">
                    <a class="btn btn-default btn-orange" href="#">Get Started</a>
                </div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-12">
                <!-- Portfolio Scroll Slider -->
                <div class="swiper-container portfolio-scroll-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="portfolio-item style-two">
                                <figure class="portfolio-thumb">
                                    <img src="{{ asset('albireo/images/portfolio/home/1.jpg') }}" alt="portfolio Item">
                                    <div class="overlay-wrapper">
                                        <div class="overlay">
                                        </div><!-- /.overlay -->
                                        <div class="read-more-area">
                                            <a class="read-more-text" href="#">
                                                Learn More
                                                <i class="icofont-long-arrow-right"></i>
                                            </a>
                                        </div>
                                        <div class="portfolio-info">
                                            <div class="heading-text">
                                                <h3 class="heading"><a href="#">Creative Web Agency</a></h3>
                                            </div>
                                            <div class="cat-text">
                                                <p class="cat">Creative Branding</p>
                                            </div>
                                        </div><!-- /.portfolio-info -->
                                    </div><!-- /.overlay-wrapper -->
                                </figure><!-- /.portfolio-thumb -->
                            </div><!-- /.portfolio-item -->
                        </div>
                        <div class="swiper-slide">
                            <div class="portfolio-item style-two">
                                <figure class="portfolio-thumb">
                                    <img src="{{ asset('albireo/images/portfolio/home/2.jpg') }}" alt="portfolio Item">
                                    <div class="overlay-wrapper">
                                        <div class="overlay">
                                        </div><!-- /.overlay -->
                                        <div class="read-more-area">
                                            <a class="read-more-text" href="#">
                                                Learn More
                                                <i class="icofont-long-arrow-right"></i>
                                            </a>
                                        </div>
                                        <div class="portfolio-info">
                                            <div class="heading-text">
                                                <h3 class="heading"><a href="#">App
                                                        Nike Epic</a></h3>
                                            </div>
                                            <div class="cat-text">
                                                <p class="cat">Creative Branding</p>
                                            </div>
                                        </div><!-- /.portfolio-info -->
                                    </div><!-- /.overlay-wrapper -->
                                </figure><!-- /.portfolio-thumb -->
                            </div><!-- /.portfolio-item -->
                        </div>
                        <div class="swiper-slide">
                            <div class="portfolio-item style-two">
                                <figure class="portfolio-thumb">
                                    <img src="{{ asset('albireo/images/portfolio/home/3.jpg') }}" alt="portfolio Item">
                                    <div class="overlay-wrapper">
                                        <div class="overlay">
                                        </div><!-- /.overlay -->
                                        <div class="read-more-area">
                                            <a class="read-more-text" href="#">
                                                Learn More
                                                <i class="icofont-long-arrow-right"></i>
                                            </a>
                                        </div>
                                        <div class="portfolio-info">
                                            <div class="heading-text">
                                                <h3 class="heading"><a href="#">Creative Web Agency</a></h3>
                                            </div>
                                            <div class="cat-text">
                                                <p class="cat">Local Company</p>
                                            </div>
                                        </div><!-- /.portfolio-info -->
                                    </div><!-- /.overlay-wrapper -->
                                </figure><!-- /.portfolio-thumb -->
                            </div><!-- /.portfolio-item -->
                        </div>
                    </div>
                    <!-- Add Scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div><!-- /.portfolio-scroll-slider -->
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!--~~./ end portfolio block ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
						Start Work Process Block
				~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="work-process-block pd-t-130 pd-b-30">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/wave.png') }}" alt="Element">
        </div>
        <div class="element two">
            <img src="{{ asset('albireo/images/element/star1.png') }}" alt="Element">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="text-feature-block ms-mrb-50">
                    <h2 class="title">Our Workflow Process.</h2>
                    <div class="sub-title">
                        We are a fully in-house digital agency focusing on branding,
                        marketing, web design and development with clients ranging
                        from start-ups.
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                        volutpat imperdiet turpis, ut tincidunt ipsum. Ut dictum
                        bibendum .
                    </p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <!-- Workflow Slider -->
                <div class="swiper-container workflow-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="swiper-slide-inner">
                                <div class="single-process">
                                    <div class="process-icon">
                                        <img src="{{ asset('albireo/images/icon/process/1.png') }}" alt="Icon" />
                                    </div>
                                    <!-- /.process-icon -->
                                    <div class="process-info">
                                        <h3 class="title">Ideas & Brainstorming</h3>
                                        <p>
                                            Integer viverra sapien mollis, pharetra lectus sit
                                            amet, iaculis purus. Quisque pharetra arcu nulla
                                        </p>
                                        <a class="read-more-text" href="#">
                                            Learn More
                                            <i class="icofont-long-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- /.process-info -->
                                </div>
                            </div>
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="swiper-slide-inner">
                                <div class="single-process">
                                    <div class="process-icon">
                                        <img src="{{ asset('albireo/images/icon/process/2.png') }}" alt="Icon" />
                                    </div>
                                    <!-- /.process-icon -->
                                    <div class="process-info">
                                        <h3 class="title">XD & Figma Designs</h3>
                                        <p>
                                            Integer viverra sapien mollis, pharetra lectus sit
                                            amet, iaculis purus. Quisque pharetra arcu nulla
                                        </p>
                                        <a class="read-more-text" href="#">
                                            Learn More
                                            <i class="icofont-long-arrow-right"></i>
                                        </a>
                                    </div>
                                    <!-- /.process-info -->
                                </div>
                            </div>
                        </div><!-- /.swiper-slide -->
                    </div>
                    <div class="swiper-navigation btn-links-area">
                        <div class="button-next btn-links"><i class="icofont-arrow-left"></i></div>
                        <div class="button-prev btn-links"><i class="icofont-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container -->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start Latest News Block
						~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="blog-block" class="latest-news-block style-one bg-white-smoke">
    <div class="waves-effect top" style="background: url('assets/images/shape/shape-top3.png');"></div>
    <div class="waves-effect bottom" style="background: url('assets/images/shape/shape-bottom3.png');"></div>
    <div class="container ml-b-45">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title text-center">
                    <h2 class="title-main">
                        Our Latest News
                    </h2>
                    <!-- /.title-main -->
                </div>
                <!-- /.section-title -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <article class="post post-grid">
                    <div class="post-thumb-area">
                        <figure class="post-thumb">
                            <a href="blog-single.html">
                                <img src="{{ asset('albireo/images/blog/post/grid/1.jpg') }}" alt="Blog Image" />
                            </a>
                        </figure>
                        <!-- /.post-thumb -->
                    </div>
                    <!-- /.post-thumb-area -->

                    <div class="post-details">
                        <div class="entry-meta entry-meta-date">
                            <div class="entry-date">
                                21 April 2020
                            </div>
                        </div>
                        <!--./ entry-meta-date -->
                        <h2 class="entry-title">
                            <a href="#">
                                UX and UI Design Trends 2020
                            </a>
                        </h2>
                        <!-- /.entry-title -->
                        <div class="entry-meta">
                            <div class="entry-meta-author">
                                <div class="entry-author-thumb">
                                    <img class="avatar photo" src="{{ asset('albireo/images/author/a1.png') }}" alt="author" />
                                </div>
                                <div class="entry-author-name">
                                    By <a href="#">Thomas Wayne</a>
                                </div>
                            </div>
                            <!--./ entry-meta-author -->

                            <div class="entry-love">
                                <i class="icofont-heart-alt"></i>
                                49
                            </div>
                            <!--./ entry-date -->
                        </div>
                        <!-- /.entry-meta -->
                    </div>
                    <!-- /.post-details -->
                </article>
                <!-- /.post -->
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4 col-md-6">
                <article class="post post-grid">
                    <div class="post-thumb-area">
                        <figure class="post-thumb">
                            <a href="blog-single.html">
                                <img src="{{ asset('albireo/images/blog/post/grid/2.jpg') }}" alt="Blog Image" />
                            </a>
                        </figure>
                        <!-- /.post-thumb -->
                    </div>
                    <!-- /.post-thumb-area -->

                    <div class="post-details">
                        <div class="entry-meta entry-meta-date">
                            <div class="entry-date">
                                15 March 2020
                            </div>
                        </div>
                        <!--./ entry-meta-date -->
                        <h2 class="entry-title">
                            <a href="#">
                                Trending Illustration Styles 2020
                            </a>
                        </h2>
                        <!-- /.entry-title -->
                        <div class="entry-meta">
                            <div class="entry-meta-author">
                                <div class="entry-author-thumb">
                                    <img class="avatar photo" src="{{ asset('albireo/images/author/a2.png') }}" alt="author" />
                                </div>
                                <div class="entry-author-name">
                                    By <a href="#">Amelie Perkins</a>
                                </div>
                            </div>
                            <!--./ entry-meta-author -->

                            <div class="entry-love">
                                <i class="icofont-heart-alt"></i>
                                85
                            </div>
                            <!--./ entry-date -->
                        </div>
                        <!-- /.entry-meta -->
                    </div>
                    <!-- /.post-details -->
                </article>
                <!-- /.post -->
            </div>
            <!-- /.col-lg-4 -->
            <div class="col-lg-4 col-md-6">
                <article class="post post-grid">
                    <div class="post-thumb-area">
                        <figure class="post-thumb">
                            <a href="blog-single.html">
                                <img src="{{ asset('albireo/images/blog/post/grid/3.jpg') }}" alt="Blog Image" />
                            </a>
                        </figure>
                        <!-- /.post-thumb -->
                    </div>
                    <!-- /.post-thumb-area -->

                    <div class="post-details">
                        <div class="entry-meta entry-meta-date">
                            <div class="entry-date">
                                10 February 2020
                            </div>
                        </div>
                        <!--./ entry-meta-date -->
                        <h2 class="entry-title">
                            <a href="#">
                                Top 10 WordPress Themes 2020
                            </a>
                        </h2>
                        <!-- /.entry-title -->
                        <div class="entry-meta">
                            <div class="entry-meta-author">
                                <div class="entry-author-thumb">
                                    <img class="avatar photo" src="{{ asset('albireo/images/author/a1.png') }}" alt="author" />
                                </div>
                                <div class="entry-author-name">
                                    By <a href="#">Andrew Kemp</a>
                                </div>
                            </div>
                            <!--./ entry-meta-author -->

                            <div class="entry-love">
                                <i class="icofont-heart-alt"></i>
                                23
                            </div>
                            <!--./ entry-date -->
                        </div>
                        <!-- /.entry-meta -->
                    </div>
                    <!-- /.post-details -->
                </article>
                <!-- /.post -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!--~~./ end latest news block ~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
								Start Contact Form Block
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="contact-form-block style-two pd-b-130">
    <div class="element-group">
        <div class="element one">
            <img src="{{ asset('albireo/images/element/triangle1.png') }}" alt="Element">
        </div>
        <div class="element two">
            <img src="{{ asset('albireo/images/element/circle3.png') }}" alt="Element">
        </div>
    </div>
    <div class="container ml-b-40">
        <div class="row">
            <div class="col-lg-5 col-md-6">
                <div class="section-title">
                    <h2 class="title-main">
                        Don’t Hesitate to Contact us.
                    </h2>
                    <!-- /.title-main -->
                </div>
                <!-- /.section-title -->
            </div>
            <!-- /.col-lg-5 -->
        </div>
        <!-- /.row -->
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="google-map md-mrb-50">
                    <img src="{{ asset('albireo/images/others/google-map.png') }}" alt="Map">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-form-area">
                    <form id="contact_form" class="contact-form" action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input class="form-controller" id="name" name="name" type="text">
                                </div>
                            </div>
                            <!--./ col-lg-6-->
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <label for="email">Your Email</label>
                                    <input class="form-controller" id="email" name="email" type="email">
                                </div>
                            </div>
                            <!--./ col-lg-6 -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Your Message</label>
                                    <textarea id="message" name="message" class="form-controller" rows="4" cols="50"></textarea>
                                </div>
                            </div><!-- /.col-12 -->
                            <div class="col-12 mrt-15">
                                <button type="submit" class="btn btn-primary">Submit
                                    Mail</button>
                            </div>
                            <!--./ col-lg-6 -->
                        </div><!-- /.row -->
                    </form><!-- /.contact-form -->
                </div><!-- /.contact-form-area -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-contact-info">
                            <h3 class="title">Postal Address</h3>
                            <div class="card-info">
                                <p>PO Box 16122 Toronto Eaton Centre, 220 The PATH Toronto, ON M5B 2H1, Canada
                                </p>
                                <div class="social-status">
                                    <a href="#"><i class="icofont-facebook"></i></a>
                                    <a href="#"><i class="icofont-twitter"></i></a>
                                    <a href="#"><i class="icofont-dribbble"></i></a>
                                    <a href="#"><i class="icofont-behance"></i></a>
                                    <a href="#"><i class="icofont-pinterest"></i></a>
                                </div>
                            </div><!-- /.card-info -->
                        </div><!-- /.single-contact-info -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-contact-info">
                            <h3 class="title">Office Contacts</h3>
                            <div class="card-info">
                                <ul class="info-list">
                                    <li><i class="icofont-phone"></i> +44 1234 567 9</li>
                                    <li><i class="icofont-send-mail"></i> <a href="#">youremail@yourdomain.com</a></li>
                                    <li><i class="icofont-globe-alt"></i> <a href="#">www.envato.com</a></li>
                                </ul>
                            </div><!-- /.card-info -->
                        </div><!-- /.single-contact-info -->
                    </div>
                </div>
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!--~~./ end contact form block ~~-->

@endsection
