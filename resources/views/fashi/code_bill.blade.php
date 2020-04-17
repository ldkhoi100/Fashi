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
                    <h4 style="text-align: center">Invoice code {{ $code_bills->id }}</h4>
                    <div class="order-total">
                        <ul class="order-table">
                            <li>Product <span>Total</span></li>

                            <?php $i=0; ?>
                            @foreach ($code_bills_detail as $value)

                            <li class="fw-normal">{{ $value->products->name . ' x ' . $value->quantity }}
                                - Size:
                                @if($value->size == 1)
                                S
                                @elseif($value->size == 2)
                                M
                                @elseif($value->size == 3)
                                L
                                @elseif($value->size == 4)
                                XL
                                @else
                                {{ $value->size }}
                                @endif
                                <br>
                                Price: <b style="color: #A52A2A;">${{ number_format($value->unit_price, 2) }}</b>
                                <br>
                                Discount:
                                @if(empty($value->discount))
                                0%
                                @else
                                <b style="color: #8B008B;">{{ $value->discount }}%</b>
                                @endif
                                <span
                                    style="color: #ee4d2d; font-size: 16px">${{ number_format($value->total_price, 2) }}</span>
                            </li>

                            <?php ++$i ?>

                            @endforeach

                            <li class="total-price" style="font-size: 20px;">Status:
                                @if($code_bills->status == 1)
                                <span style="color: green"> <i class="fas fa-clipboard-check"></i> DELIVERED</span>
                                @else
                                <span style="color: #ee4d2d"> <i class="fas fa-dolly"></i> BEING TRANSPORTED</span>
                                @endif
                            </li>

                            <li class="total-price" style="font-size: 20px;">
                                Payment:
                                <span>{{ $code_bills->payment }}</span>
                            </li>

                            <li class="total-price" style="font-size: 21px;">Total price:
                                <span style="color: orange;">${{ number_format($code_bills->total, 2) }}</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </form>

    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection