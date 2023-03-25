@extends('superAdmin.superHomePage')

@section('title', 'Customize Classes')
@section('content')
    <div class="row">
        <div class="col ">

            @if (session('createSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('createSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('deleteSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('deleteAllClasses'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteAllClasses') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('updateSuccess'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('updateSuccess') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('deleteBook'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteBook') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('deleteAllBook'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteAllBook') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif


            <div class="row ">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center fs-4 my-3">Create Class</div>
                        <form action="{{ route('super#createClass') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <label for="" class="text-dark">Class</label>
                                <input type="text" name="className"
                                    class="form-control mb-2 @error('className')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Class Name">
                                @error('className')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark">Student ID</label>
                                <input type="text" name="studentID"
                                    class="form-control mb-2 @error('studentID')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Students' IDs (eg. 1-25)">
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

                            </div>
                            <button class="btn btn-success offset-8" type="submit">Create Class</button>
                        </form>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center my-3">Class List</div>
                        <div class="card-body">
                            <table class="table ">
                                @if (count($classList) == 0)
                                    <h6 class="text-center text-danger mt-3">There is no class.</h6>
                                @else
                                    <thead>
                                        <tr>
                                            <th class=" ">Class Name</th>
                                            <th>Student ID</th>
                                            <th>Class</th>
                                            <th>Class Situation</th>
                                            <th>
                                                <a href="{{ route('super#deleteAllClasses') }}">
                                                    <button class="btn btn-sm btn-danger" title="Delete All Classes"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classList as $cL)
                                            <tr>
                                                <td class="">{{ $cL->class_name }}</td>
                                                <td>{{ $cL->student_id }}</td>
                                                <td>
                                                    @if ($cL->status == 0)
                                                        <span class="badge badge-danger">Occupied</span>
                                                        {{-- <button class="btn btn-sm btn-danger" disabled>Occupied</button> --}}
                                                    @else
                                                        <span class="badge badge-success">Available</span>
                                                        {{-- <button class="btn btn-sm btn-success" disabled>Available</button> --}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($cL->situation == 0)
                                                        <span class="badge badge-success ">Free</span>
                                                    @endif
                                                    @if ($cL->situation == 1)
                                                        <span class="badge badge-warning ">Lecturing</span>
                                                    @endif
                                                    @if ($cL->situation == 2)
                                                        <span class="badge badge-primary ">Break Time</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('super#deleteClass', $cL->id) }}">
                                                        <button class="btn btn-sm btn-danger" title="Delete Class"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </a>

                                                    <a href="{{ route('super#updateClassPage', $cL->id) }}">
                                                        <button class="btn btn-sm btn-success" title="Update Class"><i
                                                                class="fa-solid fa-pen"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            <div class="mt-3 offset-7">
                                {{ $classList->links() }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            {{-- <div class="row">
                <div class="col-6 ">
                    <div class="card">
                        <div class="card-header text-dark text-center fs-4 my-3">Create Book</div>
                        <form action="{{ route('super#createBook') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label for="" class="text-dark">Name</label>
                                <input type="text" name="name"
                                    class="form-control mb-2 @error('name')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror


                                <label for="" class="text-dark">Authur</label>
                                <input type="text" name="authur"
                                    class="form-control mb-2 @error('authur')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Authur Name">
                                @error('authur')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark">Category</label>
                                <select name="category"
                                    class="form-control mb-2 @error('category')
                                                    is-invalid
                                                @enderror">
                                    <option value="">Choose Category</option>
                                    @foreach ($category as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach

                                </select>
                                @error('category')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                                <label for="" class="text-dark">Book</label>
                                <input type="file" name="book"
                                    class="form-control p-0 mb-2 @error('book')
                                                    is-invalid
                                                @enderror"
                                    placeholder="book">
                                @error('book')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-success offset-8 mt-3"><i class="fa fa-plus"></i>
                                Create
                                New</button>
                        </form>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center my-3">Books</div>
                        <div class="card-body">
                            <table class="table">
                                @if (count($book) == 0)
                                    <h6 class="text-center text-danger mt-3">There is no books.</h6>
                                @else
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Book Name</th>
                                            <th scope="col">Authur Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Book</th>
                                            <th scope="col">
                                                <a href="{{ route('super#deleteAllBook') }}">
                                                    <button class="btn btn-sm btn-danger" title="Delete All Books">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($book as $b)
                                            <tr>
                                                <td></td>
                                                <td>{{ $b->name }}</td>
                                                <td>{{ $b->authur }}</td>
                                                <td>{{ $b->category_name }}</td>
                                                <td>{{ $b->book }}</td>
                                                <td class=" col-3">
                                                    <a href="{{ route('super#readBook', $b->id) }}">
                                                        <button class="btn btn-sm btn-success mr-2" title="View Book"><i
                                                                class="fa-solid fa-eye"></i></button>
                                                    </a>
                                                    <a href="{{ route('super#deleteBook', $b->id) }}">
                                                        <button class="btn btn-sm btn-danger" title="Delete Book"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            <div class="mt-3 offset-7">
                                {{ $book->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}


        </div>


    </div>
@endsection
