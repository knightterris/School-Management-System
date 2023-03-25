@extends('welcome')
@section('content')
    <!-- about -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img class="img-fluid w-100 mb-4 mt-5" src="{{ asset('home/images/about/about-page.jpg') }}"
                        alt="about image">
                    <h2 class="section-title">ABOUT OUR JOURNY</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et.dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet
                        consectetur,
                        adipisicing elit. Saepe ipsa illo quod veritatis, magni debitis fugiat dolore voluptates!
                        Consequatur,
                        aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat perferendis sint
                        optio
                        similique.
                        Et amet magni facilis vero corporis quos.</p>
                    <p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum, dolor sit amet
                        consectetur
                        adipisicing elit. Ipsum a, facere fugit error accusamus est officiis vero in, nostrum laboriosam
                        corrupti
                        explicabo, cumque repudiandae deleniti perspiciatis quae consectetur enim. Laboriosam!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /about -->

    <!-- funfacts -->
    <section class="section-sm bg-primary">
        <div class="container">
            <div class="row">
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="{{ count($teacher) }}">0</h2>
                        <h5 class="text-white">TEACHERS</h5>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="{{ count($courseList) }}">0</h2>
                        <h5 class="text-white">COURSES</h5>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="{{ count($student) }}">0</h2>
                        <h5 class="text-white">STUDENTS</h5>
                    </div>
                </div>
                <!-- funfacts item -->
                <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
                    <div class="text-center">
                        <h2 class="count text-white" data-count="{{ count($student) }}">0</h2>
                        <h5 class="text-white">SATISFIED CLIENT</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /funfacts -->


    <!-- teachers -->
    @if (count($teacher) != 0)
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 class="section-title">Our Teachers</h2>
                    </div>
                    <!-- teacher -->
                    @foreach ($teacher as $t)
                        <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                            <div class="card border-0 rounded-0 hover-shadow">
                                {{-- <img class="card-img-top rounded-0" src="{{ asset('home/images/teachers/teacher-1.jpg') }}"
                            alt="teacher"> --}}
                                @if ($t->image == null)
                                    <img src="{{ asset('teacher/default.png') }}" class="card-img-top shadow rounded">
                                @else
                                    <img src="{{ asset('storage/' . $t->image) }}" class="card-img-top shadow rounded">
                                @endif
                                <div class="card-body">
                                    <a href="">
                                        <h4 class="card-title">{{ $t->name }}</h4>
                                    </a>
                                    <div class="d-flex justify-content-between">
                                        <span>Teacher</span>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a class="text-color"
                                                    href="https://facebook.com/themefisher"><i class="ti-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a class="text-color"
                                                    href="https://twitter.com/themefisher"><i
                                                        class="ti-twitter-alt"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a class="text-color"
                                                    href="https://github.com/themefisher"><i class="ti-google"></i></a></li>
                                            <li class="list-inline-item"><a class="text-color"
                                                    href="https://instagram.com/themefisher/"><i
                                                        class="ti-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @else
    @endif
    <!-- /teachers -->
@endsection
