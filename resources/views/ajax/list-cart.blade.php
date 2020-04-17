<div class="cart-table">
    <form action="{{ route('cart.store') }}" method="POST" id="my-form">
        @csrf
        {{-- Check coupon code --}}
        <input type="hidden" value="{{ $coupon }}" name="code" hidden>
        <table>
            <thead>
                <tr>
                    <th width='1%'>#</th>
                    <th>Image</th>
                    <th class="p-name" width='35%'>Name</th>
                    <th width='0%'>Size</th>
                    <th style="margin-right: 10px">Price</th>
                    <th>Quantity</th>
                    <th width='1%'>Save</th>
                    <th>Availability</th>
                    <th>Discount Percent</th>
                    <th>Total</th>
                    <th width='5%'><i class="ti-close"></i></th>
                </tr>
            </thead>
            <tbody style="margin: auto">

                @if(!Auth::user())
                <tr>
                    <td colspan="11">
                        <h4><br>You need to log in before you can put in your shopping cart <br><br>
                        </h4>
                        <h2><a href="javascript:void(0);" class="click" style="color: white"><button type="button"
                                    class="site-btn login-btn" id="btn-submit3" style="border: none; width: 30%">Sign In
                                </button></a>
                        </h2>
                    </td>
                </tr>
                @elseif(Cart::instance(Auth::user()->id)->count() == 0)
                <tr>
                    <td colspan="10">
                        <h1>NO ITEMS</h1>
                    </td>
                </tr>
                @else

                <?php $i = 0; ?>
                @foreach (Cart::instance(Auth::user()->id)->content() as $key => $value)
                <tr>
                    <td>{{ $i+1 }}</td>

                    <td class="cart-pic first-row">
                        <a href="{{ route('getDetailProductMen', $value->id) }}">
                            <img src="{{ "img/products/" . $value->options->img }}" alt="" width='100px'>
                        </a>
                    </td>

                    <td class="cart-title first-row">
                        <h5><a href="{{ route('getDetailProductMen', $value->id) }}"
                                style="color: black">{{ $value->name }}</a>
                        </h5>
                    </td>

                    <td class="cart-title first-row" style="text-align: center; font-weight: bold; font-size: 22px">
                        {{ $value->options->namesize }}
                    </td>

                    <td class="p-price first-row">
                        ${{ number_format($value->price, 2) }}</td>

                    <td class="qua-col first-row">
                        <div style="width: 100px; margin: 0 auto;">
                            <input type="number" min="1" max="{{ $size_product[$i]->quantity }}" name="qty"
                                class="form-control" value="{{ $value->qty }}" id="quantityItem{{ $value->rowId }}"
                                style='text-align: center;'>
                        </div>
                    </td>

                    <td class="save-td first-row">
                        <a href="javscript:void(0);" style="color:black;"><i data-idsave="{{ $value->rowId }}"
                                id="save{{ $value->rowId }}" class="ti-save"></i></a>
                    </td>

                    <input type="hidden" name="check_availability" value="{{ $size_product[$i]->quantity }}">
                    <td class="total-price first-row">{{ $size_product[$i]->quantity }}</td>

                    <td class="total-price first-row">{{ $value->discountRate }}%</td>

                    <td class="total-price first-row">${{ number_format($value->total, 2) }}</td>

                    <td class="close-td first-row">
                        <i class="fa fa-times fa-lg" data-id="{{ $value->rowId }}"></i>
                    </td>
                </tr>
                <?php ++$i ?>
                @endforeach
                @endif

            </tbody>

        </table>
</div>

@if(!Auth::user())
@elseif(Cart::instance(Auth::user()->id)->count() != 0)
<div class="row">
    <div class="col-lg-4">
        <div class="cart-buttons">
            <h4>Shipping address:</h4> <br />
            @if(Auth::user())
            <span>{{ Auth::user()->address }}</span>
            @endif
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Change</button>
            <br><br>
            <h4>Phone number:</h4> <br />
            <span>Phone: +84 {{ Auth::user()->phone }}</span><br /><br />
            <h4>Email: </h4> <br />
            <span>Email&nbsp;: {{ Auth::user()->email }}</span>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="discount-coupon">
            <h6>Payment methods</h6>
            <div>
                <label><input type="radio" name="payment" value="Payment on delivery" class="red" checked>
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
        <div class="discount-coupon">
            <h6>Discount Codes</h6>
            <button type="button" class="btn btn-primary proceed-btn" style="width: 100%" data-toggle="modal"
                data-target="#exampleModal1" id="modalcoupons">
                Enter the discount code
            </button>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="proceed-checkout">
            <ul>
                <li class="subtotal">Current price:
                    <span>${{ Cart::instance(Auth::user()->id)->priceTotal() }}</span></li>

                <li class="subtotal" style="margin-top: 10px;">
                    Discount amount: <span>-
                        ${{ Cart::instance(Auth::user()->id)->discount() }}</span>

                </li>
                <li class="cart-total" style="font-size: 20px;">Total price:
                    <span>${{ Cart::instance(Auth::user()->id)->total() }}</span>

                </li>
            </ul>

            <button type="button" class="btn btn-primary proceed-btn" style="width: 100%" data-toggle="modal"
                data-target="#exampleModal">
                PROCEED TO CHECK OUT
            </button>

            <!-- Modal PROCEED TO CHECK OUT -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel" style="color:blue;">Confirm
                                your bills</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure this information is correct? <br>
                            We will send an email to confirm your order!
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Confirm" id="btn-submit"
                                style="border: none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Modal COUPONS -->
    <div class="modal fade coupons" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" id="coupons">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel" style="color:blue;">Enter the
                        discount code</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your discount codes: <br><br>
                    <input type="text" name="code" class="form-control" placeholder="Enter DISCOUNT CODES here"
                        id="apply_cp" required>
                </div>

                <div class="modal-footer" id="apply_coupons">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="javascript:void(0);" onclick="coupons()"><input type="button" class="btn btn-primary"
                            value="Confirm" id="btn-submit2" style="border: none"></a>
                </div>
            </div>
        </div>
    </div>

    @endif

</div>