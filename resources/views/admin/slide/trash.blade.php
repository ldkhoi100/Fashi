@extends('admin.layouts')

@section('title', 'Garbage can slide')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('slide.index') }}" class="btn btn-primary">Home page slide</a>

        <a href="{{ route('slide.delete-all') }}" class="btn btn-danger float-right"
            onclick="return confirm('Do you want destroy all? All data can\'t be restore!')">Delete all</a>

        <a href="{{ route('slide.restore-all') }}" class="btn btn-warning float-right mr-2"
            onclick="return confirm('Do you want restore all data?')">Restore all</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Garbage can</h6>
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
                            <th>User deleted</th>
                            <th>Edit</th>
                            <th>Restore</th>
                            <th>Destroy</th>
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
                            <th>User deleted</th>
                            <th>Edit</th>
                            <th>Restore</th>
                            <th>Destroy</th>
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

                            <td><b style="color:orange">{{ $slide->user_deleted }}</b> <br>
                                {{ $slide->deleted_at }}
                            </td>
                            <td><a href="{{ route('slide.edit', $slide->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                            </td>
                            <td><a href="{{ route('slide.restore', $slide->id) }}" class="btn btn-warning"
                                    onclick="return confirm('Do you want restore slide {{ $slide->link }}?')">
                                    <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('slide.delete', $slide->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Do you want destroy slide {{ $slide->link }}?')">
                                    <i class="fa fa-minus-circle" title="Destroy"></i>
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
<!-- /.container-fluid -->

@endsection