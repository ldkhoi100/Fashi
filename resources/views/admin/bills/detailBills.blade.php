@extends('admin.layouts')

@section('title', 'Bills')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('bills.index') }}" class="btn btn-primary">Home bills</a>
        @if(!empty($bills->id))
        <a href="{{ route('billDetail.trash', $bills->id) }}" class="btn btn-danger" style="float:right">Garbage
            can</a>
        @endif
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if(!empty($id_bill_detail))
            <h6 class="m-0 font-weight-bold text-primary">List of bills details of code bills
                {{ $id_bill_detail->id_bill }} - <span style="color:orange;">Total price:
                    ${{ number_format($total_price, 2) }}</span></h6>
            @endif
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 13.5px;">
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
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($bill_detail as $key => $bills)

                        <tr style="font-weight: bold;">
                            <td>{{ ++$key }}</td>

                            <td><a href="{{ route('getDetailProductMen', $bills->id_product) }}"
                                    target="_blank">{{ $bills->id_product }}</a></td>

                            <td><a href="{{ route('getDetailProductMen', $bills->id_product) }}" target="_blank"
                                    style="color: #8B0000; font-weight: bold">{{ $bills->products->name }}</a> <br>
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
                            <td><a href="{{ route('bills.statusDetailBills', $bills->id) }}"
                                    style="color:#32CD32; font-weight: bold"
                                    onclick="return confirm('Do you want change status column of this bills detail to Uncomplete?')">Complete</a>
                            </td>
                            @else
                            <td><a href="{{ route('bills.statusDetailBills', $bills->id) }}"
                                    style="color:red; font-weight: bold"
                                    onclick="return confirm('Do you want change status column of this bills detail to Complete?')">Uncomplete</a>
                            </td>
                            @endif

                            <td><b style="color:purple">{{ $bills->user_updated }}</b> <br> {{ $bills->updated_at }}
                            </td>
                            <td><a href="{{ route('billDetail.edit', $bills->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('billDetail.destroy', $bills->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete bills {{$bills->name}} ?')"
                                        class="btn btn-danger btn-sm"><i class="fa fa-backspace"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection