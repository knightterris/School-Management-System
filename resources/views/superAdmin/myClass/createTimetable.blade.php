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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header text-center fs-4 my-3">Create Time Table</div>
                        <form action="{{ route('super#createTimeTable') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="text-dark">Day</label>
                                        <input type="text" name="day"
                                            class="form-control mb-2 @error('day')
                                                    is-invalid
                                                @enderror"
                                            placeholder="Enter Day">
                                        @error('day')
                                            <small class="text-danger">{{ $message }}</small><br>
                                        @enderror

                                        <label for="" class="text-dark">Teacher</label>
                                        <input type="text" name="teacher"
                                            class="form-control mb-2 @error('teacher')
                                                    is-invalid
                                                @enderror"
                                            placeholder="Enter Teacher's name">
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
                                            placeholder="Class Name">
                                        @error('className')
                                            <small class="text-danger">{{ $message }}</small><br>
                                        @enderror

                                        <label for="" class="text-dark">Duration</label>
                                        <input type="text" name="duration"
                                            class="form-control mb-2 @error('duration')
                                                    is-invalid
                                                @enderror"
                                            placeholder="eg. 11a.m - 1p.m (or) 11a.m to 1p.m">
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
                            <button class="btn btn-success offset-10" type="submit">Create Time Table</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    @if (count($data) != 0)
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Teacher</th>
                                                <th>Class</th>
                                                <th>Year</th>
                                                <th>Time</th>
                                                <th><a href="{{ route('super#deleteAllTimeTable') }}">
                                                        <button class="btn btn-sm btn-danger" title="Delete"><i
                                                                class="ti-trash"></i></button>
                                                    </a></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $d->day }}</td>
                                                    <td>{{ $d->teacher }}</td>
                                                    <td>{{ $d->class }}</td>
                                                    <td>{{ $d->year }}</td>
                                                    <td>{{ $d->time }}</td>
                                                    <td>
                                                        <a href="{{ route('super#updateTimetablePage', $d->id) }}">
                                                            <button class="btn btn-sm btn-success" title="Edit"><i
                                                                    class="ti-pencil-alt"></i></button>
                                                        </a>
                                                        <a href="{{ route('super#deleteTimetable', $d->id) }}">
                                                            <button class="btn btn-sm btn-danger" title="Delete"><i
                                                                    class="ti-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    @else
                                        <h6 class="text-center text-danger mt-3">No Timetables to show</h6>
                                    @endif
                                </table>
                                <div class="mt-3">
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>

        </div>
    </div>
@endsection
