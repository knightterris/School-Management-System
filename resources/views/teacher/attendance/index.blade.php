@extends('teacher.home')

@section('title', 'Student Attendance List Page')
@section('content')
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
                                    <form action="{{ route('teacher#changeAttendance', $sA->id) }}" method="post">
                                        @csrf
                                        <tr>
                                            <th scope="row">{{ $sA->name }}</th>
                                            <td>{{ $sA->email }}</td>
                                            <td>{{ $sA->phone }}</td>
                                            <td>
                                                @if ($sA->attendance == 'present')
                                                    <span class="badge badge-success">PRESENT</span>
                                                @endif

                                                @if ($sA->attendance == 'absent')
                                                    <span class="badge badge-danger">ABSENT</span>
                                                @endif
                                            </td>
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
@endsection
