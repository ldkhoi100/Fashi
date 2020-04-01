@extends('admin.layouts')

@section('title', 'Categories blog')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('categories-blogs.create') }}" class="btn btn-primary">Create new categories</a>
        <a href="{{ route('categories-blogs.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of categories blog</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Object</th>
                            <th>Total posts</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Object</th>
                            <th>Total posts</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($categories as $key => $categories)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $categories->name }}</td>
                            <td>{{ $categories->objects->name }}</td>
                            <td>{{ count($categories->blogs) }}</td>
                            {{-- <td><a href="{{ route('categories-blogs.show', $categories->id) }}">Details</a></td>
                            --}}
                            <td><button data-url="{{ route('categories-blogs.show',$categories->id) }}" ​ type="button"
                                    data-target="#show" data-toggle="modal"
                                    class="btn btn-info btn-show btn-sm">Detail</button></td>

                            <td><img src="img/categories/{{ $categories->image }}" alt="" srcset="" width="75px">

                            <td><b style="color:orange">{{ $categories->user_created }}</b> <br>
                                {{ $categories->created_at }}
                            </td>

                            <td><b style="color:purple">{{ $categories->user_updated }}</b> <br>
                                {{ $categories->updated_at }}
                            </td>

                            <td><a href="{{ route('categories-blogs.edit', $categories->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('categories-blogs.destroy', $categories->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete categories {{$categories->name}} ?')"
                                        class="btn btn-danger"><i class="fa fa-backspace"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection