<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>
        @if (url()->current() == route('super#homePage'))
            -K- School: Super Admin Dashboard
        @else
            @yield('title')
        @endif
    </title>
    <!-- ================= Favicon ================== -->
    {{-- bootstrap table --}}


    <!-- Standard -->
    {{-- <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff"> --}}
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('admin/css/lib/calendar2/pignose.calendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/chartist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/css/lib/menubar/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/lib/data-table/buttons.bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="">
                            <img src="{{ asset('admin/images/logo.png') }}" alt="" /><span>Focus</span>
                        </a></div>
                    <li class="label">Main</li>

                    <li><a href="{{ route('super#homePage') }}" title="Dashboard"><i class="ti-home"></i>Dashboard</a>
                    </li>
                    <li><a href="{{ route('super#profilePage') }}" title="Profile"><i class="ti-user"></i>Profle</a>
                    </li>
                    <li><a href="{{ route('super#passwordPage') }}" title="Change Password"><i
                                class="ti-key"></i>Change Password</a></li>

                    <li class="label">Apps</li>
                    <li><a href="{{ route('super#createUserPage') }}" title="Create Users"><i
                                class="ti-user"></i>User</a></li>
                    <li><a href="{{ route('super#createBookPage') }}" title="Create Books"><i class="ti-book"></i>
                            Create Books </a></li>
                    <li><a href="{{ route('super#yearListPage') }}" title="Year"><i
                                class="fa-solid fa-graduation-cap"></i>Year</a>
                    </li>
                    <li><a href="{{ route('super#createClassPage') }}" title="Class"><i
                                class="fa-solid fa-chalkboard"></i>Class</a>
                    </li>
                    <li><a href="{{ route('super#attendanceList') }}" title="Attendance"><i
                                class="fa-solid fa-clipboard"></i>Attendance</a></li>
                    <li><a href="{{ route('super#timeTablePage') }}" title="Timetable"><i class="ti-calendar"></i> Time
                            Table</a></li>
                    <li><a href="{{ route('super#listPage') }}" title="Pending Users"><i
                                class="fa-solid fa-spinner"></i>Pending Users</a>
                    </li>
                    <li><a href="{{ route('super#paymentListPage') }}" title="Payment"><i
                                class="fa-solid fa-money-bill-wave"></i>Payment</a></li>

                    <li><a href="{{ route('super#projectPage') }}" title="Projects"><i
                                class="fa-solid fa-diagram-project"></i>Projects</a></li>

                    <li><a href="{{ route('super#courseListPage') }}" title="Course"><i
                                class="fa-solid fa-layer-group"></i>Course</a>
                    </li>
                    <li><a href="{{ route('super#messageList') }}" title="Messages"><i class="ti-email"></i>Message</a>
                    </li>

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


    @if (url()->current() == route('super#homePage'))
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Hello, <span>Welcome Here</span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->

                        <!-- /# column -->
                    </div>
                    <!-- /# row -->


                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="ti-user color-success border-success"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Teachers</div>
                                            <div class="stat-digit">{{ count($teacherList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="ti-user color-primary border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Students</div>
                                            <div class="stat-digit">{{ count($studentList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="ti-layout-grid2 color-pink border-pink"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Projects</div>
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
                                            <div class="stat-text">Library</div>
                                            <div class="stat-digit">{{ count($bookList) }} Books</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="ti-home color-warning border-warning"></i>
                                        </div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Classes</div>
                                            <div class="stat-digit">{{ count($classList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-info border-info"></i>
                                        </div>
                                        <div class="stat-content dib">

                                            <div class="stat-text">Pending Users</div>

                                            <div class="stat-digit">{{ count($pendingList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib">
                                            <i class="fa-solid fa-graduation-cap border-dark color-dark"></i>
                                        </div>
                                        <div class="stat-content dib">

                                            <div class="stat-text">Years</div>

                                            <div class="stat-digit">{{ count($yearList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i
                                                class="fa-solid fa-layer-group border-primary"></i>
                                        </div>
                                        <div class="stat-content dib">

                                            <div class="stat-text">Courses</div>

                                            <div class="stat-digit">{{ count($courseList) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <!-- /# column -->
                </div>
                <!-- /# row -->
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three home-widget-three">
                                <div class="stat-icon bg-facebook">
                                    <i class="ti-facebook"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-digit">8,268</div>
                                    <div class="stat-text">Likes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three home-widget-three">
                                <div class="stat-icon bg-youtube">
                                    <i class="ti-youtube"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-digit">12,545</div>
                                    <div class="stat-text">Subscribes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three home-widget-three">
                                <div class="stat-icon bg-twitter">
                                    <i class="ti-twitter"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-digit">7,982</div>
                                    <div class="stat-text">Tweets</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card p-0">
                            <div class="stat-widget-three home-widget-three">
                                <div class="stat-icon bg-danger">
                                    <i class="ti-linkedin"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="stat-digit">9,658</div>
                                    <div class="stat-text">Followers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        </div>

        </div>



        <!-- /# row -->




        </section>
        </div>
        </div>
        </div>
    @else
        <div class="content-wrap">
            <div class="main">
                @yield('content')
            </div>
        </div>
    @endif
    <!-- jquery vendor -->
    <script src="{{ asset('admin/js/lib/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/jquery.nanoscroller.min.js') }}"></script>
    <!-- nano scroller -->
    <script src="{{ asset('admin/js/lib/menubar/sidebar.js') }}"></script>
    <script src="{{ asset('admin/js/lib/preloader/pace.min.js') }}"></script>
    <!-- sidebar -->

    <script src="{{ asset('admin/js/lib/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <!-- bootstrap -->

    <script src="{{ asset('admin/js/lib/calendar-2/moment.latest.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/calendar-2/pignose.calendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/calendar-2/pignose.init.js') }}"></script>



    <script src="{{ asset('admin/js/lib/weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/weather/weather-init.js') }}"></script>
    <script src="{{ asset('admin/js/lib/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/circle-progress/circle-progress-init.js') }}"></script>
    <script src="{{ asset('admin/js/lib/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/sparklinechart/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/sparklinechart/sparkline.init.js') }}"></script>
    <script src="{{ asset('admin/js/lib/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin/js/lib/owl-carousel/owl.carousel-init.js') }}"></script>
    <!-- scripit init-->
    <script src="{{ asset('admin/js/dashboard2.js') }}"></script>
</body>

{{-- datable --}}
<script src="{{ asset('admin/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/js/lib/data-table/datatables-init.js') }}"></script>

</html>
