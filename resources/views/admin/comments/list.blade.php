@extends('admin.layouts')

@section('title', 'Review products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        {{-- <a href="{{ route('reviews.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a> --}}
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Review</h6>
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
                            <th>Email</th>
                            <th>Comment</th>
                            <th>User created</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th>User created</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($reviews as $key => $reviews)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $reviews->user->name }}</td>
                            <td>{{ $reviews->user->email }}</td>
                            <td>{{ $reviews->comment }}</td>

                            <td>
                                {{ $reviews->created_at }}
                            </td>
                            <td>
                                <a class="btn btn-danger" href="{{ route('comment.destroy', $reviews->id) }}">
                                    <i class="fa fa-backspace"></i>
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