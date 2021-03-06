@extends('admin.layouts')

@section('title', 'Edit customer')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('customers.index') }}"
                    style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back customers</a>
            </h1>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('customers.trash') }}"
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
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Update
                        {{ $customers->name }}</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('customers.update', $customers->id) }}"
                            enctype="multipart/form-data" id="my-form">
                            @csrf
                            @method('PUT')

                            @include('partials.message')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Name</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $customers->name }}" required>

                            </div>

                            <div class="form-group @error('email') has-error has-feedback @enderror">

                                <label>Email</label>

                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $customers->email }}" required>

                            </div>

                            <div class="form-group @error('address') has-error has-feedback @enderror">

                                <label>Address</label>

                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ $customers->address }}" required>

                            </div>

                            <div class="form-group @error('postcode') has-error has-feedback @enderror">

                                <label>Postcode</label>

                                <input type="text" class="form-control @error('postcode') is-invalid @enderror"
                                    name="postcode" value="{{ $customers->postcode }}" required>

                            </div>

                            <div class="form-group @error('city') has-error has-feedback @enderror">

                                <label>City</label>

                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city"
                                    value="{{ $customers->city }}" required>

                            </div>

                            <div class="form-group @error('country') has-error has-feedback @enderror">

                                <label>Country</label>

                                <input type="text" class="form-control @error('country') is-invalid @enderror"
                                    name="country" value="{{ $customers->country }}" required>

                            </div>

                            <div class="form-group @error('phone') has-error has-feedback @enderror">

                                <label>Phone</label>

                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ $customers->phone }}" required>

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

@push('ckeditor-js')
<!-- CK editor 4 installed-->
<script src="ckeditor/ckeditor.js"></script>
<script>
    // Script Ckeditor 4
    CKEDITOR.replace("description");
</script>
@endpush