@extends('admin.layouts')

@section('title', 'Bills')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('bills.details', $id_bills->id) }}" class="btn btn-primary">Home page bills</a>

        <a href="{{ route('billDetail.delete-all') }}" class="btn btn-danger float-right"
            onclick="return confirm('Do you want destroy all? All data can\'t be restore!')">Delete all</a>

        <a href="{{ route('billDetail.restore-all') }}" class="btn btn-warning float-right mr-2"
            onclick="return confirm('Do you want restore all data?')">Restore all</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Garbage of bills details of code bills
                {{ $id_bill_detail->id_bill }}</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body" id="tableProducts">
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
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@push('show-ajax')

<script>
    function restoreProducts(id) {
        var conf = confirm("Do you want restore this bill detail?");
        $.ajax({
            url : 'billDetail/restore/'+id,
            type : 'get' 
        }).done(function(res){
            if(conf) {
                $('#tableProducts').empty();
                $('#tableProducts').html(res);
                toastr.success('This product restore bill detail');
                $("#dataTable").dataTable();
            }
        });
    }

    function deleteProducts(id) {
        var conf = confirm("Do you want delete this bills detail?");
        $.ajax({
            url : 'billDetail/delete/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true) {
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.warning("This bills detail destroy");
            }
        })
    }
    
    function changeStatus(id) {
        var conf = confirm("Do you want change status of this bills detail?");
        $.ajax({
            url : 'bills/detail/status/trash/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true){
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.success("Change status of this bills detail success");
            }
        });
    }
</script>

@endpush