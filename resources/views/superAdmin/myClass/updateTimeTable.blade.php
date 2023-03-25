@extends('superAdmin.superHomePage')

@section('title', 'Customize TimeTable')
@section('content')
    <div class="row">
        <div class="col ">

            @if (session('createSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('createSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('deleteSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('deleteAllSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteAllSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('updateSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif


            <div class="row ">
                <div class="col-6 offset-3 mt-5">
                    <div class="card">
                        <div class="card-header text-center fs-4 my-3">Edit Time Table</div>
                        <form action="{{ route('super#updateTimeTable', $data->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="text-dark">Day</label>
                                        <input type="text" name="day"
                                            class="form-control mb-2 @error('day')
                                                    is-invalid
                                                @enderror"
                                            placeholder="Enter Day" value="{{ $data->day }}">
                                        @error('day')
                                            <small class="text-danger">{{ $message }}</small><br>
                                        @enderror

                                        <label for="" class="text-dark">Teacher</label>
                                        <input type="text" name="teacher"
                                            class="form-control mb-2 @error('teacher')
                                                    is-invalid
                                                @enderror"
                                            placeholder="Enter Teacher's name" value="{{ $data->teacher }}">
                                        @error('teacher')
                                            <small class="text-danger">{{ $message }}</small><br>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <label for="" class="text-dark">Class</label>
                                        <input type="text" name="className"
                                            class="form-control mb-2 @error('className')
                                                    is-invalid
                                                @enderror"
                                            placeholder="Class Name" value="{{ $data->class }}">
                                        @error('className')
                                            <small class="text-danger">{{ $message }}</small><br>
                                        @enderror

                                        <label for="" class="text-dark">Duration</label>
                                        <input type="text" name="duration"
                                            class="form-control mb-2 @error('duration')
                                                    is-invalid
                                                @enderror"
                                            placeholder="eg. 11a.m - 1p.m (or) 11a.m to 1p.m" value="{{ $data->time }}">
                                        @error('duration')
                                            <small class="text-danger">{{ $message }}</small><br>
                                        @enderror

                                        <label for="" class="text-dark">Year</label>
                                <select name="year"
                                    class="form-control mb-2 @error('year')
                                                    is-invalid
                                                @enderror">
                                    <option value="">Choose Option</option>
                                    @foreach ($yearList as $yL)
                                        <option value="{{ $yL->name }}">{{ $yL->name }}</option>
                                    @endforeach
                                </select>
                                @error('year')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success offset-8" type="submit">Update Time Table</button>
                        </form>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
