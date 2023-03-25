@extends('superAdmin.superHomePage')

@section('title', 'Pending Users')
@section('content')
    <div class="row">
        <div class="col-10 offset-1">

            <div class="card">
                <div class="card-header text-center">Pending Users</div>
                <div class="card-body">
                    <table class="table table-hover">
                        @if (count($userList) != 0)
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userList as $uL)
                                    <form action="{{ route('super#changeStatus', $uL->id) }}" method="post">
                                        @csrf
                                        <tr>
                                            <th scope="row">{{ $uL->name }}</th>
                                            <td>{{ $uL->email }}</td>
                                            <td>{{ $uL->phone }}</td>
                                            <td>{{ $uL->role }}</td>
                                            <td>
                                                <select name="status"
                                                    class="form-control @error('status')
                                                    is-invalid
                                                @enderror">
                                                    <option value="">Status</option>
                                                    <option value="0"
                                                        @if ($uL->status == 0) selected @endif>Pending</option>
                                                    <option value="1"
                                                        @if ($uL->status == 1) selected @endif>Success</option>
                                                    <option value="2"
                                                        @if ($uL->status == 2) selected @endif>Reject</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small><br>
                                                @enderror
                                            </td>
                                            <td>{{ Str::limit($uL->address, 15) }}</td>
                                            <td>
                                                <button type="submit" class="btn btn-success btn-sm"
                                                    title="Change Status"><i
                                                        class="fa-solid fa-arrow-right-arrow-left"></i></button>
                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        @else
                            <h6 class="mt-3 text-danger text-center">There is no pending users.</h6>
                        @endif
                    </table>
                    <div class="my-2">
                        {{ $userList->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
