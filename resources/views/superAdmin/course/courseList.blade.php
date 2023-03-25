@extends('superAdmin.superHomePage')

@section('title', 'Course List')
@section('content')
    <div class="row">
        <div class="col-6">
            @if (session('createSuccess'))
                <div class="row">
                    <div class="col-6">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('createSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header my-2">Create Course</div>
                <div class="card-body">
                    <form action="{{ route('super#createCourse') }}" method="post">
                        @csrf
                        <label for="" class="text-dark">Name</label>
                        <input type="text" name="courseName"
                            class="form-control mb-2 @error('courseName')
                                                    is-invalid
                                                @enderror"
                            placeholder="Eg.Bussiness Management">
                        @error('courseName')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <label for="" class="text-dark">Teacher</label>
                        <input type="text" name="teacher"
                            class="form-control mb-2 @error('teacher')
                                                    is-invalid
                                                @enderror"
                            placeholder="John Doe">
                        @error('teacher')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <label for="" class="text-dark">Duration</label>
                        <input type="text" name="duration"
                            class="form-control mb-2 @error('duration')
                                                    is-invalid
                                                @enderror"
                            placeholder="eg. July to September">
                        @error('duration')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <button class="btn btn-success btn-sm offset-10" title="Create Course" type="submit">Create
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            @if (session('deleteSuccess'))
                <div class="row">
                    <div class="col-6">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            <div class="card">
                <div class="card-header my-2">Years</div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if (count($data) != 0)
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Start - End</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->teacher }}</td>
                                        <td>{{ $d->duration }}</td>
                                        <td>
                                            <a href="{{ route('super#deleteCourse', $d->id) }}">
                                                <button class="btn btn-danger btn-sm" title="Delete"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <h6 class="text-center mt-3 text-danger">There is no data.</h6>
                        @endif
                    </table>

                    <div class="mt-3">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
