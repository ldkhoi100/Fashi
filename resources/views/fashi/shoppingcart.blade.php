@extends('fashi.layouts')

@section('title', 'shopping cart')

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
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->
@include('partials.message')
<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-table">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <table>
                            <thead>
                                <tr>
                                    <th width='5%'>#</th>
                                    <th>Image</th>
                                    <th class="p-name" width='15%'>Product Name</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Availability</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody style="margin: auto">

                                @if(Cart::count() ==0)

                                <tr>
                                    <td colspan="9">
                                        <h1>NO ITEMS</h1>
                                    </td>
                                </tr>

                                @else

                                <?php $i = 0; ?>
                                @foreach (Cart::content() as $key => $value)

                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td class="cart-pic first-row">
                                        <a href="{{ route('getDetailProductMen', $value->id) }}">
                                            <img src="{{ "img/products/" . $value->options->img }}" alt=""
                                                width='120px'>
                                        </a>
                                    </td>
                                    <td class="cart-title first-row">
                                        <h5><a href="{{ route('getDetailProductMen', $value->id) }}"
                                                style="color: black">{{ $value->name }}</a>
                                        </h5>
                                    </td>
                                    <td class="cart-title first-row">
                                        <select name="{{ "size" . $i }}" id="" class="form-control-lg">
                                            {{-- <option value="1" @if($value->options->size == 1) {{ "selected" }}
                                            @endif>S
                                            </option>
                                            <option value="2" @if($value->options->size == 2) {{ "selected" }} @endif>M
                                            </option>
                                            <option value="3" @if($value->options->size == 3) {{ "selected" }} @endif>L
                                            </option>
                                            <option value="4" @if($value->options->size == 4) {{ "selected" }}
                                                @endif>XL</option> --}}
                                            @foreach ($product[$i]->size as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="p-price first-row">
                                        ${{ number_format($value->price, 2) }}</td>

                                    <td class="qua-col first-row">
                                        <div style="width: 100px; margin: 0 auto;">
                                            <input type="number" min="1" max="{{ $product[$i]->amount }}" name="qty"
                                                class="form-control qty" value="{{ $value->qty }}"
                                                data-id={{ $value->rowId }} style='text-align: center;'>
                                        </div>
                                    </td>

                                    <input type="hidden" name="check_availability" value="{{ $product[$i]->amount }}">
                                    <td class="total-price first-row">{{ $product[$i]->amount }}</td>

                                    <td class="total-price first-row">${{ number_format($value->total, 2) }}</td>

                                    <td class="close-td first-row"><a href="{{ route('deleteCart', $value->rowId) }}"
                                            style="color: blue"><i class="fa fa-times fa-lg" title="Delete"></i></a>
                                    </td>
                                </tr>

                                <?php ++$i ?>
                                @endforeach
                                @endif

                            </tbody>

                        </table>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            {{-- <a href="{{ route('shop') }}" class="primary-btn continue-shop">Continue
                            shopping</a><br> --}}
                            <h3>Shipping address:</h3> <br />
                            <span>{{ Auth::user()->address }}</span>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#myModal">Change</button>
                            <br><br>
                            <h3>Phone number:</h3> <br />
                            <span>+84 {{ Auth::user()->phone }}</span>

                            {{-- <a href="#" class="primary-btn up-cart">Update cart</a> --}}
                        </div>
                        {{-- <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div> --}}
                    </div>

                    @if(Cart::count() != 0)
                    <div class="col-lg-4">
                        <div class="discount-coupon">
                            <h6>Payment methods</h6>
                            <div>
                                <label><input type="radio" name="payment" value="Payment on delivery" class="red"
                                        checked>
                                    Payment on
                                    delivery</label> <br />
                                <div class="red card box" style="display: block">It may take<strong> 2-4 days
                                    </strong>for
                                    delivery
                                </div>
                                <label><input type="radio" name="payment" value="Pay by credit card" class="green">
                                    Pay by credit card</label> <br />
                                <div class="green card box">Transfer funds to the following account number:
                                    <br>- Account number: 123 456 78910
                                    <br>- Owner ATM: Le Dang Khoi
                                    <br>- Bank Vietinbank, Hue
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="col-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                @if(Cart::count() != 0)
                                <li class="subtotal">Subtotal <span>${{ $value->tax() }}</span></li>
                                @endif
                                <li class="cart-total">Total <span>${{ Cart::total() }}</span></li>
                            </ul>
                            {{-- <input type="submit" class="proceed-btn" value="PROCEED TO CHECK OUT" style="width: 100%"
                                onclick="return confirm('Are you sure this information is correct?')"> --}}

                            @if(Cart::count() != 0)
                            <button type="button" class="btn btn-primary proceed-btn" style="width: 100%"
                                data-toggle="modal" data-target="#exampleModal">
                                PROCEED TO CHECK OUT
                            </button>
                            @endif

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirm bills</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure this information is correct?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-primary" value="Confirm">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
<!-- Modal address -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('change_address') }}" method="POST">
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
                    <input type="submit" class="btn btn-primary" value="Change">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('cartjs')

<meta name="csrf-token" content="{{ csrf_token() }}">​
<script>
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ready(function(){
        $('.qty').blur(function(){
            let rowid = $(this).data('id');
            $.ajax({
                url : 'cart/'+rowid,
                type : 'put',
                dataType : 'json',
                data : {
                    qty : $(this).val(),
                },
                success : function(data){
                    if(data.error){
                        toastr.error(data.error, 'Error!', {timeOut: 5000});
                    }
                    else{
                        location.reload();

                        Command: toastr["success"]("You updated success", "Update success")
                        toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                        }
                    }
                }
            });
        });
    });
</script>
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