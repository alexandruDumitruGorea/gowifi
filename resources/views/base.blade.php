<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ecobit</title>
    <link rel="icon" href="{{ url('wp/wp-content/themes/gowifi-template/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/owl.carousel.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/slick.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ url('wp/wp-content/themes/gowifi-template/css/style.css') }}">
</head>
<body>
    <!--::header part start::-->
    <header class="main_menu main_menu-laravel">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand main_logo" href="index.html"> <img src="{{ url('wp/wp-content/themes/gowifi-template/img/logo-text.svg') }}" alt="logo"> </a>
                        <a class="navbar-brand single_page_logo" href="index.html"> <img src="{{ url('wp/wp-content/themes/gowifi-template/img/logo-text-negro.svg') }}" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="features.html">features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="pricing.html">pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.html">Blog</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <a href="{{ url('register') }}" class="d-none d-sm-block btn_1 home_page_btn">sing up</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!--::Header part end::-->
    
    @yield('content')
    
    <!--::footer_part start::-->
    <footer class="footer_part">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-4 col-lg-4">
                    <div class="single_footer_part">
                        <a href="index.html" class="footer_logo_iner"> <img src="{{ url('wp/wp-content/themes/gowifi-template/img/logo-text-negro.svg') }}" alt="#"> </a>
                        <p>Gathered. Under is whose you'll to make years is mat lights thing together fish made
                            forth thirds cattle behold won't. Fourth creeping first female.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-2">
                    <div class="single_footer_part">
                        <h4>About Us</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Managed Website</a></li>
                            <li><a href="">Manage Reputation</a></li>
                            <li><a href="">Power Tools</a></li>
                            <li><a href="">Marketing Service</a></li>
                            <li><a href="">Customer Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Store Hours</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                            <li><a href="">Privacy & Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-2">
                    <div class="single_footer_part">
                        <h4>My Account</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Press Inquiries</a></li>
                            <li><a href="">Media Directories</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Resources</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Application Security</a></li>
                            <li><a href="">Software Policy</a></li>
                            <li><a href="">Supply Chain</a></li>
                            <li><a href="">Agencies Relation</a></li>
                            <li><a href="">Manage Reputation</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-8">
                    <div class="copyright_text">
                        <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer_icon social_icon">
                        <ul class="list-unstyled">
                            <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                            <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->
    
    <!-- jquery plugins here-->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/slick.min.js') }}"></script>
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/waypoints.min.js') }}"></script>
    <!-- custom js -->
    <script src="{{ url('wp/wp-content/themes/gowifi-template/js/custom.js') }}"></script>
</body>
</html>