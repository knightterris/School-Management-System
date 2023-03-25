@extends('superAdmin.superHomePage')

@section('title', 'Create Books')
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
            @if (session('deleteAll'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-danger alert-dismissible fade show " role="alert">
                            <strong>{{ session('deleteAll') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if (session('bookCreate'))
                <div class="row">
                    <div class="col-4 offset-8 ">
                        <div class="alert alert-success alert-dismissible fade show " role="alert">
                            <strong>{{ session('bookCreate') }}</strong>
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
                        <div class="card-header text-center fs-4 my-3">Create Category</div>
                        <form action="{{ route('super#createCategory') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <label for="" class="text-dark">Category Name</label>
                                <input type="text" name="categoryName"
                                    class="form-control mb-2 @error('categoryName')
                                                    is-invalid
                                                @enderror"
                                    placeholder="Category Name">
                                @error('categoryName')
                                    <small class="text-danger">{{ $message }}</small><br>
                                @enderror
                            </div>
                            <button class="btn btn-success offset-8" type="submit">Create Category</button>
                        </form>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <div class="card-header text-center my-3">Categories</div>
                        <div class="card-body">
                            <table class="table ">
                                @if (count($category) == 0)
                                    <h6 class="text-center text-danger mt-3">There is no category.</h6>
                                @else
                                    <thead>
                                        <tr>
                                            <th class=" ">Category Name</th>
                                            <th>
                                                <a href="{{ route('super#deleteAllCategory') }}">
                                                    <button class="btn btn-sm btn-danger" title="Delete All Category"><i
                                                            class="fa-solid fa-trash-can"></i></button>
                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($category as $c)
                                            <tr>
                                                <td class="">{{ $c->name }}</td>
                                                <td>
                                                    <a href="{{ route('super#deleteCategory', $c->id) }}">
                                                        <button class="btn btn-sm btn-danger" title="Delete Category"><i
                                                                class="fa-solid fa-trash-can"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endif
                            </table>
                            <div class="mt-3 offset-7">
                                {{-- {{ $category->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
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
                                {{-- {{ $book->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection
