@extends('fashi.layouts')

@section('title', 'Shop Men\'s')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop') }}"> Shop</a>
                    <span>Men's</span>
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

                        <li><a href="{{ route('getProductMen', $categories->id) }}">{{ $categories->name }}</a></li>

                        @endforeach

                    </ul>
                </div>

                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        @foreach ($tags as $categories)

                        <a href="{{ route('getProductMen', $categories->id) }}">{{ $categories->name }}</a>

                        @endforeach
                    </div>
                </div>

                <form action="{{ route('menSortPrice') }}" method="GET">
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

                    <div class="row" style="margin: auto">
                        <h2>All Products</h2>
                    </div><br>

                    <div class="row" style="margin: auto;">
                        {{ $count_product }} items found
                    </div>

                    @isset($min)
                    <div class="row" style="margin: auto;">
                        Filtered By: &nbsp;
                        <span style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">
                            ${{ $min }} - ${{ $max }} <a href="{{ route('men') }}" style="color: #5d5d5d"><i
                                    class="fas fa-times"></i></a></span>
                    </div>
                    @endisset

                    <div class="row">
                        <div class="col-lg-12 col-md-7">
                            <div class="select-option" style="float: right">
                                <select class="sorting" onchange="window.location.href=this.value;">
                                    <option value='/shop/men' data-title="English">
                                        Sort By</option>
                                    <option value="/men/sort/low&to&high" @if(Request::is('men/sort/low&to&high'))
                                        selected @endif>Price low to high</option>
                                    <option value="/men/sort/high&to&low" @if(Request::is('men/sort/high&to&low'))
                                        selected @endif>Price high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-list">
                    <div class="row scroll endless-pagination" data-next-page="{{ $product->nextPageUrl() }}">

                        @include('ajax.men')

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