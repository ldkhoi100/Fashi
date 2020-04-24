<li class="cart-icon">
    <a href="javascript:void(0);">
        <i class="icon_bag_alt"></i>
        @if(Auth::user())
        <span>{{ Cart::instance(Auth::user()->id)->count() }}</span>
        @else
        <span>0</span>
        @endif
    </a>

    @if(!Auth::user())
    @elseif(Cart::instance(Auth::user()->id)->count() != 0)

    <div class="cart-hover">

        <div class="select-items">
            <table>
                <tbody>

                    @foreach (Cart::instance(Auth::user()->id)->content() as $row)

                    <tr>
                        <td class="si-pic">
                            <a href="{{ url('/shop/detail/' . Str::slug($row->name)) }}"><img
                                    src="{{ "img/products/" . $row->options->img }}" alt="No image" width='80px'>
                            </a>
                        </td>
                        <td class="si-text">
                            <div class="product-selected">
                                <p>${{ number_format($row->price, 2) }} x {{ $row->qty }}
                                </p>
                                <h6><a href="{{ url('/shop/detail/' . Str::slug($row->name)) }}">{{ $row->name }}
                                        -
                                        size: <b>{{ $row->options->namesize }}</b>
                                    </a>
                                </h6>
                            </div>
                        </td>
                        <td class="si-close">
                            {{-- Delete Cart --}}
                            <i class="ti-close" data-id="{{ $row->rowId }}"></i>

                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="select-total">
            <span>total:</span>
            <h5><b>${{ number_format(Cart::instance(Auth::user()->id)->total(), 2, ".", ",") }}</b></h5>
        </div>

        @endif

        <div class="select-button">

            @if(!Auth::user())
            @elseif(Cart::instance(Auth::user()->id)->count() == 0)

            @else
            <a href="{{ route('cart.index') }}" class="primary-btn checkout-btn">CHECK
                OUT</a>

        </div>

    </div>
</li>
<li class="cart-price">${{ number_format(Cart::instance(Auth::user()->id)->total(), 2, ".", ",") }}</li>
@endif