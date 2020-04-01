@extends('admin.layouts')

@section('title', 'banner')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('banner.create') }}" class="btn btn-primary">Create new banner</a>
        <a href="{{ route('banner.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of banner</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Object</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Position</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Object</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Position</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($banner as $key => $banner)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $banner->objects->name }}</td>
                            <td>{{ $banner->link }}</td>

                            <td><img src="img/banner/{{ $banner->image }}" alt="" srcset="" width="75px">
                                @if($banner->position == 1)
                            <td>First</td>
                            @elseif($banner->position == 2)
                            <td>Second</td>
                            @elseif($banner->position == 3)
                            <td>Third</td>
                            @else
                            <td>None</td>
                            @endif

                            <td><b style="color:orange">{{ $banner->user_created }}</b> <br>
                                {{ $banner->created_at }}
                            </td>

                            <td><b style="color:purple">{{ $banner->user_updated }}</b> <br>
                                {{ $banner->updated_at }}
                            </td>

                            <td><a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('banner.destroy', $banner->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete banner {{$banner->name}} ?')"
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