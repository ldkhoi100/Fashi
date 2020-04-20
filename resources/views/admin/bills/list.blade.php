@extends('admin.layouts')

@section('title', 'Bills')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Home</a>
        <a href="{{ route('bills.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of bills</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14px;">
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
                                <b
                                    style="color: white; border-radius: 3px; padding: 3px 7px; background: #ff4d4d;">Cancelled</b>
                                @endif
                            </td>

                            <td><button data-url="{{ route('bills.show',$bills->id) }}" ​ type="button"
                                    data-target="#showbills" data-toggle="modal"
                                    class="btn btn-info btn-show btn-sm">Detail</button></td>
                            <td>{{ $bills->date_order }}</td>

                            <td><span
                                    style="color: white; border-radius: 3px; padding: 3px 5px; background: #ff9900; font-weight: bold; font-size: 13.5px;">
                                    ${{ number_format($bills->total, 2) }}
                                </span>
                            </td>

                            <td>{{ $bills->payment }}</td>

                            @if($bills->pay_money == 1)
                            <td><a href="{{ route('bills.pay_money', $bills->id) }}" class="ajax_link"
                                    style="color:#32CD32; font-weight: bold"
                                    onclick="return confirm('Do you want change pay money column of this bills to not paid?')">Paid</a>
                            </td>
                            @else
                            <td><a href="{{ route('bills.pay_money', $bills->id) }}" class="ajax_link"
                                    style="color:red; font-weight: bold"
                                    onclick="return confirm('Do you want change pay money column of this bills to paid?')">Not
                                    paid</a>
                            </td>
                            @endif
                            @if($bills->status == 1)
                            <td><a href="{{ route('bills.status', $bills->id) }}"
                                    style="color:#32CD32; font-weight: bold"
                                    onclick="return confirm('Do you want change status column of this bills to Uncomplete?')">Complete</a>
                            </td>
                            @else
                            <td><a href="{{ route('bills.status', $bills->id) }}" style="color:red; font-weight: bold;"
                                    onclick="return confirm('Do you want change status column of this bills to complete?')">Uncomplete</a>
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
                                <form action="{{ route('bills.destroy', $bills->id) }}" method="POST" id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete bills {{$bills->name}} ?')"
                                        class="btn btn-danger btn-sm" id="btn-submit" style="border: none"><i
                                            class="fa fa-backspace"></i></button>
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
@include('admin.bills.detail')
@endsection

@push('show-ajax')
{{-- @csrf ajax--}}
<meta name="csrf-token" content="{{ csrf_token() }}">​
<script type="text/javascript" charset="utf-8">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
</script>
<script>
    $(document).ready(function () {
        $('.btn-show').click(function(){
            var url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    // console.log(response)
                    $('h4#name').html(response.data.name)
                    $('h1#descriptor').html("Id customer: " + response.data.id)
                    $('span#username').html("Username: " + response.data.username)
                    $('span#name').html("Name: " + response.data.name)
                    $('span#email').html("Email: " + response.data.email)
                    $('span#address').html("Address: " + response.data.address)
                    $('span#postcode').html("Post code: " + response.data.postcode)
                    $('span#city').html("City: " + response.data.city)
                    $('span#country').html("Country: " + response.data.country)
                    $('span#phone').html("Phone: +84 " + response.data.phone)

                    $('span#last_updated').html("Last updated: " + response.data.updated_at.substring(0,19))
                    $('span#user_updated').html("User updated: " + response.data.user_updated)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
    });
</script>
@endpush