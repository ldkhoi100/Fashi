<title>{{ $product->name }}</title>
@include('fashi.header')

<style>
    select {
        font-family: fontAwesome
    }

    .rating {
        unicode-bidi: bidi-override;
        direction: rtl;
        float: left;
    }

    .rating>label {
        display: inline-block;
        position: relative;
        width: 1.1em;
        margin-left: 10px;
        margin-bottom: 20px;
    }

    .rating>label.active:before,
    .rating>label.active~label:before,
    .rating>label:hover:before,
    .rating>label:hover~label:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 700;
        content: "\f005";
        /* content: "\2605"; */
        position: absolute;
        color: #FFD700;
        font-size: 23px;
        /* top: -3.7px; */
        top: -9.92px;
        right: -1px;
    }

    input {
        display: none;
    }
</style>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    @include('partials.message')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop') }}"> Shop</a>
                    <a href="{{ route('men') }}"> Men's</a>
                    <a href="{{ route('getProductMen', $product->id_categories) }}">{{ $product->categories->name }}</a>
                    <span>{{ $product->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Product Shop Section Begin -->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
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
                        <a
                            href="{{ route('getProductMen', $product->id_categories) }}">{{ $product->categories->name }}</a>
                        <a href="{{ route('men') }}">{{ $product->objects->name }}</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-thumbs">
                            <img class="product-big-img" src={{ "img/products/" . $product->image1 }} alt="" id="myImg"
                                @if($product->amount <= 0) style='filter: blur(2px);
                                        -webkit-filter: blur(2px); min-width: 100%;' @else style="min-width: 100%"
                                @endif>
                                <!-- Zoom image  -->
                                <div style="position: absolute; top: 8px; right: 40px;"><i
                                        class="fa fa-search-plus"></i></div>
                                <!-- End zoom image  -->

                                <div class="sale pp-sale">
                                </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                <div class="pt active" data-imgbigurl={{ "img/products/" . $product->image1 }}><img
                                        src={{ "img/products/" . $product->image1 }} alt=""></div>
                                @if(!empty($product->image2))
                                <div class="pt" data-imgbigurl={{ "img/products/" . $product->image2 }}><img
                                        src={{ "img/products/" . $product->image2 }} alt=""></div>
                                @endif
                                @if(!empty($product->image3))
                                <div class="pt" data-imgbigurl={{ "img/products/" . $product->image3 }}><img
                                        src={{ "img/products/" . $product->image3 }} alt=""></div>
                                @endif
                                @if(!empty($product->image4))
                                <div class="pt" data-imgbigurl={{ "img/products/" . $product->image4 }}><img
                                        src={{ "img/products/" . $product->image4 }} alt=""></div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <span class="close">&times;</span>
                        <img class="modal-content" id="img01">
                        <div id="caption"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{ $product->categories->name }}</span>
                                <h3>
                                    @if($product->amount
                                    <= 0) <br />
                                    <span
                                        style='color: white; font-size: 25px; font-weight: bold; border: solid red; max-width: 230px; text-align: center; background: red;'>
                                        Out of stock</span> <br>
                                    @endif
                                    {{ $product->name }}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                @if($avgRating == 0)
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                <i class="far fa-star"></i>
                                @elseif($avgRating >= 0 && $avgRating < 0.9) <i class="fa fa-star-half-alt">
                                    </i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <i class="far fa-star"></i>
                                    @elseif($avgRating >= 1 && $avgRating < 1.1) <i class="fa fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @elseif($avgRating >= 1.1 && $avgRating < 2) <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-alt"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            @elseif($avgRating >= 2 && $avgRating < 2.1) <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                @elseif($avgRating >= 2.1 && $avgRating < 3) <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif($avgRating >= 3 && $avgRating < 3.1) <i class="fa fa-star">
                                                        </i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif($avgRating >= 3.1 && $avgRating < 4) <i
                                                            class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif($avgRating >= 4 && $avgRating < 4.1) <i
                                                                class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif($avgRating >= 4.1 &&
                                                                $avgRating < 5) <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-alt"></i>
                                                                    @else
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    @endif
                                                                    <span> ({{ round($avgRating, 1) }})</span>
                                                                    <span>{{ count($countRating) }} Rating</span><br>
                                                                    <span>view count:
                                                                        {{ $product->view_count }}</span>
                            </div>
                            <div class="pd-desc" style="margin-top: 30px">
                                @if($product->amount <= 0) <h4 style='text-decoration: line-through; color: grey'>
                                    ${{ number_format($product->unit_price, 2) }}</h4>

                                    @elseif($product->promotion_price > 0)
                                    <h4>${{ number_format($product->promotion_price, 2) }}
                                        <span>${{ number_format($product->unit_price, 2) }}</span>
                                        <span
                                            style="text-decoration: none; color: red; font: 13px/28px 'Open Sans'!important;">
                                            ({{ number_format(100 - ($product->promotion_price * 100 / $product->unit_price), 0) }}%
                                            off)
                                        </span>
                                        <span
                                            style="text-decoration: none; color: grey; font: 13px 'Open Sans';">Includes
                                            all taxes</span>
                                    </h4>
                                    @else
                                    <h4>${{ number_format($product->unit_price, 2) }}
                                        <span
                                            style="text-decoration: none; color: grey; font: 13px 'Open Sans';">Includes
                                            all taxes</span>
                                    </h4>
                                    @endif
                            </div>
                            {{--  <div class="pd-color">
                                <h6>Color</h6>
                                <div class="pd-color-choose">
                                    <div class="cc-item">
                                        <input type="radio" id="cc-black">
                                        <label for="cc-black"></label>
                                    </div>
                                    <div class="cc-item">
                                        <input type="radio" id="cc-yellow">
                                        <label for="cc-yellow" class="cc-yellow"></label>
                                    </div>
                                    <div class="cc-item">
                                        <input type="radio" id="cc-violet">
                                        <label for="cc-violet" class="cc-violet"></label>
                                    </div>
                                </div>
                            </div>  --}}
                            <div class="pd-size-choose" style="margin-top: 100px">
                                <div class="sc-item">
                                    <input type="radio" id="sm-size">
                                    <label for="sm-size">s</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="md-size">
                                    <label for="md-size">m</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="lg-size">
                                    <label for="lg-size">l</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="xl-size">
                                    <label for="xl-size">xs</label>
                                </div>
                            </div>
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" style="display: flex">
                                </div>
                                @if($product->amount > 0)
                                <a href="#" class="primary-btn pd-cart">Add To Cart</a>
                                @else
                                <a href="javascript:window.location.href=window.location.href"
                                    class="btn primary-btn pd-cart disabled" aria-disabled="true">Add To Cart</a>
                                @endif
                            </div>
                            <ul class="pd-tags">
                                <li><span>CATEGORIES</span>: {{ $product->categories->name }}</li>
                                <li><span>TAGS</span>: {{ $product->categories->name }},
                                    {{ $product->objects->name }}
                                </li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">Sku : 00{{ $product->id }}</div>
                                <div class="pd-social">
                                    <a href="#"><i class="ti-facebook"></i></a>
                                    <a href="#"><i class="ti-twitter-alt"></i></a>
                                    <a href="#"><i class="ti-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Redirect to this location --}}
                <a name="location"></a>

                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews
                                    ({{ count($reviews) }})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            {!! $product->description !!}
                                        </div>
                                        <div class="col-lg-5">
                                            <img style="min-width: 0%" src="{{ "img/products/" . $product->image1 }}"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-catagory">Customer Rating</td>
                                            <td>
                                                <div class="pd-rating">
                                                    {{ round($avgRating, 1) }}
                                                    @if($avgRating == 0)
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                    @elseif($avgRating > 0 && $avgRating < 0.9) <i
                                                        class="fa fa-star-half-alt">
                                                        </i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                        @elseif($avgRating >= 1 && $avgRating < 1.1) <i
                                                            class="fa fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            <i class="far fa-star"></i>
                                                            @elseif($avgRating >= 1.1 && $avgRating < 2) <i
                                                                class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-alt"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                @elseif($avgRating >= 2 && $avgRating < 2.1) <i
                                                                    class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    @elseif($avgRating >= 2.1 && $avgRating < 3) <i
                                                                        class="fa fa-star"></i>
                                                                        <i class="fa fa-star"></i>
                                                                        <i class="fa fa-star-half-alt"></i>
                                                                        <i class="far fa-star"></i>
                                                                        <i class="far fa-star"></i>
                                                                        @elseif($avgRating >= 3 && $avgRating < 3.1) <i
                                                                            class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            <i class="far fa-star"></i>
                                                                            @elseif($avgRating >= 3.1 && $avgRating < 4)
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star"></i>
                                                                                <i class="fa fa-star-half-alt"></i>
                                                                                <i class="far fa-star"></i>
                                                                                @elseif($avgRating >= 4 && $avgRating <
                                                                                    4.1) <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="fa fa-star"></i>
                                                                                    <i class="far fa-star"></i>
                                                                                    @elseif($avgRating >= 4.1 &&
                                                                                    $avgRating < 5) <i
                                                                                        class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i
                                                                                            class="fa fa-star-half-alt"></i>
                                                                                        @else
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        <i class="fa fa-star"></i>
                                                                                        @endif
                                                                                        <span>
                                                                                            ({{ count($countRating) }}
                                                                                            Rating)</span>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Price</td>
                                            <td>
                                                <div class="p-price">

                                                    @if($product->promotion_price < $product->unit_price &&
                                                        $product->promotion_price > 0)
                                                        ${{ number_format($product->promotion_price, 2) }}
                                                        @else
                                                        ${{ number_format($product->unit_price, 2) }}
                                                        @endif

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Add To Cart</td>
                                            <td>
                                                <div class="cart-add">+ add to cart</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Availability</td>
                                            <td>
                                                <div class="p-stock">{{ $product->amount }} in stock</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Size</td>
                                            <td>
                                                <div class="p-size">S, M, L, XS</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-catagory">Sku</td>
                                            <td>
                                                <div class="p-code">00{{ $product->id }}</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>{{ count($reviews) }} Comments</h4>
                                    <div class="comment-option">
                                        {{ csrf_field() }}
                                        <div id="post_data"></div>
                                        {{-- @foreach ($reviews as $review)

                                        <div class="co-item">
                                            <div class="avatar-pic">
                                                <div
                                                    style="width: 27px; height: 27px; text-align: center; background: #ddd; font-weight: bold; color: #666">
                                                    {{ strtoupper(substr($review->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="avatar-text">
                                    <div class="at-rating">
                                        @if($review->rating == 1)
                                        <i class="fa fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @endif
                                        @if($review->rating == 2)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @endif
                                        @if($review->rating == 3)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @endif
                                        @if($review->rating == 4)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="far fa-star"></i>
                                        @endif
                                        @if($review->rating == 5)
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        @endif
                                        @if($review->rating == 0)
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span style="color:#999591; font-size:12px;"> (No rating)</span>
                                        @endif
                                    </div>
                                    <h5>{{ ucwords($review->name) }}
                                        <span>{{ time_elapsed_string($review->created_at) }}</span>
                                    </h5>
                                    <div class="at-reply">{{ $review->comment }}</div>
                                </div>
                            </div>

                            @endforeach --}}
                        </div>

                        @if(Auth::user())

                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>

                            <!-- Form reviews -->
                            <form action="{{ route('reviews') }}" method="POST" class="comment-form">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id_products" value="{{ $product->id }}">
                                    <div class="col-lg-1">
                                        Rating
                                    </div>
                                    <div class="rating">
                                        <label id="star5"> <i class="far fa-star fa-lg"></i>
                                            <input type="radio" name="rating" value="5" /></label>
                                        <label id="star4"> <i class="far fa-star fa-lg"></i>
                                            <input type="radio" name="rating" value="4" /></label>
                                        <label id="star3"> <i class="far fa-star fa-lg"></i>
                                            <input type="radio" name="rating" value="3" /></label>
                                        <label id="star2"> <i class="far fa-star fa-lg"></i>
                                            <input type="radio" name="rating" value="2" /></label>
                                        <label id="star1"> <i class="far fa-star fa-lg"></i>
                                            <input type="radio" name="rating" value="1" /></label>
                                    </div>
                                    <div style="margin-left: 1rem">
                                        <span class="stars"></span>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages" name="comment">{{ old('comment') }}</textarea>
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                            </form>

                        </div>

                        @else

                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form action="{{ route('reviews') }}" method="POST" class="comment-form">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="id_products" value="{{ $product->id }}">

                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Name" name="name" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Messages" name="comment">{{ old('comment') }}</textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <button type="submit" class="site-btn">Send message</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>

                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>
<!-- Product Shop Section End -->

<!-- Related Products Section End -->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($related_products as $product)

            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic">
                        <img src={{ "img/products/" . $product->image1 }} alt="" @if($product->amount <= 0) style='filter: blur(2px);
                                        -webkit-filter: blur(2px);' @endif>

                            @if($product->amount <= 0) <div style='color:white; background: red; font-weight: bold'
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
                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                        <li class="quick-view"><a href="{{ route('getDetailProductMen', $product->id) }}">+ Quick
                                View</a></li>
                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                    </ul>
                </div>
                <div class="pi-text">
                    <div class="catagory-name">{{ $product->categories->name }}</div>
                    <a href="{{ route('getDetailProductMen', $product->id) }}">
                        <h5>{{ $product->name }}</h5>
                    </a>
                    @if($product->amount <= 0) <div class="product-price"
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
</div>
<!-- Related Products Section End -->
{{-- Zoom image --}}

@include('fashi.footer')
<script src="js/zoom-image.js"></script>
<script>
    // Load data reivews
    $(document).ready(function(){
        var _token = $('input[name="_token"]').val();
        load_data('', _token);
        function load_data(id="", _token)
        {
            $.ajax({
            url:"{{ route('loadmore.load_data', $id_product->id) }}",
            method:"POST",
            data:{id:id, _token:_token},
            success:function(data)
            {
                $('#load_more_button').remove();
                $('#post_data').append(data);
            }
            })
        }
        $(document).on('click', '#load_more_button', function(){
        var id = $(this).data('id');
        $('#load_more_button').html('<b>Loading...</b>');
        load_data(id, _token);
        });
    });
</script>
<script>
    $(document).ready(function() {
  $('label').click(function() {
    $('label').removeClass('active');
    $(this).addClass('active');
  });
});
</script>
<script>
    $(document).ready(function(){
      $("#star5").click(function(){
        $(".stars").html("<b style='color: orange'>Excellent</b>");
      });
      $("#star4").click(function(){
        $(".stars").html("<b style='color: green'>Very good</b>");
      });
      $("#star3").click(function(){
        $(".stars").html("<b style='color: blue'>Normal</b>");
      });
      $("#star2").click(function(){
        $(".stars").html("<b style='color: red'>Bad</b>");
      });
      $("#star1").click(function(){
        $(".stars").html("<b style='color: #A52A2A'>Very bad</b>");
      });
    });
</script>