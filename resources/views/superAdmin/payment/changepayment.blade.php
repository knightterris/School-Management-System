@extends('superAdmin.superHomePage')

@section('title', 'Payment Change')
@section('content')
    <div class="row">
        <div class="col-10 offset-1">

            <div class="card mt-5">
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


                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    @if ($data->payment == 0)
                                        <span class="badge badge-success">Paid</span>
                                    @endif

                                    @if ($data->payment == 1)
                                        <span class="badge badge-danger">Unpaid</span>
                                    @endif

                                    @if ($data->payment == 2)
                                        <span class="badge badge-primary">Pre-paid</span>
                                    @endif

                                </td>

                                <td>

                                    <form method="post" action="{{ route('super#changePayment', $data->id) }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <select name="payment"
                                                    class="form-control d-flex @error('payment')
                                                    is-invalid
                                                @enderror">
                                                    <option value="">Change</option>
                                                    <option value="0"
                                                        @if ($data->payment == 0) selected @endif>Paid</option>
                                                    <option value="1"
                                                        @if ($data->payment == 1) selected @endif>Unpaid
                                                    </option>
                                                    <option value="2"
                                                        @if ($data->payment == 2) selected @endif>Pre-paid
                                                    </option>
                                                </select>
                                                @error('payment')
                                                    <small class="text-danger">{{ $message }}</small><br>
                                                @enderror
                                            </div>
                                            <button class="btn btn-success btn-sm" type="submit"><i
                                                    class="fa-solid fa-rotate"></i></button>
                                        </div>
                                    </form>
                                </td>

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </div>
@endsection
