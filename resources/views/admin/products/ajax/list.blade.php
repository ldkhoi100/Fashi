<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14.5px;">
        <thead>
            <tr>
                <th>#</th>
                <th width='17%'>Name</th>
                <th width='1%'>Description</th>
                <th width='8%'>Size</th>
                <th>Cost</th>
                <th>Sale</th>
                <th>Image</th>
                <th>Highlight</th>
                <th>New</th>
                <th>Review</th>
                <th width='8%'>User created</th>
                <th width='8%'>User updated</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th width='17%'>Name</th>
                <th width='1%'>Description</th>
                <th width='8%'>Size</th>
                <th>Cost</th>
                <th>Sale</th>
                <th>Image</th>
                <th>Highlight</th>
                <th>New</th>
                <th>Review</th>
                <th width='8%'>User created</th>
                <th width='8%'>User updated</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($products as $key => $product)

            <tr>
                <td>{{ ++$key }}</td>

                <td><a href="{{ route('getDetailProductMen', $product->id) }}" target="_blank" style="color: #8B0000"><b
                            style="color: #8B0000">{{ $product->name }}</b></a>
                    <br><br>
                    <b style="float: right; font-size: 12px">{{ $product->objects->name }} -
                        {{ $product->categories->name }}</b>
                </td>

                <td><button data-url="{{ route('product.show',$product->id) }}" ​ type="button" data-target="#show"
                        data-toggle="modal" class="btn btn-info btn-show btn-sm">Detail</button> <br><br>
                    <a href="{{ route('product.qtySizeGet', $product->id) }}"
                        class="btn btn-warning btn-sm">Quantity</a>
                </td>

                <td>
                    @foreach ($product->size_product as $size)
                    {{ $size->size->name }}:
                    <span>
                        @if($size->quantity < 1) <b style="color:#DC143C">
                            {{ $size->quantity }}</b><br>
                            @elseif($size->quantity < 11) <b style="color:orange">
                                {{ $size->quantity }}</b><br>
                                @else
                                <b style="color:blue">{{ $size->quantity }}</b><br>
                                @endif
                                @endforeach
                    </span>

                    <span>Total:
                        <b>{{ $product->size_product->sum('quantity') }}</b></span>
                </td>

                <td><b style="color: #ee4d2d">${{ number_format($product->unit_price, 2) }}</b></td>

                <td><b style="color: #ee4d2d">${{ number_format($product->promotion_price, 2) }}</b></td>

                <td style="padding: 5px;"><img src="img/products/{{ $product->image1 }}" alt="" srcset="" width="70px">
                </td>

                @if($product->highlight == 1)
                <td><a href="javascript:void(0);" onclick="changeHighlight({{ $product->id }})"
                        style="color:#32CD32; font-weight: bold">Yes</a>
                </td>

                @else

                <td><a href="javascript:void(0);" onclick="changeHighlight({{ $product->id }})"
                        style="color:red; font-weight: bold">No</a>
                </td>

                @endif

                @if($product->new == 1)
                <td><a href="javascript:void(0);" style="color:#32CD32; font-weight: bold"
                        onclick="changeNew({{ $product->id }})">Yes</a>
                </td>

                @else

                <td><a href="javascript:void(0);" style="color:red; font-weight: bold"
                        onclick="changeNew({{ $product->id }})">No</a>
                </td>

                @endif

                <td><a href="{{ route('reivew.show', $product->id) }}">
                        <b>
                            Total: {{ count($product->reviews) }} <br><br>
                            {{ number_format($product->reviews->avg('rating'), 1) }} <i class="fa fa-star"
                                style="color: #FAC451"></i>
                        </b>
                    </a>
                </td>

                <td><b style="color:orange">{{ $product->user_created }}</b> <br>
                    {{ date("y-m-d, H:i:s",strtotime($product->created_at)) }}
                </td>

                <td><b style="color:purple">{{ $product->user_updated }}</b> <br>
                    {{ date("y-m-d, H:i:s",strtotime($product->updated_at)) }}
                </td>

                <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit" title="Edit"></i></a>
                </td>
                <td>
                    {{-- <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                    id="my-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Do you want delete product {{$product->name}} ?')"
                        class="btn btn-danger btn-sm" id="btn-submit" style="border: none"><i
                            class="fa fa-backspace"></i></button>
                    </form> --}}
                    <a href="javascript:void(0);" id="btn-submit" onclick="deleteProduct({{ $product->id }})" class="btn
                        btn-danger btn-sm"><i class="fa fa-backspace"></i></a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>