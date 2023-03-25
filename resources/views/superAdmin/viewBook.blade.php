@extends('superAdmin.superHomePage')

@section('title', 'Read Book')
@section('content')
    <div class="row mt-4">
        <div class="col-6 offset-3">

            <button class="btn-sm btn btn-primary my-3" onclick="history.back()">Back</button>

            <div class="card">
                <div class="card-header text-center">{{ $book->name }}</div>
                <div class="card-body">
                    <iframe src="{{ asset('storage/books/' . $book->book) }}" frameborder="0" width="600"
                        height="700"></iframe>
                </div>
            </div>

        </div>
    </div>
@endsection
