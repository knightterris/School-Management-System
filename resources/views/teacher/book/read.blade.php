@extends('teacher.home')

@section('title', 'Read Book')
@section('content')
    <div class="row mt-4">
        <div class="col">

            <button class="btn-sm btn btn-primary my-3" onclick="history.back()">Back</button>

            <div class="card">
                <div class="card-header text-center fs-4 text-dark">{{ $book->name }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="text-center">
                            <iframe src="{{ asset('storage/books/' . $book->book) }}" frameborder="0" width="600"
                                height="700"></iframe>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
