@extends('superAdmin.superHomePage')

@section('title', 'Year List')
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
                <div class="card-header my-2">Create Year</div>
                <div class="card-body">
                    <form action="{{ route('super#createYear') }}" method="post">
                        @csrf
                        <label for="" class="text-dark">Name</label>
                        <input type="text" name="yearName"
                            class="form-control mb-2 @error('yearName')
                                                    is-invalid
                                                @enderror"
                            placeholder="First Year ...">
                        @error('yearName')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <label for="" class="text-dark">Teachers</label>
                        <input type="number" name="teacherCount"
                            class="form-control mb-2 @error('teacherCount')
                                                    is-invalid
                                                @enderror"
                            placeholder="eg.20">
                        @error('teacherCount')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <label for="" class="text-dark">Students</label>
                        <input type="number" name="studentCount"
                            class="form-control mb-2 @error('studentCount')
                                                    is-invalid
                                                @enderror"
                            placeholder="eg.500">
                        @error('studentCount')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <label for="" class="text-dark">Duration</label>
                        <input type="text" name="duration"
                            class="form-control mb-2 @error('duration')
                                                    is-invalid
                                                @enderror"
                            placeholder="1.1.2022 - 1.1.2026">
                        @error('duration')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror

                        <button class="btn btn-success btn-sm offset-10" title="Create Year" type="submit"><i
                                class="fa-solid fa-school-circle-check mr-3"></i>Create </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-6">
            @if (session('deleteSuccess'))
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
                <div class="card-header my-2">Years</div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if (count($data) != 0)
                            <thead>
                                <tr>
                                    <th scope="col">Year</th>
                                    <th scope="col">Teachers</th>
                                    <th scope="col">Students</th>
                                    <th scope="col">Start - End</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->name }}</td>
                                        <td>{{ $d->teacher_count }}</td>
                                        <td>{{ $d->student_count }}</td>
                                        <td>{{ $d->duration }}</td>
                                        <td>
                                            <a href="{{ route('super#deleteYear', $d->id) }}">
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
