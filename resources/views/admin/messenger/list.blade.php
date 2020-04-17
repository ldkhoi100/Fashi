@extends('admin.layouts')

@section('title', 'large image')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('large.create') }}" class="btn btn-primary">Create large image</a>
        <a href="{{ route('large.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of large image</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Link</th>
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
                            <th>Link</th>
                            <th>Image</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($large as $key => $large)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $large->link }}</td>

                            <td><img src="img/large/{{ $large->image }}" alt="" srcset="" width="75px">

                            <td><b style="color:orange">{{ $large->user_created }}</b> <br>
                                {{ $large->created_at }}
                            </td>

                            <td><b style="color:purple">{{ $large->user_updated }}</b> <br>
                                {{ $large->updated_at }}
                            </td>

                            <td><a href="{{ route('large.edit', $large->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('large.destroy', $large->id) }}" method="POST" id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete large {{$large->name}} ?')"
                                        class="btn btn-danger" id="btn-submit" style="border: none"><i
                                            class="fa fa-backspace"></i></button>
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