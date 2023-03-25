@extends('superAdmin.superHomePage')

@section('title', 'Messages')
@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <div class="card">
                        @if (count($data) != 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-3 ">Name</th>
                                        <th scope="col" class="col-3 ">Email</th>
                                        <th scope="col" class="col-3 ">Subject</th>
                                        <th scope="col" class="col ">Message</th>
                                        <th scope="col">
                                            <a href="{{ route('super#deleteAllMessage') }}"><button
                                                    class="btn btn-sm btn-danger" title="Delete All"><i
                                                        class="ti-trash"></i></button></a>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <th scope="row">{{ $item->name }}</th>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ Str::limit($item->message, 15, '...') }}</td>
                                            <td>
                                                <a href="{{ route('super#readMessage', $item->id) }}"><button
                                                        class="btn-sm btn-primary" title="View"><i
                                                            class="ti-eye"></i></button></a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h6 class="text-danger text-center my-3">There is no message yet.</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
