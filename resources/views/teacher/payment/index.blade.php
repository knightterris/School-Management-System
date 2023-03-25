@extends('teacher.home')

@section('title', 'Teacher Payment Page')
@section('content')
    <div class="row">
        <div class="col-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header text-dark text-center">Payment</div>
                <div class="card-footer">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->email }}</td>
                                <td>{{ Auth::user()->phone }}</td>
                                <td>
                                    @if (Auth::user()->payment == 0)
                                        <span class="badge badge-success fs-4">PAID</span>
                                    @endif
                                    @if (Auth::user()->payment == 1)
                                        <span class="badge badge-danger fs-4">UNPAID</span>
                                    @endif
                                    @if (Auth::user()->payment == 2)
                                        <span class="badge badge-primary fs-4">PRE-PAID</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
