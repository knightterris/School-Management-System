@extends('teacher.home')

@section('title', 'Book List Page')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Book List</div>
                <div class="card-body">
                    <div class="row">

                        @if (count($data) != 0)
                            @foreach ($data as $d)
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-header fs-4 text-center text-dark">{{ $d->name }}</div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col">
                                                    {{-- <label for="" class="text-dark">Authur Name</label> --}}
                                                    <h6>Authur Name</h6>
                                                    <p class="text-dark">{{ $d->authur }}</p>

                                                </div>
                                                <div class="col">
                                                    {{-- <label for="" class="text-dark">Genre</label> --}}
                                                    <h6>Genre</h6>
                                                    <p class="text-dark">{{ $d->categoryName }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('teacher#readBook', $d->id) }}">
                                                <button class="btn btn-primary btn-sm offset-9"><i
                                                        class="ti-eye mr-2"></i>Read</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h6 class="text-center text-danger my-3">There is no book.</h6>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
