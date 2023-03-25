@extends('superAdmin.superHomePage')

@section('title', 'Messages')
@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-6 offset-3">
                    <button class="btn btn-sm btn-primary my-3" onclick="history.back()">Back</button>
                    <div class="card">
                        <div class="card-header">Read Message</div>
                        <div class="card-body mt-3">
                            <h4>Name</h4>
                            <p>: :{{ $data->name }}</p><br>

                            <h4>Email</h4>
                            <p>: :{{ $data->email }}</p><br>

                            <h4>Subject</h4>
                            <p>: :{{ $data->subject }}</p><br>

                            <h4>Message</h4>
                            <p>: :{{ $data->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
