@extends('fashi.layouts')

@section('title', 'Checkout')

@section('content')

<style>
    .box {
        color: black;
        padding: 5px;
        display: none;
    }
</style>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Check bills</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">

        <form action="#" class="checkout-form">

            <div class="col-lg-12">
                <div class="place-order">
                    @if($code_bills->cancle == 0)
                    <h4 style="text-align: center">Invoice code {{ $code_bills->id }}</h4>
                    @else
                    <h4 style="text-align: center;"><span style="text-decoration: line-through; color: grey;">Invoice
                            code
                            {{ $code_bills->id }}
                        </span> &nbsp;
                        <span> <span style="color: #ee4d2d">Cancelled</span></span>
                    </h4>

                    @endif

                    <div class="order-total">
                        <ul class="order-table">
                            <li>Product <span>Total</span></li>

                            <?php $i=0; ?>
                            @foreach ($code_bills_detail as $value)

                            <li class="fw-normal" @if($value->cancle == 1)
                                style="text-decoration: line-through; color: grey;"
                                @endif>
                                {{ $value->products->name . ' x ' . $value->quantity }}
                                - Size: {{ $value->size }}
                                <br>
                                Price:
                                <b style="color: #A52A2A;">${{ number_format($value->unit_price, 2, ".", ",") }}</b>
                                <br>
                                Discount:
                                @if(empty($value->discount))
                                0%
                                @else
                                <b style="color: #8B008B;">{{ $value->discount }}%</b>
                                @endif

                                @if($value->cancle == 1)
                                <span
                                    style="color: #ee4d2d; font-size: 16px; text-decoration: line-through; color: grey;">${{ number_format($value->total_price, 2, ".", ",") }}</span>
                                @else
                                <span
                                    style="color: #ee4d2d; font-size: 16px">${{ number_format($value->total_price, 2, ".", ",") }}</span>
                                @endif

                            </li>

                            <?php ++$i ?>
                            @endforeach

                            <li class="total-price" style="font-size: 20px;">Status:
                                @if($code_bills->cancle == 1)
                                <span style="color: red"> <i class="fas fa-window-close"></i> CANCELLED</span>
                                @elseif($code_bills->status == 1)
                                <span style="color: green"> <i class="fas fa-clipboard-check"></i> DELIVERED</span>
                                @else
                                <span style="color: #ee4d2d"> <i class="fas fa-dolly"></i> BEING TRANSPORTED</span>
                                @endif
                            </li>

                            @if($code_bills->cancle == 0)
                            <li class="total-price" style="font-size: 20px;">
                                Payment:
                                <span>{{ $code_bills->payment }}</span>
                            </li>
                            @endif

                            <li class="total-price" style="font-size: 20px;">
                                Date order:
                                <span
                                    style="color: black;">{{ date("d-m-Y H:i", strtotime($code_bills->created_at)) }}</span>
                            </li>

                            @if($code_bills->cancle == 1)
                            <li class="total-price" style="font-size: 21px;">Total price:
                                <span
                                    style="color: orange; text-decoration: line-through; color: grey;">${{ number_format($code_bills->total, 2, ".", ",") }}</span>
                            </li>
                            @else
                            <li class="total-price" style="font-size: 21px;">Total price:
                                <span
                                    style="color: orange;">${{ number_format($code_bills->total, 2, ".", ",") }}</span>
                            </li>
                            @endif

                            <br><br>

                            {{-- Cancle bill --}}
                            @if((strtotime("now") - strtotime($code_bills->created_at)) < 86400 && $code_bills->status
                                == 0 && $code_bills->cancle == 0)

                                <div>
                                    <a href="{{ route('cancle.order', $code_bills->id) }}" class="btn btn-primary"
                                        style="float: right"
                                        onclick="return confirm('Do you want cancle this order? \nNote: you can only cancel this order within 24 hours after placing this order')">
                                        Cancel this order</a>
                                </div>

                                @endif

                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection