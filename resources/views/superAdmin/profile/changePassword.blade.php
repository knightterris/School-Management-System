@extends('superAdmin.superHomePage')

@section('title', 'SuperAdmin Password Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">

            <button class="btn-sm btn btn-primary my-3" onclick="history.back()">Back</button>

            @if (session('failPassword'))
                <div class="row">
                    <div class="col-8 offset-4 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('failPassword') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header text-center">Change Password</div>
                <div class="card-body">

                    <form action="{{ route('super#changePassword') }}" method="post">
                        @csrf
                        <div class="card-footer">
                            <label for="" class="text-dark">Old Password</label>
                            <input
                                class="form-control mb-2 border border-dark @error('oldPassword') is-invalid
                                                @enderror"
                                type="password" name="oldPassword">
                            @error('oldPassword')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror


                            <label for="" class="text-dark">New Password</label>
                            <input
                                class="form-control mb-2 border border-dark  @error('newPassword') is-invalid
                                                @enderror"
                                type="password" name="newPassword">

                            @error('newPassword')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror

                            <label for="" class="text-dark">Confirm New Password</label>
                            <input
                                class="form-control mb-2 border border-dark  @error('confirmPassword') is-invalid
                                                @enderror"
                                type="password" name="confirmPassword">

                            @error('confirmPassword')
                                <small class="text-danger">{{ $message }}</small><br>
                            @enderror
                            <button type="submit"
                                class="offset-10 btn btn-sm btn-primary mt-3 border border-dark">Change</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
