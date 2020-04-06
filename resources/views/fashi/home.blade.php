@extends('fashi.layouts')

@section('title', 'Fashion')

@section('content')

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        @foreach ($slide as $value)

        <div class="single-hero-items set-bg" data-setbg={{ "img/slide/" .  $value->image }}>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>{{ $value->categories->name }}, {{ $value->objects->name }}</span>
                        <h1>{{ $value->name }}</h1>
                        <p>{!! $value->description !!}</p>
                        <a href="{{ $value->link }}" class="primary-btn">Shop Now</a>
                    </div>
                </div>

                @if($value->discount > 0)
                <div class="off-card">
                    <h2>Sale <span>{{ $value->discount }}%</span></h2>
                </div>
                @endif

            </div>
        </div>

        @endforeach
    </div>
</section>
<!-- Hero Section End -->

<!-- Banner Section Begin -->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            @foreach ($banners as $banner)

            <div class="col-lg-4">
                <div class="single-banner">
                    <img src={{ "img/banner/" . $banner->image }} alt="" height='255px'>
                    <div class="inner-text">
                        <a href="/shop/men">
                            <h4>{{ $banner->objects->name }}</h4>
                        </a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>
<!-- Banner Section End -->

<!-- Women Banner Section Begin -->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            @foreach ($large_image1 as $large_image1)

            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg={{ "img/large/" . $large_image1->image}}>
                    <h2>Women’s</h2>
                    <a href="{{  $large_image1->link }}">Discover More</a>
                </div>
            </div>

            @endforeach
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active">Best - selling product</li>
                        {{-- <li>HandBag</li>
                        <li>Shoes</li>
                        <li>Accessories</li> --}}
                    </ul>
                </div>
                <div class="product-slider owl-carousel">

                    @foreach ($women as $product)

                    <div class="product-item">
                        <div class="pi-pic">
                            <img src={{ "img/products/" . $product->image1 }} alt="">
                            @if($product->promotion_price > 0)
                            <div class="sale">
                                -{{ number_format(100 - ($product->promotion_price * 100 / $product->unit_price), 0) }}%
                            </div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="{{ route('addCart', $product->id) }}"><i
                                            class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="{{ route('getDetailProductMen', $product->id) }}">+
                                        Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $product->categories->name }}</div>
                            <a href="#">
                                <h5>{{ $product->name }}</h5>
                            </a>

                            @if($product->promotion_price > 0)
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

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section End -->

<!-- Deal Of The Week Section Begin-->
<section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Deal Of The Week</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                    consectetur adipisicing elit </p>
                <div class="product-price">
                    $35.00
                    <span>/ HanBag</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="#" class="primary-btn">Shop Now</a>
        </div>
    </div>
</section>
<!-- Deal Of The Week Section End -->

<!-- Man Banner Section Begin -->
<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li class="active">Best - selling product</li>
                        {{-- <li>HandBag</li>
                        <li>Shoes</li>
                        <li>Accessories</li> --}}
                    </ul>
                </div>
                <div class="product-slider owl-carousel">

                    @foreach ($men as $product)

                    <div class="product-item">
                        <div class="pi-pic">
                            <img src={{ "img/products/" . $product->image1 }} alt="">
                            @if($product->promotion_price > 0)
                            <div class="sale">
                                -{{ number_format(100 - ($product->promotion_price * 100 / $product->unit_price), 0) }}%
                            </div>
                            @endif
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="{{ route('addCart', $product->id) }}"><i
                                            class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="{{ route('getDetailProductMen', $product->id) }}">+
                                        Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">{{ $product->categories->name }}</div>
                            <a href="#">
                                <h5>{{ $product->name }}</h5>
                            </a>

                            @if($product->promotion_price > 0)
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

                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                @foreach ($large_image2 as $large_image2)
                <div class="product-large set-bg m-large" data-setbg={{ "img/large/" . $large_image2->image}}>
                    <h2>Men’s</h2>
                    <a href="{{  $large_image2->link }}">Discover More</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->

<!-- Instagram Section Begin -->
<div class="instagram-photo">
    @foreach ($instagram as $instagram)

    <div class="insta-item set-bg" data-setbg={{ "img/instagram/" . $instagram->image }}>
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="{{ $instagram->link }}">{{ $instagram->name }}</a></h5>
        </div>
    </div>

    @endforeach
</div>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>From The Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($blogs as $blog)

            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src={{ "img/blog/" . $blog->image }} alt="" height='300px'>
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                {{ date("M d, Y H:i", strtotime($blog->created_at)) }}
                            </div>
                            <div class="tag-item">
                                <i class="far fa-eye"></i>
                                {{ $blog->view_count }}
                            </div>
                        </div>
                        <a href="#">
                            <h4>The Best Street Style From London Fashion Week</h4>
                        </a>
                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Free Shipping</h6>
                            <p>For all order over 99$</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Delivery On Time</h6>
                            <p>If good have prolems</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Secure Payment</h6>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Blog Section End -->

@endsection