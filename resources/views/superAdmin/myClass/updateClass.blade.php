@extends('superAdmin.superHomePage')

@section('title', 'Customize Classes')
@section('content')
    <div class="row">
        <div class="col ">

            <div class="row ">
                <div class="col-6 offset-3">
                    <div class="card">
                        <div class="card-header text-center fs-4 my-3">Update Class</div>
                        <form action="{{ route('super#updateClass', $data->id) }}" method="post">
                            @csrf
                            <div class="card-body">
                                <label for="" class="text-dark">Class</label>
                                <input type="text" name="className"
                                    class="form-control mb-2 @error('className')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Class Name" value="{{ $data->class_name }}">
                                @error('className')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark">Students IDs</label>
                                <input type="text" name="studentID"
                                    class="form-control mb-2 @error('studentID')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Class Name" value="{{ $data->student_id }}">
                                @error('studentID')
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

                                <label for="" class="text-dark">Status</label>
                                <select name="status" id=""
                                    class="form-control @error('status')
                                                    is-invalid
                                                @enderror">
                                    <option value="">Choose Status</option>
                                    <option value="0" @if ($data->status == 0) selected @endif>Occupied
                                    </option>
                                    <option value="1" @if ($data->status == 1) selected @endif>Available
                                    </option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                            </div>
                            <button class="btn btn-success offset-8 mt-3" type="submit">Update Class</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    @endsection
