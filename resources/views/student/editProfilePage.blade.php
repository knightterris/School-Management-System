@extends('student.home')

@section('title', 'Student Profile Update Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">

            <button class="btn-sm btn btn-primary my-3" onclick="history.back()">Back</button>

            <div class="card">
                <div class="card-header text-center">Profile</div>
                <div class="card-body">
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('student/default.png') }}" class="offset-3 mt-3 shadow rounded"
                            style="width:300px; height:300px;">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="offset-3 mt-3 shadow rounded"
                            style="width:300px; height:300px;">
                    @endif
                    <hr>
                    <form action="{{ route('student#updateProfile', Auth::user()->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-footer">
                            <label for="">Name</label>
                            <input
                                class="form-control mb-2  @error('name') is-invalid
                                                @enderror"
                                type="text" name="name" value="{{ Auth::user()->name }}">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="">Email</label>
                            <input
                                class="form-control mb-2  @error('email')
                                                    is-invalid
                                                @enderror"
                                type="text" name="email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="">Photo</label>
                            <input
                                class="form-control mb-2  @error('image')
                                                    is-invalid
                                                @enderror"
                                type="file" name="image">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="">Phone</label>
                            <input
                                class="form-control mb-2  @error('phone')
                                                    is-invalid
                                                @enderror"
                                type="number" name="phone" value="{{ Auth::user()->phone }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="">NRC</label>
                            <input
                                class="form-control mb-2  @error('nrc')
                                                    is-invalid
                                                @enderror"
                                type="text" name="nrc" value="{{ Auth::user()->nrc }}">
                            @error('nrc')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="">Address</label>
                            <input
                                class="form-control mb-2  @error('address')
                                                    is-invalid
                                                @enderror"
                                type="text" name="address" value="{{ Auth::user()->address }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="">Role</label>
                            <input class="form-control" type="text" name="role" value="{{ Auth::user()->role }}"
                                disabled>
                        </div>
                        <button type="submit" class="offset-10 btn btn-sm btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
