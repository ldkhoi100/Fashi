@extends('admin.layouts')

@section('title', 'Slide')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('slide.create') }}" class="btn btn-primary">Create new slide</a>
        <a href="{{ route('slide.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of slide</h6>
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
                            <th>Description</th>
                            <th>Categories</th>
                            <th>Object</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Discount(%)</th>
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
                            <th>Description</th>
                            <th>Categories</th>
                            <th>Object</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Discount(%)</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($slide as $key => $slide)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $slide->name }}</td>

                            {{-- <td><a href="{{ route('slide.show', $slide->id) }}">Details</a></td> --}}
                            <td><button data-url="{{ route('slide.show',$slide->id) }}" ​ type="button"
                                    data-target="#show" data-toggle="modal"
                                    class="btn btn-info btn-show btn-sm">Detail</button></td>

                            <td>{{ $slide->categories->name }}</td>
                            <td>{{ $slide->objects->name }}</td>
                            <td>{{ $slide->link }}</td>

                            <td><img src="img/slide/{{ $slide->image }}" alt="" srcset="" width="75px">

                            <td>{{ $slide->discount }} %</td>

                            <td><b style="color:orange">{{ $slide->user_created }}</b> <br>
                                {{ $slide->created_at }}
                            </td>

                            <td><b style="color:purple">{{ $slide->user_updated }}</b> <br>
                                {{ $slide->updated_at }}
                            </td>

                            <td><a href="{{ route('slide.edit', $slide->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('slide.destroy', $slide->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete slide {{$slide->name}} ?')"
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