@extends('superAdmin.superHomePage')

@section('title', 'Update Users')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <button class="btn btn-sm btn-primary my-3" onclick="history.back()">Back</button>
            <form action="{{ route('super#updateUser', $data->id) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header text-dark text-center fs-4 my-3">Create User</div>
                    <div class="card-body">
                        <label for="" class="text-dark">Name</label>
                        <input type="text" name="name"
                            class="form-control mb-2 @error('name')
                                                    is-invalid
                                                @enderror"
                            placeholder="Name" value="{{ $data->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror


                        <label for="" class="text-dark">Email</label>
                        <input type="text" name="email"
                            class="form-control mb-2 @error('email')
                                                    is-invalid
                                                @enderror"
                            placeholder="Email" value="{{ $data->email }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror


                        <label for="" class="text-dark">Address</label>
                        <input type="text" name="address"
                            class="form-control mb-2 @error('address')
                                                    is-invalid
                                                @enderror"
                            placeholder="Address" value="{{ $data->address }}">
                        @error('address')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror


                        <label for="" class="text-dark">Phone</label>
                        <input type="number" name="phone"
                            class="form-control mb-2 @error('phone')
                                                    is-invalid
                                                @enderror"
                            placeholder="09xxxxxxxx" value="{{ $data->phone }}">
                        @error('phone')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror


                        <label for="" class="text-dark">NRC Number</label>
                        <input type="text" name="nrcNum"
                            class="form-control mb-2 @error('nrcNum')
                                                    is-invalid
                                                @enderror"
                            placeholder="(In Myanmar)" value="{{ $data->nrc }}">
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
                            <option value="admin" @if ($data->role == 'admin') selected @endif>Teacher</option>
                            <option value="user" @if ($data->role == 'user') selected @endif>Student</option>
                        </select>
                        @error('role')
                            <small class="text-danger">{{ $message }}</small><br>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success  my-3"> Update
                    </button>
                </div>


            </form>
        </div>



    </div>
@endsection
