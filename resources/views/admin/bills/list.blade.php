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

        <div class="card-body" id="tableProducts">
            @include('admin.bills.ajax.bills_list')
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@include('admin.bills.detail')
@endsection

@push('show-ajax')

<script>
    function deletebills(id) {
        var conf = confirm("Do you want delete this bills?");
        $.ajax({
            url : 'bills/delete/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true) {
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.warning("This bills deleted");
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
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
            }
        })
    }

    function changePaymoney(id) {
        var conf = confirm("Do you want change pay money of this bills?");
        $.ajax({
            url : 'bills/paymoney/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true) {
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.success("Change pay money of this bills success");
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
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
            }
        })
    }

    function changeStatus(id) {
        var conf = confirm("Do you want change status of this bills?");
        $.ajax({
            url : 'bills/status/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true){
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.success("Change status of this bills success");
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
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
            }
        });
    }
</script>

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