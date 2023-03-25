@extends('superAdmin.superHomePage')

@section('title', 'Create Users')
@section('content')
    <div class="row">
        <div class="col-6 ">
            @if (session('createSuccess'))
                <div class="row">
                    <div class="col-5 offset-6 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('createSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('updateSuccess'))
                <div class="row">
                    <div class="col-5 offset-6 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('updateSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <form action="{{ route('super#createUser') }}" method="post">
                @csrf


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header text-dark text-center fs-4 my-3">Create User</div>
                            <div class="card-body">
                                <label for="" class="text-dark">Name</label>
                                <input type="text" name="name"
                                    class="form-control mb-2 @error('name')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror


                                <label for="" class="text-dark">Email</label>
                                <input type="text" name="email"
                                    class="form-control mb-2 @error('email')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Email">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror


                                <label for="" class="text-dark">Address</label>
                                <input type="text" name="address"
                                    class="form-control mb-2 @error('address')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Address">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror


                                <label for="" class="text-dark">Phone</label>
                                <input type="number" name="phone"
                                    class="form-control mb-2 @error('phone')
                                                    is-invalid
                                                @enderror"
                                    placeholder="09xxxxxxxx">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror


                                <label for="" class="text-dark">NRC Number</label>
                                <input type="text" name="nrcNum"
                                    class="form-control mb-2 @error('nrcNum')
                                                    is-invalid
                                                @enderror"
                                    placeholder="(In Myanmar)">
                                @error('nrcNum')
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


                                <label for="" class="text-dark">Role</label>
                                <select name="role"
                                    class="form-control mb-2 @error('role')
                                                    is-invalid
                                                @enderror">
                                    <option value="">Choose Option</option>
                                    <option value="admin">Teacher</option>
                                    <option value="user">Student</option>
                                </select>
                                @error('role')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror


                                <label for="" class="text-dark">Password</label>
                                <input type="password" name="password"
                                    class="form-control mb-2 @error('password')
                                                    is-invalid
                                                @enderror"
                                    id="myInput" placeholder="Password">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                                <input type="checkbox" class="mr-2" onclick="myFunction()">Show Password<br><br>


                                <label for="" class="text-dark">Retype Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control mb-2 @error('password_confirmation')
                                                    is-invalid
                                                @enderror"
                                    id="myInputTwo" placeholder="Password">
                                @error('password_confirmation')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                                <input type="checkbox" class="mr-2" onclick="myFunctionTwo()">Show Password


                            </div>
                            <button type="submit" class="btn btn-success  my-3"><i class="fa fa-plus"></i> Create
                                New</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header my-3">Student List</div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if (count($studentList) != 0)
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">
                                        <a href="">
                                            <button class="btn btn-danger btn-sm" title="Delete All"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentList as $sL)
                                    <tr>
                                        <th scope="row">{{ $sL->name }}</th>
                                        <td>{{ $sL->email }}</td>
                                        <td>{{ $sL->phone }}</td>
                                        <td>{{ Str::limit($sL->address, 15) }}</td>
                                        <td>
                                            <a href="{{ route('super#updateUserPage', $sL->id) }}">
                                                <button class="btn btn-success btn-sm" title="View"><i
                                                        class="ti-eye"></i></button>
                                            </a>
                                            <a href="{{ route('super#deleteUser', $sL->id) }}">
                                                <button class="btn btn-danger btn-sm" title="Delete"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <h6 class="mt-3 text-danger text-center">There is no students.</h6>
                        @endif
                    </table>
                    <div class="my-2">
                        {{ $studentList->links() }}
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header my-3">Teacher List</div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if (count($teacherList) != 0)
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">
                                        <a href="">
                                            <button class="btn btn-danger btn-sm" title="Delete All"><i
                                                    class="fa-solid fa-trash-can"></i></button>
                                        </a>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teacherList as $tL)
                                    <tr>
                                        <th scope="row">{{ $tL->name }}</th>
                                        <td>{{ $tL->email }}</td>
                                        <td>{{ $tL->phone }}</td>
                                        <td>{{ Str::limit($tL->address, 15) }}</td>
                                        <td>
                                            <a href="{{ route('super#updateUserPage', $tL->id) }}">
                                                <button class="btn btn-success btn-sm" title="View"><i
                                                        class="ti-eye"></i></button>
                                            </a>
                                            <a href="{{ route('super#deleteUser', $tL->id) }}">
                                                <button class="btn btn-danger btn-sm" title="Delete"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        @else
                            <h6 class="text-center text-danger">There is no teacher.</h6>
                        @endif
                    </table>
                    <div class="my-2">
                        {{ $teacherList->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
