<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 14px;">
        <thead>
            <tr>
                <th>#</th>
                <th>Id Bill</th>
                <th width='13%'>Customer</th>
                <th>Detail</th>
                <th width='10%'>Date Order</th>
                <th>Total</th>
                <th width='10%'>Payment</th>
                <th>Pay Money</th>
                <th width='1%'>Status</th>
                <th width='1%'>Bill Detail</th>
                <th width='10%'>User Updated</th>
                <th width='1%'>Edit</th>
                <th width='1%'>Delete</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Id Bill</th>
                <th width='13%'>Customer</th>
                <th>Detail</th>
                <th width='10%'>Date Order</th>
                <th>Total</th>
                <th width='10%'>Payment</th>
                <th>Pay Money</th>
                <th width='1%'>Status</th>
                <th width='1%'>Bill Detail</th>
                <th width='10%'>User Updated</th>
                <th width='1%'>Edit</th>
                <th width='1%'>Delete</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($bills as $key => $bills)
            <tr>
                <td>{{ ++$key }}</td>
                <td @if($bills->cancle == 1) style="text-decoration: line-through;" @endif>{{ $bills->id }}
                </td>

                <td>{{ $bills->customers->id }} - {{ $bills->customers->name }} <br>
                    @if($bills->cancle == 1)
                    <b style="color: white; border-radius: 3px; padding: 3px 7px; background: #ff4d4d;">Cancelled</b>
                    @endif
                </td>

                <td><button data-url="{{ route('bills.show',$bills->id) }}" ​ type="button" data-target="#showbills"
                        data-toggle="modal" class="btn btn-info btn-show btn-sm">Detail</button></td>
                <td>{{ $bills->date_order }}</td>

                <td><span
                        style="color: white; border-radius: 3px; padding: 3px 5px; background: #ff9900; font-weight: bold; font-size: 13.5px;">
                        ${{ number_format($bills->total, 2) }}
                    </span>
                </td>

                <td>{{ $bills->payment }}</td>

                @if($bills->pay_money == 1)
                <td><a href="javascript:void(0);" onclick="changePaymoney({{ $bills->id }})" class="ajax_link"
                        style="color:#32CD32; font-weight: bold">Paid</a>
                </td>
                @else
                <td><a href="javascript:void(0);" onclick="changePaymoney({{ $bills->id }})" class="ajax_link"
                        style="color:red; font-weight: bold">Not
                        paid</a>
                </td>
                @endif
                @if($bills->status == 1)
                <td><a href="javascript:void(0);" onclick="changeStatus({{ $bills->id }})"
                        style="color:#32CD32; font-weight: bold">Complete</a>
                </td>
                @else
                <td><a href="javascript:void(0);" onclick="changeStatus({{ $bills->id }})"
                        style="color:red; font-weight: bold;">Uncomplete</a>
                </td>
                @endif

                <td align="center"><a href="{{ route('bills.details', $bills->id) }}"
                        style="color:blue; font-weight: bold; font-size:20px;">{{ count($bills->bill_detail) }}</a>
                </td>

                <td><b style="color:purple">{{ $bills->user_updated }}</b> <br> {{ $bills->updated_at }}
                </td>
                <td><a href="{{ route('bills.edit', $bills->id) }}" class="btn btn-info btn-sm">
                        <i class="fa fa-edit" title="Edit"></i></a>
                </td>
                <td>
                    <a href="javascript:void(0);" onclick="deletebills({{ $bills->id }})" class="btn btn-danger btn-sm"
                        class="ajax_link"><i class="fa fa-backspace"></i></a>
                </td>
            </tr>

            @endforeach

        </tbody>
    </table>
</div>