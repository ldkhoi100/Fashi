@extends('fashi.layouts')

@section('title', 'Shop Kid\'s')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop') }}"> Shop</a>
                    <a href="{{ route('kid') }}"> Kid's</a>
                    <span>{{ $id_categories->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                <div class="filter-widget">
                    <h4 class="fw-title">Categories</h4>
                    <ul class="filter-catagories">

                        @foreach ($categories as $categories)

                        <li><a href="{{ route('getProductKid', $categories->id) }}">{{ $categories->name }}</a></li>

                        @endforeach

                    </ul>
                </div>

                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        @foreach ($tags as $categories)

                        <a href="{{ route('getProductKid', $categories->id) }}">{{ $categories->name }}</a>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row">
                        <h2>{{ $id_categories->name }} <span
                                style="color: #999; font-size: 15px;">({{ count($id_categories->products) }}
                                ITEMS)</span></h2>
                    </div><br>
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting">
                                    <option value="">Default Sorting</option>
                                </select>
                                <select class="p-show">
                                    <option value="">Show:</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            {{-- <p>{{ count($id_categories->products) }} Products</p> --}}
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row scroll endless-pagination" data-next-page="{{ $product->nextPageUrl() }}">

                        @include('ajax.kidProduct')

                    </div>
                </div>
                <div class="loading-more">
                    <i class="icon_loading"></i>
                    <a href="javascript:void(0);">
                        Loading More
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->

@endsection

@push('scroll_endless')
<script src="js/scroll-endless.js"></script>
@endpush