@extends('admin.layouts')

@section('title', 'Coupons')

@section('content')

<style>
    .container-fluid {
        padding-right: 16px;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        {{-- <a href="{{ route('coupons.create') }}" class="btn btn-primary">Create new coupons</a> --}}
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
            Create new coupons
        </button>
        <a href="{{ route('coupons.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of coupons</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Id coupons</th>
                            <th>Discount</th>
                            <th>Used</th>
                            <th>User used</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Id coupons</th>
                            <th>Discount</th>
                            <th>Used</th>
                            <th>User used</th>
                            <th>User created</th>
                            <th>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($coupons as $key => $coupons)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $coupons->id_coupon }}</td>
                            <td>{{ $coupons->discount }}%</td>

                            {{-- <td class="used">
                                <a href="javascript:void(0);" data-id="{{ $coupons->id }}">{{ $coupons->used }}</a>
                            </td> --}}

                            @if($coupons->used == 1)
                            <td class="used"><a href="javascript:void(0);" data-id="{{ $coupons->id }}"
                                    style="color:#32CD32; font-weight: bold;"
                                    onclick="return confirm('Do you want change used column of this coupon to no?')">Yes</a>
                            </td>
                            @else
                            <td class="used"><a href="javascript:void(0);" data-id="{{ $coupons->id }}"
                                    style="color:red; font-weight: bold;"
                                    onclick="return confirm('Do you want change used column of this coupon to yes?')">No</a>
                            </td>
                            @endif

                            <td>{{ $coupons->user_used }}</td>

                            <td><b style="color:orange">{{ $coupons->user_created }}</b> <br> {{ $coupons->created_at }}
                            </td>

                            <td><b style="color:purple">{{ $coupons->user_updated }}</b> <br> {{ $coupons->updated_at }}
                            </td>

                            <td><a href="{{ route('coupons.edit', $coupons->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('coupons.destroy', $coupons->id) }}" method="POST" id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete coupons {{$coupons->name}} ?')"
                                        class="btn btn-danger btn-sm" id="btn-submit" style="border: none"><i
                                            class="fa fa-backspace"></i></button>
                                </form>
                            </td>
                        </tr>

                        @endforeach

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLongTitle" style="color:blue;">Create
                                            coupons
                                        </h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    {{-- <form action="{{ route('coupons.store') }}" method="POST"> --}}
                                    {{-- @csrf --}}
                                    <div class="modal-body">
                                        <p>
                                            <b>Enter the number of discount codes:</b>
                                            <input type="number" id="number_code" class="form-control" min="0"
                                                name="number_coupons">
                                        </p>
                                        <p>
                                            <b>Enter the discount percentage: (%)</b>
                                            <input type="number" id="percent_code" class="form-control" min="0"
                                                name="discount">
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <a href="javascript:void(0);" onclick="createCoupon()"><button type="button"
                                                class="btn btn-primary">Save
                                                changes</button></a>
                                    </div>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </div>
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
    //used or not use
    $(".container-fluid").on("click", ".used a", function(){
        $.ajax({
            url : 'used-coupons/'+ $(this).data("id"),
            type : 'GET',
        }).done(function(response){
            $(".container-fluid").empty();
            $(".container-fluid").html(response);
            $('#dataTable').DataTable();
            toastr.success("Update coupons success");
        });
    });
</script>
<script>
    //Add coupons
    function createCoupon(){
        let number_code = document.getElementById('number_code').value;
        let percent_code = document.getElementById('percent_code').value;
        $.ajax({
            url : "/create-coupons/"+number_code+'/'+percent_code,
            type : "GET"
        }).done(function(response){
            if(response.status == "error") {
                toastr.warning(response.msg);
            } else if(response.status == "percent") {
                toastr.warning(response.msg2);
            } else {    
                $(".container-fluid").empty();
                $(".container-fluid").html(response);
                $('#dataTable').DataTable();
                $('body').removeClass('modal-open');
                toastr.success("Create coupons success");
            }
        });
    }
</script>

@endpush