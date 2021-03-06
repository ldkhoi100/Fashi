@extends('admin.layouts')

@push('select2-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('title', 'Create Products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('product.index') }}"
                style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back Product</a>
        </h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            {{-- <div class="col-xl-8 col-lg-7"> --}}
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Create new product</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data"
                            id="my-form">
                            @csrf
                            @include('partials.message')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Name</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required>

                            </div>

                            <div class="form-group @error('description') has-error has-feedback @enderror">

                                <label>Description</label>

                                <textarea class="form-control @error('description') is-invalid @enderror"
                                    name="description" id="description" required>{!! old('description') !!}</textarea>

                            </div>

                            <div class="form-group @error('id_categories') has-error has-feedback @enderror">

                                <label>Categories</label>

                                <select name="id_categories" id=""
                                    class="form-control @error('id_categories') is-invalid @enderror">
                                    <option value="{{ $none->id }}">None</option>
                                    <optgroup label="Men's" style="color:red">
                                        @foreach ($mans as $man)
                                        <option value="{{ $man->id }}" @if(old('id_categories')==$man->id)
                                            {{ "selected" }}
                                            @endif
                                            >{{ $man->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Woman's" style="color:blue">
                                        @foreach ($womans as $woman)
                                        <option value="{{ $woman->id }}" @if(old('id_categories')==$woman->id)
                                            {{ "selected" }}
                                            @endif
                                            >{{ $woman->name }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Kid's" style="color:purple">
                                        @foreach ($kids as $kid)
                                        <option value="{{ $kid->id }}" @if(old('id_categories')==$kid->id)
                                            {{ "selected" }}
                                            @endif
                                            >{{ $kid->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>

                            </div>

                            <div class="form-group @error('id_objects') has-error has-feedback @enderror">

                                <label>Object</label>

                                <select name="id_objects" id=""
                                    class="form-control @error('id_objects') is-invalid @enderror">
                                    @foreach ($objects as $object)
                                    <option value="{{ $object->id }}" @if(old('id_objects')==$object->id)
                                        {{ "selected" }}
                                        @endif
                                        >{{ $object->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group @error('size') has-error has-feedback @enderror">

                                <label>Size products</label>

                                <select name="size[]" multiple id="size"
                                    class="form-control @error('size') is-invalid @enderror">
                                    @foreach ($size as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class=" form-group @error('unit_price') has-error has-feedback @enderror">

                                <label>Cost</label>

                                <input type="text" class="form-control @error('unit_price') is-invalid @enderror"
                                    name="unit_price" value="{{ old('unit_price') }}" required>

                            </div>

                            <div class="form-group @error('promotion_price') has-error has-feedback @enderror">

                                <label>Discount (Option)</label>

                                <input type="text" class="form-control @error('promotion_price') is-invalid @enderror"
                                    name="promotion_price" @if(old('promotion_price'))
                                    value="{{ old('promotion_price') }}" @else value="0" @endif
                                    placeholder="Promotion price">

                            </div> <br>

                            <input type="hidden" value="0" name="highlight">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="1" class="custom-control-input" id="highlight"
                                    name="highlight">
                                <label class="custom-control-label" for="highlight">Highlight</label>
                            </div> <br>

                            <input type="hidden" value="0" name="new">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="1" class="custom-control-input" id="new" name="new">
                                <label class="custom-control-label" for="new">New</label>
                            </div> <br>

                            <div class="form-group @error('image1') has-error has-feedback @enderror">

                                <label>Image main</label>

                                <input id="" type="file" name="image1"
                                    class="form-control @error('image1') is-invalid @enderror"
                                    onchange="readURL1(event)">

                                <img id="zoom1" src="#" alt="" srcset="" width="250">

                            </div>

                            <div class="form-group @error('image2') has-error has-feedback @enderror">

                                <label>Image 2</label>

                                <input id="" type="file" name="image2"
                                    class="form-control @error('image2') is-invalid @enderror"
                                    onchange="readURL2(event)">

                                <img id="zoom2" src="#" alt="" srcset="" width="250">

                            </div>

                            <div class="form-group @error('image3') has-error has-feedback @enderror">

                                <label>Image 3</label>

                                <input id="" type="file" name="image3"
                                    class="form-control @error('image3') is-invalid @enderror"
                                    onchange="readURL3(event)">

                                <img id="zoom3" src="#" alt="" srcset="" width="250">

                            </div>

                            <div class="form-group @error('image4') has-error has-feedback @enderror">

                                <label>Image 4</label>

                                <input id="" type="file" name="image4"
                                    class="form-control @error('image4') is-invalid @enderror"
                                    onchange="readURL4(event)">

                                <img id="zoom4" src="#" alt="" srcset="" width="250">

                            </div>

                            <button type="submit" class="btn btn-primary" id="btn-submit"
                                style="border: none">Create</button>

                            <button class="btn btn-secondary"
                                onclick="window.history.go(-1); return false;">Cancle</button>
                        </form>

                    </div>
                </div>
            </div>
            {{-- </div> --}}

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection

@push('ckeditor-js')
<!-- CK editor 4 installed-->
<script src="ckeditor/ckeditor.js"></script>
<script>
    // Script Ckeditor 4
    CKEDITOR.replace("description");
</script>
@endpush

@push('select2-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#size').select2({
            placeholder: "Select size"
        });
    });
</script>
@endpush