@extends('teacher.home')

@section('title', 'Customize Project')
@section('content')
    <div class="row">
        <div class="col">

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
            <div class="row mt-5">
                <div class="col p-3">
                    <div class="card">
                        <div class="card-header text-center text-dark fs-4 my-3">Create Project</div>
                        <form action="{{ route('teacher#createProject') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <label for="" class="text-dark mt-2">Project Name</label>
                                <input type="text" name="projectName"
                                    class="form-control mb-2 @error('projectName')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Project Name">
                                @error('projectName')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark mt-2">Group Name</label>
                                <input type="text" name="groupName"
                                    class="form-control mb-2 @error('groupName')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Group Name">
                                @error('groupName')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark mt-2"> Task</label>
                                <input type="text" name="task"
                                    class="form-control mb-2 @error('task')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Task">
                                @error('task')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark mt-2">Number of Group Members(Min:5 &&
                                    Max:10)</label>
                                <input type="number" name="memberCount"
                                    class="form-control mb-2 @error('memberCount')
                                                    is-invalid
                                                @enderror"
                                    placeholder="eg: 5">
                                @error('member_count')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark mt-2">Deadline</label>
                                <input type="text" name="deadLine"
                                    class="form-control mb-2 @error('deadLine')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Exact date and time">
                                @error('deadLine')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary offset-10" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

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
                                        <th><a href="{{ route('teacher#deleteAllProject') }}">
                                                <button class="btn btn-sm btn-danger" title="Delete All"><i
                                                        class="ti-trash"></i></button>
                                            </a></th>
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
                                            <td>

                                                <a href="{{ route('teacher#deleteProject', $d->id) }}">
                                                    <button class="btn btn-sm btn-danger" title="Delete"><i
                                                            class="ti-trash"></i></button>
                                                </a>
                                            </td>
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
