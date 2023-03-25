<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    @if (url()->current() == route('student#homePage'))
        <title>-K- School: Student Dashboard</title>
    @else
        <title>@yield('title')</title>
    @endif
    <!-- ================= Favicon ================== -->
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="{{ asset('student/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('student/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('student/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('student/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('student/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="{{ route('student#homePage') }}">
                            <img src="{{ asset('student/images/logo.png') }}" alt="" /><span>Focus</span>
                        </a></div>
                    <li class="label">Main</li>
                    <li><a class="{{ route('student#homePage') }}"><i class="ti-home"></i> Dashboard
                        </a>

                    </li>
                    <li><a href="{{ route('student#profilePage') }}"><i class="ti-user"></i> Profile</a></li>
                    <li><a href="{{ route('student#changePasswordPage') }}"><i class="ti-key"></i> Password</a></li>
                    <li class="label">Apps</li>
                    <li><a href="{{ route('student#classListPage') }}"><i class="ti-layout-media-center"></i> Class</a>
                    </li>
                    <li><a href="{{ route('student#timetableListPage') }}"><i class="ti-calendar"></i> Timetable</a>
                    </li>

                    <li><a href="{{ route('student#projectListPage') }}"><i class="ti-layout"></i> Class Projects</a>
                    </li>
                    <li><a href="{{ route('student#bookListPage') }}" title="Create Books"><i class="ti-book"></i>
                            Books </a></li>

                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">{{ Auth::user()->name }}

                                </span>
                            </div>
                            <div class="float-right">
                                <div class="header-icon">

                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="btn-dark rounded-circle" type="submit" title="Logout"><i
                                                class="fa-solid fa-arrow-right-from-bracket"></i></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                @if (url()->current() == route('student#homePage'))
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Hello, <span>Welcome Here</span></h1>
                                </div>
                            </div>
                        </div>

                    </div>

                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="ti-layout-grid2 color-pink border-pink"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Class Projects</div>
                                            <div class="stat-digit">{{ count($projectList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-book color-danger border-danger"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Books</div>
                                            <div class="stat-digit"> {{ count($bookList) }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-book color-danger border-dark"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Classes</div>
                                            <div class="stat-digit"> {{ count($classList) }} </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                @else
                    <section id="main-content">
                        @yield('content')
                    </section>
                @endif

            </div>

        </div>
    </div>
    </div>

    <!-- jquery vendor -->
    <script src="{{ asset('student/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('student/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('student/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('student/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('student/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ asset('student/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/calendar-2/pignose.init.js') }}"></script>


    <script src="{{ asset('student/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ asset('student/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('student/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('student/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('student/js/dashboard2.js') }}"></script>
    {{-- datable --}}
    <script src="{{ asset('student/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('student/js/lib/data-table/datatables-init.js') }}"></script>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>
