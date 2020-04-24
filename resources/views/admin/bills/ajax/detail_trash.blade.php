<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13.5px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Id product</th>
                <th>Name product</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Discount</th>
                <th>Total price</th>
                <th>Status</th>
                <th>User deleted</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Destroy</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Id product</th>
                <th>Name product</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Unit price</th>
                <th>Discount</th>
                <th>Total price</th>
                <th>Status</th>
                <th>User deleted</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Destroy</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($bill_detail as $key => $bills)

            <tr style="font-weight: bold;">
                <td>{{ ++$key }}</td>

                <td><a href="{{ url('/shop/detail/' . Str::slug($bills->products->name)) }}"
                        target="_blank">{{ $bills->id_product }}</a>
                </td>

                <td><a href="{{ url('/shop/detail/' . Str::slug($bills->products->name)) }}" target="_blank"
                        style="color: #8B0000;">{{ $bills->products->name }}</a> <br>
                    @if($bills->cancle == 1)
                    <span
                        style="color: white; border-radius: 3px; padding: 3px 7px; background: #ff4d4d;">Cancelled</span>
                    @endif
                </td>

                <td>{{ $bills->size }}</td>

                <td>{{ $bills->quantity }}</td>
                <td><span
                        style="color: white; border-radius: 3px; padding: 3px 5px; background: #3385ff; font-weight: bold; font-size: 13.5px;">
                        ${{ number_format($bills->unit_price, 2) }}
                    </span>
                </td>

                @if($bills->discount > 0)
                <td>{{ $bills->discount }}%</td>
                @else
                <td>0%</td>
                @endif

                <td><span
                        style="color: white; border-radius: 3px; padding: 3px 5px; background: #ff9900; font-weight: bold; font-size: 13.5px;">
                        ${{ number_format($bills->total_price, 2) }}
                    </span>
                </td>

                @if($bills->status == 1)
                <td><a href="javascript:void(0);" onclick="changeStatus({{ $bills->id }})"
                        style="color:#32CD32; font-weight: bold">Complete</a>
                </td>
                @else
                <td><a href="javascript:void(0);" onclick="changeStatus({{ $bills->id }})"
                        style="color:red; font-weight: bold">Uncomplete</a>
                </td>
                @endif

                <td><b style="color:orange">{{ $bills->user_deleted }}</b> <br> {{ $bills->deleted_at }}
                </td>

                <td>
                    <a href="{{ route('billDetail.edit', $bills->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit" title="Edit"></i>
                    </a>
                </td>

                <td><a href="javascript:void(0);" class="btn btn-warning btn-sm"
                        onclick="restoreProducts({{ $bills->id }})">
                        <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
                </td>

                <td>
                    <a href="javascript:void(0);" class="btn btn-danger btn-sm"
                        onclick="deleteProducts({{ $bills->id }})">
                        <i class="fa fa-minus-circle" title="Destroy"></i>
                    </a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>