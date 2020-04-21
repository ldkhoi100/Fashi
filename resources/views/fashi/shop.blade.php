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

                <form action="{{ route('shopSortPrice') }}" method="GET">
                    @csrf
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="number" name="min" placeholder="Min" @isset($min) value="{{ $min }}"
                                        min="0" @endisset>
                                    <input type="number" name="max" placeholder="Max" @isset($max) value="{{ $max }}"
                                        max="100000" @endisset>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="filter-btn">Filter</button>
                    </div>
                </form>
            </div>

            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">


                    @if(session('search_products'))
                    <div class="row" style="margin: auto; margin-bottom: 40px;">
                        <p style="font-size: 28px; font-weight: bold; color: #00008B">
                            <span style="text-decoration: underline">Search products</span> :
                            {{ session('search_products') }}
                            {{ Session::forget('search_products') }}
                        </p>
                    </div>
                    @else
                    <div class="row">
                        <h2>New Products</h2>
                    </div><br>
                    @endif

                    <div class="row" style="margin: auto; margin-bottom: 20px;">
                        {{ $count_product }} items found
                    </div>

                    @isset($min)
                    <div class="row" style="margin: auto;">
                        Filtered By: &nbsp;
                        <span style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">
                            ${{ $min }} - ${{ $max }} <a href="{{ route('shop') }}" style="color: #5d5d5d"><i
                                    class="fas fa-times"></i></a></span>
                    </div>
                    @endisset

                    <div class="row">
                        <div class="col-lg-12 col-md-7">
                            <div class="select-option" style="float: right">
                                <select class="sorting" onchange="window.location.href=this.value;">
                                    <option value='/shop' data-title="English">
                                        Sort By</option>
                                    <option value="/shop/sort/low&to&high" @if(Request::is('shop/sort/low&to&high'))
                                        selected @endif>Price low to high</option>
                                    <option value="/shop/sort/high&to&low" @if(Request::is('shop/sort/high&to&low'))
                                        selected @endif>Price high to low</option>
                                </select>
                            </div>
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