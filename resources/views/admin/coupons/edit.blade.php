@extends('admin.layouts')

@section('title', 'Edit coupons')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('coupons.index') }}"
                    style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back coupons</a>
            </h1>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('coupons.trash') }}"
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
                        {{ $coupons->id_coupon }}</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('coupons.update', $coupons->id) }}"
                            enctype="multipart/form-data" id="my-form">
                            @csrf
                            @method('PUT')

                            @include('partials.message')

                            <div class="form-group @error('id_coupon') has-error has-feedback @enderror">

                                <label>Id coupons</label>

                                <input type="text" class="form-control @error('id_coupon') is-invalid @enderror"
                                    name="id_coupon" value="{{ $coupons->id_coupon }}" required>

                            </div>

                            <div class="form-group @error('discount') has-error has-feedback @enderror">

                                <label>Discount (%)</label>

                                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                    name="discount" value="{{ $coupons->discount }}" required>

                            </div>

                            <input type="hidden" value="0" name="used">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="1" class="custom-control-input" id="used" name="used"
                                    @if($coupons->used=='1' ) checked @endif>
                                <label class="custom-control-label" for="used">Used</label>
                            </div> <br>

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