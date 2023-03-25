@extends('superAdmin.superHomePage')

@section('title', 'Payment List')
@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    Payment
                </div>
                <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Role</th>

                                <th scope="col">Payment</th>

                                <th scope="col">Change Payment</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($data as $eD)
                                <tr>
                                    <td>{{ $eD->name }}</td>
                                    <td>{{ $eD->role }}</td>
                                    <td>
                                        @if ($eD->payment == 0)
                                            <span class="badge badge-success">Paid</span>
                                        @endif

                                        @if ($eD->payment == 1)
                                            <span class="badge badge-danger">Unpaid</span>
                                        @endif

                                        @if ($eD->payment == 2)
                                            <span class="badge badge-primary">Pre-paid</span>
                                        @endif

                                    </td>

                                    <td>
                                        <a href="{{ route('super#changePaymentPage', $eD->id) }}">
                                            <button class="btn btn-success btn-sm" title="Go To Change Payment"><i
                                                    class="fa-solid fa-rotate"></i></button>
                                        </a>

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>
@endsection
