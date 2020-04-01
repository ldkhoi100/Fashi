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
            <h6 class="m-0 font-weight-bold text-primary">Review
                @foreach($product as $product)
                {{ $product->products->name }}</h6>
            @endforeach
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
                            <th>Rating</th>
                            <th>Products</th>
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
                            <th>Rating</th>
                            <th>Products</th>
                            <th>User created</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($reviews as $key => $reviews)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $reviews->name }}</td>
                            <td>{{ $reviews->email }}</td>
                            <td>{{ $reviews->comment }}</td>
                            <td>{{ $reviews->rating }}
                                @if($reviews->rating > 0)
                                <span style="color: #FAC451;">
                                    <i class="fa fa-star"></i>
                                </span>
                                {{-- <i class="fa fa-star"></i> --}}
                                @else
                                {{ "No rating" }}
                                @endif
                            </td>
                            <td>{{ $reviews->products->name }}</td>

                            <td><b style="color:orange">{{ $reviews->user_created }}</b> <br>
                                {{ $reviews->created_at }}
                            </td>
                            <td>
                                <form action="{{ route('reivew.destroy', $reviews->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete reviews {{$reviews->name}} ?')"
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