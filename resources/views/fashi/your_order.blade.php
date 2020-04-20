@extends('fashi.layouts')

@section('title', 'shopping cart')

@section('content')
<style>
    table {
        box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
    }

    tr {
        border-top: 1px solid #e6e6e6;
    }

    .cart-table table tr td.cart-pic {
        width: 9%;
    }

    .totalprice {
        text-decoration: line-through;
        color: grey;
        font-size: .8rem;
        line-height: 1.1875rem;
        font-family: Helvetica Neue, Helvetica, Arial, 文泉驛正黑, WenQuanYi Zen Hei, Hiragino Sans GB, 儷黑 Pro, LiHei Pro, Heiti TC, 微軟正黑體, Microsoft JhengHei UI, Microsoft JhengHei, sans-serif;
    }

    .pricediscount {
        color: #ee4d2d;
        font-size: .875rem;
        line-height: 1.1875rem;
        font-family: Helvetica Neue, Helvetica, Arial, 文泉驛正黑, WenQuanYi Zen Hei, Hiragino Sans GB, 儷黑 Pro, LiHei Pro, Heiti TC, 微軟正黑體, Microsoft JhengHei UI, Microsoft JhengHei, sans-serif;
    }

    .price {
        font-size: .875rem;
        line-height: 1.1875rem;
        font-family: Helvetica Neue, Helvetica, Arial, 文泉驛正黑, WenQuanYi Zen Hei, Hiragino Sans GB, 儷黑 Pro, LiHei Pro, Heiti TC, 微軟正黑體, Microsoft JhengHei UI, Microsoft JhengHei, sans-serif;
    }

    .itemtotal {
        color: #ee4d2d;
        font-size: 1.875rem;
        line-height: 2rem;
        margin-left: 5px;
        font-family: Helvetica Neue, Helvetica, Arial, 文泉驛正黑, WenQuanYi Zen Hei, Hiragino Sans GB, 儷黑 Pro, LiHei Pro, Heiti TC, 微軟正黑體, Microsoft JhengHei UI, Microsoft JhengHei, sans-serif;
    }
</style>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <a href="{{ route('shop') }}">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">

        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <h1 style="text-align: center; color: black">My order</h1>
            </div>
        </div> <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">

                    <div class="col-lg-12" ; style="text-align: center">@if(count($bill_order) < 1) <h2>
                            You have not placed any orders</h2>
                            @endif
                    </div>

                    <div class="row scroll endless-pagination" data-next-page="{{ $bill_order->nextPageUrl() }}">

                        @include('ajax.yourOrder')

                    </div>
                    <div class="col-lg-12 loading">
                        <button type='button' class='btn btn-warning'>Loading....</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection

@push('clicked')
<script>
    // Auto load data from database
    $(document).ready(function() {
        $(window).scroll(fetchProducts);
        function fetchProducts() {
            var page = $('.endless-pagination').data('next-page');
            if(page !== null) {
                clearTimeout( $.data( this, "scrollCheck" ) );
                $.data( this, "scrollCheck", setTimeout(function() {
                    var scroll_position_for_products_load = $(window).height() + $(window).scrollTop() + 800;
                    if(scroll_position_for_products_load >= $(document).height()) {
                        $.get(page, function(data){
                            $('.scroll').append(data.bill_order);
                            $('.endless-pagination').data('next-page', data.next_page);
                        });
                    }
                }, 200))
            }
        }
    });
</script>
@endpush