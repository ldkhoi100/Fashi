@foreach ($product as $product)

<div class="col-lg-4 col-sm-6">
    <div class="product-item">
        <div class="pi-pic">
            <img src={{ "img/products/" . $product->image1 }} alt="" @if($product->size_product->sum('quantity') <= 0)
                style='filter: blur(2px);
                        -webkit-filter: blur(2px);' @endif>

                @if($product->size_product->sum('quantity') <= 0) <div
                    style='color:white; background: red; font-weight: bold' class="sale pp-sale">
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
            @if(!Auth::user())
            <li class="w-icon active"><a href="{{ route('login') }}"><i class="fas fa-cart-arrow-down"></i></a>
            </li>
            @else
            @if($product->size_product->sum('quantity') > 0)
            <li class="w-icon active"><a href="{{ route('getDetailProductMen', $product->id) }}"><i
                        class="fas fa-cart-arrow-down"></i></a>
            </li>
            @endif
            @endif
            <li class="quick-view"><a href="{{ route('getDetailProductMen', $product->id) }}">+
                    Quick View</a>
            </li>
            <li class="w-icon"><a href="#"><i class="fas fa-heart" style="color: #D2691E"></i></a></li>
        </ul>
    </div>
    <div class="pi-text">
        <div class="catagory-name">{{ $product->categories->name }}</div>
        <a href="{{ route('getDetailProductMen', $product->id) }}">
            <h5>{{ $product->name }}</h5>
        </a>

        @if($product->size_product->sum('quantity') <= 0) <div class="product-price"
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