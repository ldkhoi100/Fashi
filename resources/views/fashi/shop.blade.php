@extends('fashi.layouts')

@section('title', 'shop')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
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
                        <li><a href="{{ route('men') }}">Men's</a></li>
                        <li><a href="{{ route('women') }}">Women's</a></li>
                        <li><a href="{{ route('kid') }}">Kids's</a></li>
                    </ul>
                </div>
                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        <a href="{{ route('men') }}">Men's</a>
                        <a href="{{ route('women') }}">Women's</a>
                        <a href="{{ route('kid') }}">Kid's</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">

                    <div class="row" style="margin: auto; margin-bottom: 40px;">
                        @if(session('search_products'))
                        <p style="font-size: 28px; font-weight: bold; color: #00008B">
                            <span style="text-decoration: underline">Search products</span> :
                            {{ session('search_products') }}
                            {{ Session::forget('search_products') }}
                        </p>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting" onchange="window.location.href=this.value;">
                                    <option value='/' data-title="English">
                                        Sort By</option>
                                    <option value="/shop/sort/low&to&high" @if(Request::is('shop/sort/low&to&high'))
                                        selected @endif>Price low to high</option>
                                </select>
                                <select class="p-show">
                                    <option value="">Show:</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 text-right">
                            <p>All Product</p>
                        </div>
                    </div>
                </div>

                <div class="product-list">
                    <div class="row scroll endless-pagination" data-next-page="{{ $product->nextPageUrl() }}">

                        @include('ajax.shop')

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