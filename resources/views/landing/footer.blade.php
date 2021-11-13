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
