@extends('student.home')

@section('title', ' TimeTable')
@section('content')
    <div class="row">
        <div class="col ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="bootstrap-data-table-panel">
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    @if (count($data) != 0)
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Teacher</th>
                                                <th>Class</th>
                                                <th>Year</th>
                                                <th>Time</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $d->day }}</td>
                                                    <td>{{ $d->teacher }}</td>
                                                    <td>{{ $d->class }}</td>
                                                    <td>{{ $d->year }}</td>
                                                    <td>{{ $d->time }}</td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    @else
                                        <h6 class="text-center text-danger mt-3">No Timetables to show</h6>
                                    @endif
                                </table>
                                <div class="mt-3">
                                    {{-- {{ $data->links() }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>

        </div>
    </div>
@endsection
