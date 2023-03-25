@extends('teacher.home')

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
                                    <div class="card-footer">
                                        <form action="{{ route('teacher#changeSituation', $cL->id) }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-8">
                                                    <select name="classSituation"
                                                        class="form-control @error('classSituation')
                                                    is-invalid
                                                @enderror">
                                                        <option value="">Change Status</option>
                                                        <option value="0"
                                                            @if ($cL->situation == 0) selected @endif>Free</option>
                                                        <option value="1"
                                                            @if ($cL->situation == 1) selected @endif>Lecturing
                                                        </option>
                                                        <option value="2"
                                                            @if ($cL->situation == 2) selected @endif>Break Time
                                                        </option>
                                                    </select>
                                                    @error('classSituation')
                                                        <small class="text-danger">{{ $message }}</small><br>
                                                    @enderror

                                                </div>
                                                <div class="col">
                                                    <button class="btn btn-success btn-sm" type="submit" title="Change"><i
                                                            class="fa-solid fa-rotate "></i></button>
                                                </div>
                                            </div>
                                        </form>
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
