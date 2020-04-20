@foreach ($bill_order as $key=> $item)

<table style="margin-bottom: 22px;">
    <tbody style="margin: auto">

        <tr style="border-top: 0px">
            <td>
                <span style="color: #ee4d2d; float:left; margin-left: 30px; margin-top: 20px; font-size: 20px;">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </span>
            </td>
            <td></td>
            <td style="float:right; margin-right: 21px; margin-top: 15px; padding-bottom: 15px;">
                @if($item->cancle == 1)
                <span style="font-weight: bold; font-size: 16px; color: #ee4d2d">
                    <i class="fas fa-window-close fa-lg"></i> <span
                        style="color: white; border-radius: 3px; padding: 3px 7px; background: red">CANCELLED</span>
                </span>
                @elseif($item->status == 0)
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

        @foreach ($item->bill_detail as $bill)
        <tr>
            <td class="cart-pic first-row" width='6%' align="center">
                <img src={{ "img/products/" . $bill->products->image1 }} alt="" width='55px'>
            </td>

            <td class="cart-title first-row" @if($bill->cancle == 1)
                style="text-decoration: line-through; color: grey;"
                @endif>
                {{ $bill->products->name }} <br> x {{ $bill->quantity }} <br> Size:
                {{ $bill->size }}
            </td>
            <td class="cart-title first-row" style="float: right; margin-right: 25px">
                @if($bill->cancle == 1)
                <span class="price" style="text-decoration: line-through">
                    ${{ number_format($bill->total_price, 2, ".", ",") }}
                </span>
                @elseif($bill->discount > 0)
                <span class="totalprice">${{ number_format($bill->unit_price * $bill->quantity, 2, ".", ",") }}
                </span>
                <br>
                <span class="pricediscount">
                    ${{ number_format($bill->total_price, 2, ".", ",") }}
                </span>

                @else
                <span class="price">
                    ${{ number_format($bill->total_price, 2, ".", ",") }}
                </span>
                @endif
            </td>
        </tr>
        @endforeach

        <tr style="border-bottom: 0px">
            {{-- <td></td> --}}
            <td colspan="2" style="text-align: left; padding-left: 30px">Date order:
                {{ $bill->created_at }}
            </td>

            <td style="float:right; margin-right: 20px; margin-top: 15px; padding-bottom: 15px;">
                <span style="color: #ee4d2d"><i class="fas fa-money-check-alt fa-lg"></i></span>
                Total money: <span class="itemtotal" @if($item->cancle == 1)
                    style='text-decoration: line-through; color: grey;'
                    @endif>
                    <span style="font-size: 22px;">$</span>{{ number_format($item->total, 2, ".", ",") }}</span>
                <br>
                <span style="float: right; margin-top: 10px">
                    <a href="{{ route('find.bills', Crypt::encrypt($item->id)) }}" class="btn btn-outline-primary"
                        style="text-transform: capitalize;">
                        See invoice details
                    </a>
                </span>
            </td>
        </tr>

    </tbody>
</table>

@endforeach