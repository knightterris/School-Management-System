@extends('student.home')

@section('title', 'Project List')
@section('content')
    <div class="row">
        <div class="col">


            <div class="row">
                <div class="col p-3">
                    <div class="card shadow">
                        <table>
                            @if (count($data) != 0)
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Group name</th>
                                        <th>Members</th>
                                        <th>Task</th>
                                        <th>Deadline</th>

                                    </tr>

                                </thead>

                                <tbody>

                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->project_name }}</td>
                                            <td>{{ $d->group_name }}</td>
                                            <td>{{ $d->group_member }}</td>
                                            <td>{{ $d->task }}</td>
                                            <td>{{ $d->deadline }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            @else
                                <h6 class="text-danger text-center my-3">There is no project yet.</h6>
                            @endif
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
