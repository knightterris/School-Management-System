@extends('student.home')

@section('title', 'Class List Page')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Class List</div>
                <div class="card-body">
                    <div class="row">

                        @foreach ($classList as $cL)
                            <div class="col-4">
                                <div class="card">
                                    <div class="card-header fs-4 text-center text-dark">{{ $cL->class_name }}</div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="text-dark">Studends' ID</label>
                                                <p class="text-dark">{{ $cL->student_id }}</p>

                                            </div>
                                            <div class="col">
                                                <label for="" class="text-dark">Year</label>
                                                <p class="text-dark">{{ $cL->year }}</p>
                                            </div>
                                        </div>
                                        @if ($cL->situation == 0)
                                            <span class="badge badge-success fs-5 mt-3">Free</span>
                                        @endif
                                        @if ($cL->situation == 1)
                                            <span class="badge badge-warning fs-4 mt-3">Lecturing</span>
                                        @endif
                                        @if ($cL->situation == 2)
                                            <span class="badge badge-primary fs-4 mt-3">Break Time</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
