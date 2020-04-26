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

                        <li><a
                                href="{{ route('getProductKid', Str::slug($categories->name)) }}">{{ $categories->name }}</a>
                        </li>

                        @endforeach

                    </ul>
                </div>

                <div class="filter-widget">
                    <h4 class="fw-title">Tags</h4>
                    <div class="fw-tags">
                        @foreach ($tags as $categories)

                        <a href="{{ route('getProductKid', Str::slug($categories->name)) }}">{{ $categories->name }}</a>

                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">
                <div class="product-show-option">
                    <div class="row" style="margin: auto">
                        <h2>{{ $id_categories->name }} <span
                                style="color: #999; font-size: 15px;">({{ count($id_categories->products) }}
                                ITEMS)</span></h2>
                    </div><br>
                    <div class="row">
                        {{-- <div class="col-lg-7 col-md-7">
                            <div class="select-option">
                                <select class="sorting">
                                    <option value="">Default Sorting</option>
                                </select>
                                <select class="p-show">
                                    <option value="">Show:</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-5 col-md-5 text-right">
                            {{-- <p>{{ count($id_categories->products) }} Products</p> --}}
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row scroll endless-pagination" data-next-page="{{ $product->nextPageUrl() }}">

                        @foreach ($product as $product)

                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <img src={{ "img/products/" . $product->image1 }} alt=""
                                        @if($product->size_product->sum('quantity') <= 0) style='filter: blur(2px);
                                        -webkit-filter: blur(2px);' @endif>

                                        @if($product->size_product->sum('quantity') <= 0) <div
                                            style='color:white; background: red; font-weight: bold'
                                            class="sale pp-sale">
                                            Sold out
                                </div>
                                {{--  @else  --}}
                                @elseif($product->promotion_price > 0)
                                <div class="sale pp-sale">
                                    -{{ number_format(100 - ($product->promotion_price * 100 / $product->unit_price), 0) }}%
                                </div>
                                @else

                                @endif
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    @if(!Auth::user())
                                    <li class="w-icon active"><a href="javascript:void(0);" class="click">
                                            <i class="icon_bag_alt" data-target="#exampleModal1"></i></a></li>
                                    @else
                                    @if($product->size_product->sum('quantity') > 0)
                                    <li class="w-icon active"><a
                                            href="{{ url('/shop/detail/' . Str::slug($product->name)) }}"><i
                                                class="fas fa-cart-arrow-down"></i></a>
                                    </li>
                                    @endif
                                    @endif
                                    <li class="quick-view"><a
                                            href="{{ url('/shop/detail/' . Str::slug($product->name)) }}">+
                                            Quick View</a>
                                    </li>
                                    <li class="w-icon"><a href="#"><i class="fas fa-heart"
                                                style="color: #D2691E"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">{{ $product->categories->name }}</div>
                                <a href="{{ url('/shop/detail/' . Str::slug($product->name)) }}">
                                    <h5>{{ $product->name }}</h5>
                                </a>

                                @if($product->size_product->sum('quantity') <= 0) <div class="product-price"
                                    style='text-decoration: line-through; color: grey'>
                                    ${{ number_format($product->unit_price, 2) }}
                            </div>

                            @elseif($product->promotion_price > 0)
                            <div class="product-price">
                                ${{ number_format($product->promotion_price, 2) }}
                                <span>${{ number_format($product->unit_price, 2) }}</span>
                            </div>

                            @else

                            <div class="product-price">
                                ${{ number_format($product->unit_price, 2) }}
                            </div>

                            @endif
                        </div>
                    </div>
                </div>

                @endforeach

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