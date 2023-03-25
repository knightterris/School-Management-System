@extends('superAdmin.superHomePage')

@section('title', 'Attendance List')
@section('content')
    <div class="row">
        <div class="col">

            @if (session('updateSuccess'))
                <div class="row">
                    <div class="col ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('updateSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">All Attendance</div>
                        <div class="card-body">
                            @if (count($allAttendance) != 0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allAttendance as $item)
                                            <tr>
                                                <th scope="row">{{ $item->name }}</th>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone }}</td>
                                                <td>{{ $item->role }}</td>

                                                <td>
                                                    @if ($item->attendance == 'present')
                                                        <span class="badge badge-success">PRESENT</span>
                                                    @endif

                                                    @if ($item->attendance == 'absent')
                                                        <span class="badge badge-danger">ABSENT</span>
                                                    @endif
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h6 class="text-center text-danger my-3">There is no data.</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Teachers' Attendance</div>
                        <div class="card-body">
                            @if (count($teacherAttendance) != 0)
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Attendance</th>
                                            <th scope="col">Change Attendance</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teacherAttendance as $tA)
                                            <form action="{{ route('super#changeAttendance', $tA->id) }}" method="post">
                                                @csrf
                                                <tr>
                                                    <th scope="row">{{ $tA->name }}</th>
                                                    <td>{{ $tA->email }}</td>
                                                    <td>{{ $tA->phone }}</td>
                                                    <td>{{ $tA->attendance }}</td>
                                                    <td>
                                                        <select name="attendance" class="form-control">
                                                            <option value="">Choose Option</option>
                                                            <option value="present"
                                                                @if ($tA->attendance == 'present') selected @endif>Present
                                                            </option>
                                                            <option value="absent"
                                                                @if ($tA->attendance == 'absent') selected @endif>Absent
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success" type="submit" title="Change"><i
                                                                class="fa-solid fa-arrow-right-arrow-left"></i></button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h6 class="text-danger text-center my-3">There is no data.</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">Students' Attendance</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                @if (count($studentAttendance) != 0)
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Attendance</th>
                                            <th scope="col">Change Attendance</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($studentAttendance as $sA)
                                            <form action="{{ route('super#changeAttendance', $sA->id) }}" method="post">
                                                @csrf
                                                <tr>
                                                    <th scope="row">{{ $sA->name }}</th>
                                                    <td>{{ $sA->email }}</td>
                                                    <td>{{ $sA->phone }}</td>
                                                    <td>{{ $sA->attendance }}</td>
                                                    <td>
                                                        <select name="attendance" class="form-control">
                                                            <option value="">Choose Option</option>
                                                            <option value="present"
                                                                @if ($sA->attendance == 'present') selected @endif>Present
                                                            </option>
                                                            <option value="absent"
                                                                @if ($sA->attendance == 'absent') selected @endif>Absent
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-success" type="submit" title="Change"><i
                                                                class="fa-solid fa-arrow-right-arrow-left"></i></button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                @else
                                    <h6 class="text-danger text-center my-3">There is no data.</h6>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
