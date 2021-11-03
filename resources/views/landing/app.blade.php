<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Specific Meta
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Albireo is a creative one page HTML Template." />
    <meta name="keywords" content="HTML5, Template, Design, agency, app, blog, business, clean, creative, marketing, modern, multipurpose, portfolio, seo, startup, studio, trending" />
    <meta name="author" content="DesignsNinja" />

    <!-- Titles
    ================================================== -->
    <title>@yield('title')</title>

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('logo-block.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('logo-block.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('logo-block.png') }}" />

    <!-- Custom Font
	================================================== -->
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Barlow:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('albireo/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('albireo/css/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('albireo/css/simple-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('albireo/css/odometer-theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('albireo/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('albireo/css/icofont.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('albireo/css/style.css') }}" />

    <script src="{{ asset('albireo/js/modernizr.min.js') }}"></script>
</head>

<body data-spy="scroll" data-offset="170" data-target=".navigation-area">
    <!--********************************************************-->
    <!--********************* SITE CONTENT *********************-->
    <!--********************************************************-->
    <div class="site-content">

        @yield('header')

        @yield('content')

        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Site Footer
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <footer id="contact-block" class="site-footer">
            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
									Start Footer Widget Area
							~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="footer-widget-area">
                <div class="container">
                    <div class="row">
                        <!--~~~~~ Start Widget About us ~~~~~-->
                        <div class="col-lg-3 col-md-6">
                            <aside class="widget widget_about">
                                <h2 class="widget-title">About Us</h2>
                                <div class="widget-content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        In at purus varius odio tempus cursus. vitae, commodo dui.
                                    </p>
                                    <a class="btn btn-primary" href="#">Learn More</a>
                                </div>
                            </aside>
                        </div>
                        <!--~./ end about us widget ~-->

                        <!--~~~~~ Start Widget Links ~~~~~-->
                        <div class="col-lg-2 col-md-6">
                            <aside class="widget widget_links">
                                <h2 class="widget-title">Quick Links</h2>
                                <div class="widget-content">
                                    <ul>
                                        <li><a href="{{ route('landing.rentals') }}">Sewa Alat</a></li>
                                        <li><a href="{{ route('landing.events') }}">Event</a></li>
                                        <li><a href="#contact-block">Kontak</a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                        <!--~./ end links widget ~-->

                        <!--~~~~~ Start Post List Widget ~~~~~-->
                        <div class="col-lg-3 col-md-6">
                            <aside class="widget widget-post-list">
                                <h4 class="widget-title">Recent Post</h4>
                                <!-- /.widget-title -->

                                <div class="widget-content">
                                    <article class="post">
                                        <div class="thumb-wrap">
                                            <a href="single-post.html">
                                                <img src="{{ asset('albireo/images/widget/post/recent/1.png') }}" alt="post" />
                                            </a>
                                        </div>
                                        <!--./ thumb-wrap -->
                                        <div class="content-entry-wrap">
                                            <h3 class="entry-title">
                                                <a href="single-post.html">Ut venenatis, Commodo ligula</a>
                                            </h3>
                                            <!--./ entry-title -->
                                            <div class="entry-content">
                                                <p>Lorem ipsum dolor sit amet, adipiscing elit...</p>
                                            </div>
                                            <!--./ entry-content -->
                                        </div>
                                    </article>
                                    <!--./ end post -->

                                    <article class="post">
                                        <div class="thumb-wrap">
                                            <a href="single-post.html">
                                                <img src="{{ asset('albireo/images/widget/post/recent/2.png') }}" alt="post" />
                                            </a>
                                        </div>
                                        <!--./ thumb-wrap -->
                                        <div class="content-entry-wrap">
                                            <h3 class="entry-title">
                                                <a href="single-post.html">Ut venenatis, Commodo ligula</a>
                                            </h3>
                                            <!--./ entry-title -->
                                            <div class="entry-content">
                                                <p>Lorem ipsum dolor sit amet, adipiscing elit...</p>
                                            </div>
                                            <!--./ entry-content -->
                                        </div>
                                    </article>
                                    <!--./ end post -->
                                </div>
                            </aside>
                        </div>
                        <!--~./ end post list widget ~-->

                        <!--~~~~~ Start Subscribe Widget~~~~~-->
                        <div class="col-lg-4 col-md-6">
                            <aside class="widget tb-subscribe-widget">
                                <h4 class="widget-title">Subscribe Now</h4>
                                <div class="widget-content">
                                    <div class="subscribe-box">
                                        <div class="subscribe-form">
                                            <!-- Subscribe form -->
                                            <form class="dv-form" id="mc-form">
                                                <div class="form-group">
                                                    <input id="mc-email" name="EMAIL" placeholder="Enter Your Email Address" type="email" />
                                                    <button class="btn btn-primary" name="Subscribe" id="subscribe-btn" type="submit">
                                                        Subscribe Now
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="social-status">
                                        <a href="#"><i class="icofont-facebook"></i></a>
                                        <a href="#"><i class="icofont-twitter"></i></a>
                                        <a href="#"><i class="icofont-dribbble"></i></a>
                                        <a href="#"><i class="icofont-behance"></i></a>
                                        <a href="#"><i class="icofont-pinterest"></i></a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <!--~./ end subscribe widget ~-->
                    </div>
                </div>
            </div>
            <!--~./ end footer widgets area ~-->

            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
									Start Footer Bottom Area
							~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="footer-bottom-content text-center">
                                <a class="footer-logo-area" href="#">
                                    <img src="{{ asset('logo-block.png') }}" width="160" alt="Logo" />
                                </a>
                                <div class="copyright-text text-center">
                                    <p>© 2021 Brilla Futura Designed by <a href="#">Envato</a></p>
                                </div>
                                <!--~./ end copyright text ~-->
                            </div>
                        </div>
                        <!--~./ col-12 ~-->
                    </div>
                </div>
            </div>
            <!--~./ end footer bottom area ~-->
        </footer>
        <!--~./ end site footer ~-->
    </div>
    <!--~~./ end site content ~~-->

    <!-- All The JS Files
			================================================== -->
    <script src="{{ asset('albireo/js/jquery.js') }}"></script>
    <script src="{{ asset('albireo/js/popper.min.js') }}"></script>
    <script src="{{ asset('albireo/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('albireo/js/plugins.js') }}"></script>
    <script src="{{ asset('albireo/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('albireo/js/simple-scrollbar.min.js') }}"></script>
    <script src="{{ asset('albireo/js/background-parallax.js') }}"></script>
    <script src="{{ asset('albireo/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('albireo/js/theia-sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('albireo/js/ResizeSensor.min.js') }}"></script>
    <script src="{{ asset('albireo/js/swiper.min.js') }}"></script>
    <script src="{{ asset('albireo/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('albireo/js/packery-mode.pkgd.min.js') }}"></script>
    <script src="{{ asset('albireo/js/scrolla.jquery.min.js') }}"></script>
    <script src="{{ asset('albireo/js/odometer.min.js') }}"></script>
    <script src="{{ asset('albireo/js/isInViewport.jquery.js') }}"></script>
    <script src="{{ asset('albireo/js/contact.js') }}"></script>
    <script src="{{ asset('albireo/js/main.js') }}"></script>
    <!-- main-js -->
</body>

</html>
