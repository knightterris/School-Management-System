<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
 ================================================== -->
    <meta charset="utf-8">
    <title>Educenter</title>

    <!-- Mobile Specific Metas
 ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Educenter HTML Template v1.0">

    <!-- theme meta -->
    <meta name="theme-name" content="educenter" />

    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('home/plugins/bootstrap/bootstrap.min.css') }}">
    <!-- slick slider -->
    <link rel="stylesheet" href="{{ asset('home/plugins/slick/slick.css') }}">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="{{ asset('home/plugins/themify-icons/themify-icons.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('home/plugins/animate/animate.css') }}">
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('home/plugins/aos/aos.css') }}">
    <!-- venobox popup -->
    <link rel="stylesheet" href="{{ asset('home/plugins/venobox/venobox.css') }}">

    <!-- Main Stylesheet -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('home/images/favicon.png') }}" type="image/x-icon">

</head>

<body>
    <!-- preloader start -->
    <div class="preloader">
        <img src="{{ asset('home/images/preloader.gif') }}" alt="preloader">
    </div>
    <!-- preloader end -->

    <!-- header -->
    <header class="fixed-top header">
        <!-- top header -->
        <div class="top-header py-2 bg-white">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-lg-4 text-center text-lg-left">
                        <a class="text-color mr-3" href="tel:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
                        <ul class="list-inline d-inline">
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color"
                                    href="https://facebook.com/themefisher/"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color"
                                    href="https://twitter.com/themefisher"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color"
                                    href="https://github.com/themefisher"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color"
                                    href="https://instagram.com/themefisher/"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-8 text-center text-lg-right">
                        <ul class="list-inline">
                            <a href="{{ route('auth#registerPage') }}"><button
                                    class="btn btn-warning">Register</button></a>
                            <a href="{{ route('auth#loginPage') }}"><button class="btn btn-warning">Login</button></a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar -->
        <div class="navigation w-100">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('home/images/logo.png') }}"
                            alt="logo"></a>
                    <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse"
                        data-target="#navigation" aria-controls="navigation" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navigation">
                        <ul class="navbar-nav ml-auto text-center">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('mainPage') }}">Home</a>
                            </li>
                            <li class="nav-item @@about">
                                <a class="nav-link" href="{{ route('main#aboutPage') }}">About</a>
                            </li>
                            <li class="nav-item @@courses">
                                <a class="nav-link" href="{{ route('main#blogPage') }}">Blog</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('main#scholarshipPage') }}">Scholarship</a>
                            </li>
                            <li class="nav-item @@contact">
                                <a class="nav-link" href="{{ route('main#contactPage') }}">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- /header -->


    @if (url()->current() == route('mainPage'))
        <!-- hero slider -->
        <section class="hero-section overlay bg-cover"
            data-background="{{ asset('home/images/banner/banner-1.jpg') }}">
            <div class="container">
                <div class="hero-slider">
                    <!-- slider item -->
                    <div class="hero-slider-item">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="text-white" data-animation-out="fadeOutRight" data-delay-out="5"
                                    data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".1">Your
                                    bright
                                    future is our mission</h1>
                                <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="5"
                                    data-duration-in=".3" data-animation-in="fadeInLeft" data-delay-in=".4">Lorem
                                    ipsum
                                    dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod
                                    tempor
                                    incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exer</p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /hero slider -->

        <!-- banner-feature -->
        <section class="bg-gray overflow-md-hidden">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-xl-4 col-lg-5 align-self-end">
                        <img class="img-fluid w-100" src="{{ asset('home/images/banner/banner-feature.png') }}"
                            alt="banner-feature">
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="row feature-blocks bg-gray justify-content-between">
                            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                                <i class="ti-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                                <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholorship News</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore
                                    et dolore magna aliqua. Ut enim ad</p>
                            </div>
                            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                                <i class="ti-blackboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                                <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore
                                    et dolore magna aliqua. Ut enim ad</p>
                            </div>
                            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                                <i class="ti-agenda mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                                <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore
                                    et dolore magna aliqua. Ut enim ad</p>
                            </div>
                            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
                                <i class="ti-write mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
                                <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore
                                    et dolore magna aliqua. Ut enim ad</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /banner-feature -->

        <!-- about us -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 order-2 order-md-1">
                        <h2 class="section-title">About Educenter</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex
                            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                            dolore eu fugiat
                            nulla pariatur. Excepteur sint occaecat </p>
                        <p>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut
                            perspiciatis
                            unde omnis iste natus error sit voluptatem</p>

                    </div>
                    <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
                        <img class="img-fluid w-100" src="{{ asset('home/images/about/about-us.jpg') }}"
                            alt="about image">
                    </div>
                </div>
            </div>
        </section>
        <!-- /about us -->


        <!-- success story -->
        <section class="section bg-cover" data-background="{{ asset('home/images/backgrounds/success-story.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-4 position-relative success-video">
                        <a class="play-btn venobox" href="https://youtu.be/nA1Aqp0sPQo" data-vbtype="video">
                            <i class="ti-control-play"></i>
                        </a>
                    </div>
                    <div class="col-lg-6 col-sm-8">
                        <div class="bg-white p-5">
                            <h2 class="section-title">Success Stories</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                                nisi
                                ut aliquip ex
                                ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum
                                dolore eu
                                fugiat nulla pariatur. Excepteur sint occaecat.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut
                                labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /success story -->
    @else
        @yield('content')
    @endif



    <!-- footer -->
    <footer>
        <!-- newsletter -->

        <!-- footer content -->
        <div class="footer bg-footer section border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-sm-8 mb-5 mb-lg-0">
                        <!-- logo -->
                        <a class="logo-footer" href=""><img class="img-fluid mb-4"
                                src="{{ asset('home/images/logo.png') }}" alt="logo"></a>
                        <ul class="list-unstyled">
                            <li class="mb-2">23621 15 Mile Rd #C104, Clinton MI, 48035, New York, USA</li>
                            <li class="mb-2">+1 (2) 345 6789</li>
                            <li class="mb-2">+1 (2) 345 6789</li>
                            <li class="mb-2">contact@yourdomain.com</li>
                        </ul>
                    </div>
                    <!-- company -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">COMPANY</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a class="text-color" href="">About Us</a></li>
                            <li class="mb-3"><a class="text-color" href="">Our Teacher</a></li>
                            <li class="mb-3"><a class="text-color" href="">Contact</a></li>
                            <li class="mb-3"><a class="text-color" href="">Blog</a></li>
                        </ul>
                    </div>
                    <!-- links -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">LINKS</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a class="text-color" href="">Courses</a></li>
                            <li class="mb-3"><a class="text-color" href="">Events</a></li>
                            <li class="mb-3"><a class="text-color" href="">Notice</a></li>
                            <li class="mb-3"><a class="text-color" href="">Scholarship</a></li>
                        </ul>
                    </div>
                    <!-- support -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">SUPPORT</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a class="text-color" href="https://themefisher.com/blog">Forums</a>
                            </li>
                            <li class="mb-3"><a class="text-color"
                                    href="https://docs.themefisher.com/">Documentation</a></li>
                            <li class="mb-3"><a class="text-color" href="#!">Language</a></li>
                            <li class="mb-3"><a class="text-color" href="#!">Release Status</a></li>
                        </ul>
                    </div>
                    <!-- support -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-5 mb-md-0">
                        <h4 class="text-white mb-5">RECOMMEND</h4>
                        <ul class="list-unstyled">
                            <li class="mb-3"><a class="text-color" href="https://themefisher.com/">WordPress</a>
                            </li>
                            <li class="mb-3"><a class="text-color" href="https://themefisher.com/">LearnPress</a>
                            </li>
                            <li class="mb-3"><a class="text-color" href="https://themefisher.com/">WooCommerce</a>
                            </li>
                            <li class="mb-3"><a class="text-color" href="https://themefisher.com/">bbPress</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- copyright -->
        <div class="copyright py-4 bg-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 text-sm-left text-center">
                        <p class="mb-0">Copyright &copy;
                            <script>
                                var CurrentYear = new Date().getFullYear()
                                document.write(CurrentYear)
                            </script>
                            , designed & developed by <a href="https://themefisher.com/"
                                class="text-muted">Themefisher</a>
                        </p>
                    </div>
                    <div class="col-sm-5 text-sm-right text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item"><a class="d-inline-block p-2"
                                    href="https://facebook.com/themefisher/"><i
                                        class="ti-facebook text-primary"></i></a></li>
                            <li class="list-inline-item"><a class="d-inline-block p-2"
                                    href="https://twitter.com/themefisher"><i
                                        class="ti-twitter-alt text-primary"></i></a></li>
                            <li class="list-inline-item"><a class="d-inline-block p-2"
                                    href="https://github.com/themefisher"><i class="ti-github text-primary"></i></a>
                            </li>
                            <li class="list-inline-item"><a class="d-inline-block p-2"
                                    href="https://instagram.com/themefisher/"><i
                                        class="ti-instagram text-primary"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <!-- jQuery -->
    <script src="{{ asset('home/plugins/jQuery/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('home/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <!-- slick slider -->
    <script src="{{ asset('home/plugins/slick/slick.min.js') }}"></script>
    <!-- aos -->
    <script src="{{ asset('home/plugins/aos/aos.js') }}"></script>
    <!-- venobox popup -->
    <script src="{{ asset('home/plugins/venobox/venobox.min.js') }}"></script>
    <!-- filter -->
    <script src="{{ asset('home/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <!-- google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
    <script src="{{ asset('home/plugins/google-map/gmap.js') }}"></script>

    <!-- Main Script -->
    <script src="{{ asset('home/js/script.js') }}"></script>

</body>

</html>
