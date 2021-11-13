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

        @yield('content')

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
