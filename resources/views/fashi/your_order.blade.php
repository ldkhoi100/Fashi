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
                <h1 style="text-align: center; color: #f6c23e">My order</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">

                    <div class="col-lg-12" ; style="text-align: center">@if(count($bill_order) < 1) <h2>
                            You have not placed any orders</h2>
                            @endif
                    </div>


                    <?php $i=0; ?>
                    @foreach ($bill_order as $key=> $item)

                    <table style="margin-bottom: 22px;">
                        <tbody style="margin: auto">

                            <tr style="border-top: 0px">
                                <td style="">
                                    <span
                                        style="color: #ee4d2d; float:left; margin-left: 30px; margin-top: 20px; font-size: 20px;">
                                        <i class="fas fa-shopping-cart fa-lg"></i>
                                    </span>
                                </td>
                                <td></td>
                                <td style="float:right; margin-right: 21px; margin-top: 15px; padding-bottom: 15px;">
                                    @if($item->status == 0)
                                    <span style="font-weight: bold; font-size: 16px; color: #ee4d2d">
                                        <i class="fas fa-dolly"></i> BEING TRANSPORTED
                                    </span>
                                    @else
                                    <span style="font-weight: bold; font-size: 16px; color: #32CD32">
                                        <i class="fas fa-clipboard-check"></i> DELIVERED
                                    </span>
                                    @endif
                                </td>
                            </tr>

                            @foreach ($bill_detail[$i] as $bill)
                            <tr>
                                <td class="cart-pic first-row" width='6%' align="center">
                                    <img src={{ "img/products/" . $bill->products->image1 }} alt="" width='50px'>
                                </td>

                                <td class="cart-title first-row">
                                    {{ $bill->products->name }} <br> x {{ $bill->quantity }}
                                </td>
                                <td class="cart-title first-row" style="float: right; margin-right: 25px">

                                    @if($bill->discount > 0)
                                    <span
                                        class="totalprice">${{ number_format($bill->unit_price * $bill->quantity, 2) }}
                                    </span>
                                    <br>
                                    <span class="pricediscount">
                                        ${{ number_format($bill->total_price, 2) }}
                                    </span>

                                    @else
                                    <span class="price">
                                        ${{ number_format($bill->total_price, 2) }}
                                    </span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                            <tr style="border-bottom: 0px">
                                <td>
                                </td>
                                <td></td>
                                <td style="float:right; margin-right: 20px; margin-top: 15px; padding-bottom: 15px;">
                                    <span style="color: #ee4d2d"><i class="fas fa-money-check-alt fa-lg"></i></span>
                                    Total money: <span class="itemtotal"><span
                                            style="font-size: 22px;">$</span>{{ number_format($item->total, 2) }}</span>
                                    <br>
                                    <span style="float: right; margin-top: 10px">
                                        <a href="{{ route('find.bills', Crypt::encrypt($item->id)) }}"
                                            class="btn btn-outline-primary" style="text-transform: capitalize;">
                                            See invoice details
                                        </a>
                                    </span>
                                </td>
                            </tr>

                        </tbody>

                    </table>

                    <?php $i++; ?>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<!-- Modal address -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('change_address') }}" method="POST" id="my-form3">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="color: blue; margin: auto">Change
                        address</h3>
                </div>
                <div class="modal-body">
                    <p>Current adddress: <b>{{ Auth::user()->address }}</b></p>
                    <p>New shipping address: <input type="text" placeholder="Address" name="address"
                            class="form-control">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Change" id="btn-submit3" style="border: none">
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('clicked')

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            $("#btn-submit").attr("disabled", true);
            $("#btn-submit").addClass('button-clicked');
            return true;
        });
        $("#my-form2").submit(function (e) {
            $("#btn-submit2").attr("disabled", true);
            $("#btn-submit2").addClass('button-clicked');
            return true;
        });
        $("#my-form3").submit(function (e) {
            $("#btn-submit3").attr("disabled", true);
            $("#btn-submit3").addClass('button-clicked');
            return true;
        });
    });
</script>

@endpush