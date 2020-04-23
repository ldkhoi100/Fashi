@extends('admin.layouts')

@section('title', 'Products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create new product</a>
        <a href="{{ route('product.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of products</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body" id="tableProducts">
            @include('admin.products.ajax.list')
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection

@push('show-ajax')
<script>
    function changeHighlight(id) {
        var conf = confirm("Do you want change?");
        $.ajax({
            url : '/highlight/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true) {
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.success("Change highlight success");
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
                                $('h1#descriptor').html(response.data.description)
                                $('span#last_updated').html("Last updated: " + response.data.updated_at.substring(0,19))
                                $('span#user_created').html("User created: " + response.data.user_created)
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

    function changeNew(id) {
        var conf = confirm("Do you want change?");
        $.ajax({
            url : '/new/'+id,
            type : 'GET'
        }).done(function(response) {
            if(response.status == 'error') {
                toastr.warning(response.msg);
            } else if(conf == true){
                $("#tableProducts").empty();
                $("#tableProducts").html(response);
                $("#dataTable").dataTable();
                toastr.success("Change new success");
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
                                $('h1#descriptor').html(response.data.description)
                                $('span#last_updated').html("Last updated: " + response.data.updated_at.substring(0,19))
                                $('span#user_created').html("User created: " + response.data.user_created)
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
                    $('h1#descriptor').html(response.data.description)
                    $('span#last_updated').html("Last updated: " + response.data.updated_at.substring(0,19))
                    $('span#user_created').html("User created: " + response.data.user_created)
                    $('span#user_updated').html("User updated: " + response.data.user_updated)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
    });
</script>

<script>
    function deleteProduct(id) {
        var conf = confirm("Do you want delete this product?");
        $.ajax({
            url : 'product/destroy/'+id,
            type : 'get' 
        }).done(function(res){
            if(conf) {
                $('#tableProducts').empty();
                $('#tableProducts').html(res);
                toastr.warning('Delete success');
                $("#dataTable").dataTable();
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
                                $('h1#descriptor').html(response.data.description)
                                $('span#last_updated').html("Last updated: " + response.data.updated_at.substring(0,19))
                                $('span#user_created').html("User created: " + response.data.user_created)
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

@endpush