@extends('teacher.home')

@section('title', 'Teacher Profile Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">

            <button class="btn-sm btn btn-primary my-3" onclick="history.back()">Back</button>

            @if (session('changedPassword'))
                <div class="row">
                    <div class="col-6 offset-6 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('changedPassword') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="card">
                <div class="card-header text-center">Profile</div>
                <div class="card-body">
                    @if (Auth::user()->image == null)
                        <img src="{{ asset('teacher/default.png') }}" class="offset-3 mt-3 shadow rounded"
                            style="width:300px; height:300px;">
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="offset-3 mt-3 shadow rounded"
                            style="width:300px; height:300px;">
                    @endif
                    <hr>
                    <div class="card-footer">
                        <label for="">Name</label>
                        <span class="offset-6">{{ Auth::user()->name }}</span><br>
                        <label for="">Email</label>
                        <span class="offset-6">{{ Auth::user()->email }}</span><br>
                        <label for="">Phone</label>
                        <span class="offset-6">{{ Auth::user()->phone }}</span><br>
                        <label for="">NRC</label>
                        <span class="offset-6">{{ Auth::user()->nrc }}</span><br>
                        <label for="">Address</label>
                        <span class="offset-6">{{ Auth::user()->address }}</span><br>
                        <label for="">Role</label>
                        <span class="offset-6">{{ Auth::user()->role }}</span>
                    </div>
                    <a href="{{ route('teacher#updateProfilePage') }}"><button
                            class="btn btn-sm btn-primary my-3 offset-9">Edit
                            Profile</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
