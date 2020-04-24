<!-- Card Body -->
<div class="card-body" id="tablesave">
    <p style="color:orange; font-size:16px; font-weight: bold">
        <span style="color:#8B0000;">Out of stock: {{ $outOfStock }} </span><br>
        Out of stock soon: {{ $leftQuantity }}</p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
        style="font-size: 14px; margin: auto">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Views</th>
                <th width='15.2%'>Sold out</th>
                <th>Quantity</th>
                @if(!Auth::check())
                @elseif(Auth::user()->username == "ldkhoi97")
                <th>Update(+/-)</th>
                <th>Edit</th>
                @endif
            </tr>
        </thead>

        <tbody>
            <?php $i = 0 ?>
            @foreach ($products as $key => $products)

            <tr>
                <td>{{ ++$key }}</td>
                <td><b><a href="{{ url('/shop/detail/' . Str::slug($products->name)) }}" style="color:#8B0000;"
                            target="_blank">{{ $products->name }}
                        </a><br><span
                            style="color: #b2b2b2; font-size: 11px; float: right">{{ $products->categories->name }}
                            - {{ $products->objects->name }}</span></b>
                </td>
                <td align="center"><b
                        style="color: white; border-radius: 3px; padding: 3px 7px; background: #40E0D0">{{ $products->view_count }}</b>
                </td>
                <td align="center"><b
                        style="color: white; border-radius: 3px; padding: 3px 7px; background: #f6c23e">{{ $number_sold_out[$i] }}</b>
                </td>
                <td align="center">
                    @if($products->amount < 1) <b
                        style="color: white; border-radius: 3px; padding: 3px 7px; background: #DC143C">
                        {{ $products->amount }}</b>
                        @elseif($products->amount < 11) <b
                            style="color: white; border-radius: 3px; padding: 3px 7px; background: #FF7F50">
                            {{ $products->amount }}</b>
                            @else
                            <b
                                style="color: white; border-radius: 3px; padding: 3px 7px ; background: #6495ED">{{ $products->amount }}</b>
                            @endif
                </td>

                @if(!Auth::check())
                @elseif(Auth::user()->username == "ldkhoi97")

                {{--  <form action="{{ route('add.quantity', $products->id) }}" method="POST"> --}}
                {{--  @csrf  --}}
                <td><input type="number" class="form-control" max="99999" id="quantity{{ $products->id }}"
                        name="quantity" placeholder="Qty"></td>

                <td class="addquantity">
                    <a href="javascript:void(0);" class="btn btn-info btn-circle btn-sm">
                        <i class="fas fa-plus-circle fa-lg" data-id="{{ $products->id }}"></i>
                    </a>
                </td>

                {{--  </form>  --}}

                @endif

            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>

    </table>

</div>