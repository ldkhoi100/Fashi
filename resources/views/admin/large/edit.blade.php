@extends('admin.layouts')

@section('title', 'Edit large image')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('large.index') }}"
                    style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back Large</a>
            </h1>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('large.trash') }}"
                    style="text-decoration: none; color: purple">Garbage can <i class="fa fa-chevron-right"></i></a>
            </h1>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Update large image</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('large.update', $large->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('partials.message')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Link</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $large->link }}" required>

                            </div>

                            <div class="form-group @error('image') has-error has-feedback @enderror">

                                <label>Image</label>

                                <input id="imgPost" type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" onchange="readURL(event)">

                                <img id="zoom" src="img/large/{{ $large->image }}" alt="" srcset="" width="250">

                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection