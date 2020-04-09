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
                    <a href="{{ route('shop') }}">Shop</a>
                    <span>Check Out</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="checkout-section spad">
    <div class="container">

        @include('partials.message')

        <form action="{{ route('formCheckout') }}" class="checkout-form" method="POST">
            @csrf

            {{-- Check coupon code --}}
            <input type="hidden" value="{{ $coupon }}" name="code" hidden>

            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="{{ route('login') }}" class="content-btn">Click Here To Login</a>
                    </div>
                    <h4>Biiling Details</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="fir">Full Name<span>*</span></label>
                            <input type="text" id="fir" name="name" style="margin-bottom: 5px"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="col-lg-6">
                            <label for="last">Last Name<span>*</span></label>
                            <input type="text" id="last">
                        </div> --}}
                        <div class="col-lg-12">
                            <label for="cun-name">Email<span>*</span></label>
                            <input type="text" id="cun-name" name="email" style="margin-bottom: 5px"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Country<span>*</span></label>
                            <input type="text" id="cun" name="country" style="margin-bottom: 5px"
                                class="form-control @error('country') is-invalid @enderror"
                                value="{{ old('country') }}">
                            @error('country')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Street Address<span>*</span></label>
                            <input type="text" id="street" name="address" style="margin-bottom: 5px"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}">
                            @error('address')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Postcode / ZIP (optional)</label>
                            <input type="text" id="zip" name="postcode" style="margin-bottom: 5px"
                                class="form-control @error('postcode') is-invalid @enderror"
                                value="{{ old('postcode') }}">
                            @error('postcode')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Town / City<span>*</span></label>
                            <input type="text" id="town" name="city" style="margin-bottom: 5px"
                                class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
                            @error('city')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-lg-12">
                            <label for="phone">Phone<span>*</span></label>
                            <input type="text" id="phone" name="phone" style="margin-bottom: 5px"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert" style="margin-bottom: 15px">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="create-item">
                                <label for="acc-create">
                                    Create an account?
                                    <input type="checkbox" id="acc-create">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        {{-- <input type="text" placeholder="Enter Your Coupon Code"> --}}
                        <button type="button" class="btn btn-secondary proceed-btn" style="width: 100%; height: 50px;
                        margin-top: 5px;" data-toggle="modal" data-target="#exampleModal1">
                            Enter the discount code
                        </button>
                    </div>
                    <div class="place-order">
                        <h4>Your Order</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                <li>Product <span>Total</span></li>

                                <?php $i=0; ?>
                                @foreach (Cart::content() as $value)

                                <li class="fw-normal">{{ $value->name . ' x ' . $value->qty }}
                                    @if(count($product[$i]->size) != 0)
                                    - Size:
                                    <select name="{{ "size" . $i }}" id="" class="form-control-sm">

                                        @foreach ($product[$i]->size as $size)
                                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach

                                    </select>

                                    @endif

                                    <span>${{ number_format($value->total, 2) }}</span>
                                </li>

                                <?php ++$i ?>

                                @endforeach
                                <li class="subtotal">Current price: <span
                                        style="color:#d0011b;">${{ Cart::priceTotal() }}</span></li>

                                @if(Cart::discount() > 0)
                                <li class="subtotal" style="margin-top: 10px;">
                                    Discount percent:
                                    <span>{{ number_format(Cart::discount() * 100 / Cart::priceTotal(), 0) }}%</span>
                                </li>
                                @endif

                                <li class="subtotal" style="margin-top: 10px;">
                                    Discount amount: <span style="color:blue">-
                                        ${{ number_format(Cart::discount(), 2) }}</span>
                                </li>

                                {{-- <li class="fw-normal">Subtotal <span>${{ Cart::tax() }}</span></li> --}}
                                <li class="total-price">Total price: <span>${{ Cart::total() }}</span></li>
                            </ul>

                            <div>
                                <label><input type="radio" name="payment" value="Payment on delivery" class="red"
                                        style="width: auto; height: auto" checked>
                                    Payment on delivery</label> <br />
                                <div class="red card box" style="display: block">It may take<strong> 2-4 days
                                    </strong>for delivery
                                </div>
                                <label><input type="radio" name="payment" value="Pay by credit card" class="green"
                                        style="width: auto; height: auto">
                                    Pay by credit card</label> <br />
                                <div class="green card box">Transfer funds to the following account number:
                                    <br>- Account number: 123 456 78910
                                    <br>- Owner ATM: Le Dang Khoi
                                    <br>- Bank Vietinbank, Hue
                                </div>
                            </div><br>

                            <div class="order-btn">
                                @if(Cart::count() != 0)
                                <button type="button" class="btn btn-primary proceed-btn"
                                    style="width: 50%; background:black" data-toggle="modal"
                                    data-target="#exampleModal">
                                    PROCEED TO CHECK OUT
                                </button>
                                @endif

                                <!-- Modal confirm checkout-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm bills</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure this information is correct?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary"
                                                    width="20%">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal COUPONS -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter the discount code
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('coupons') }}" class="coupon-form" method="POST">
                        @csrf
                        <div class="modal-body">
                            Your discount codes: <br><br>
                            <input type="text" name="code" class="form-control" placeholder="Enter DISCOUNT CODES here"
                                required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" width="25%">Apply</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection

@push('cartjs')

<script>
    //Type radio show/hide
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("class");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>

@endpush