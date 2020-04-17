<div class="container-fluid" id="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('coupons.index') }}" class="btn btn-primary">Home page coupons</a>

        <a href="{{ route('coupons.delete-all') }}" class="btn btn-danger float-right"
            onclick="return confirm('Do you want destroy all? All data can\'t be restore!')">Delete all</a>

        <a href="{{ route('coupons.restore-all') }}" class="btn btn-warning float-right mr-2"
            onclick="return confirm('Do you want restore all data?')">Restore all</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Garbage can</h6>
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
                            <th>User deleted</th>
                            <th>Edit</th>
                            <th>Restore</th>
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
                            <th>User deleted</th>
                            <th>Edit</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($coupons as $key => $coupons)

                        <tr>

                            <td>{{ ++$key }}</td>
                            <td>{{ $coupons->id_coupon }}</td>
                            <td><b style="color:blue">{{ $coupons->discount }}%</b></td>

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

                            <td><b style="color:orange">{{ $coupons->user_used }}</b></td>

                            <td><b style="color:purple">{{ $coupons->user_deleted }}</b> <br> {{ $coupons->deleted_at }}
                            </td>

                            <td><a href="{{ route('coupons.edit', $coupons->id) }}" class="btn btn-info">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>

                            <td><a href="{{ route('coupons.restore', $coupons->id) }}" class="btn btn-warning"
                                    onclick="return confirm('Do you want restore coupons {{ $coupons->name }}?')">
                                    <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('coupons.delete', $coupons->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Do you want destroy coupons {{ $coupons->name }}?')">
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