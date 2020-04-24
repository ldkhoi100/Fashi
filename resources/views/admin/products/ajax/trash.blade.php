<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
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
                <th>User deleted</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Destroy</th>
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
                <th>User deleted</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Destroy</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($products as $key => $product)

            <tr>
                <td>{{ ++$key }}</td>

                <td><a href="{{ url('/shop/detail/' . Str::slug($product->name)) }}" target="_blank"
                        style="color: #8B0000"><b style="color: #8B0000">{{ $product->name }}</b></a>
                    <br><br>
                    <b style="float: right; font-size: 12px">{{ $product->objects->name }} -
                        {{ $product->categories->name }}</b>
                </td>

                <td><button data-url="{{ route('product.show',$product->id) }}" ​ type="button" data-target="#show"
                        data-toggle="modal" class="btn btn-info btn-show btn-sm">Detail</button> <br><br>
                    <a href="{{ route('product.qtySizeGet', $product->id) }}" class="btn btn-warning btn-sm">Stock</a>
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

                <td style="padding: 5px;"><img src="img/products/{{ $product->image1 }}" alt="" srcset="" width="75px">
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

                <td><b style="color:orange">{{ $product->user_deleted }}</b> <br>
                    {{ date("y-m-d, H:i:s",strtotime($product->deleted_at)) }}
                </td>

                <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm"><i
                            class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                </td>

                <td><a href="{{ route('product.restore', $product->id) }}" class="btn btn-warning btn-sm"
                        onclick="return confirm('Do you want restore product {{ $product->name }}?')">
                        <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
                </td>

                <td>
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                        onclick="deleteProducts({{ $product->id }})">
                        <i class="fa fa-minus-circle" title="Destroy"></i>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>