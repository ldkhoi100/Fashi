@extends('admin.layouts')

@section('title', 'Edit banner')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('banner.index') }}"
                    style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back Banner</a>
            </h1>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('banner.trash') }}"
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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Update banner</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('banner.update', $banner->id) }}"
                            enctype="multipart/form-data" id="my-form">
                            @csrf
                            @method('PUT')

                            @include('partials.message')

                            <div class="form-group @error('id_objects') has-error has-feedback @enderror">

                                <label>Object</label>

                                <select name="id_objects" id=""
                                    class="form-control @error('id_objects') is-invalid @enderror">
                                    @foreach ($objects as $object)
                                    <option value="{{ $object->id }}" @if($banner->id_objects==$object->id)
                                        {{ "selected" }}
                                        @endif
                                        >{{ $object->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Link</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $banner->link }}" required>

                            </div>

                            <div class="form-group @error('position') has-error has-feedback @enderror">
                                <label>Position</label>

                                <select name="position" id=""
                                    class="form-control @error('position') is-invalid @enderror">
                                    <option value="0" @if($banner->position == 0) {{ "selected" }} @endif>None</option>
                                    <option value="1" @if($banner->position == 1) {{ "selected" }} @endif>First</option>
                                    <option value="2" @if($banner->position == 2) {{ "selected" }} @endif>Second
                                    </option>
                                    <option value="3" @if($banner->position == 3) {{ "selected" }} @endif>Third</option>
                                </select>
                            </div>

                            <div class="form-group @error('image') has-error has-feedback @enderror">

                                <label>Image</label>

                                <input id="imgPost" type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" onchange="readURL(event)">

                                <img id="zoom" src="img/banner/{{ $banner->image }}" alt="" srcset="" width="250">

                            </div>

                            <button type="submit" class="btn btn-primary" id="btn-submit"
                                style="border: none">Update</button>

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