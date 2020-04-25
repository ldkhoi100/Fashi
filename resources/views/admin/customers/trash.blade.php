@extends('admin.layouts')

@section('title', 'Garbage can customers')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('customers.index') }}" class="btn btn-primary">Home page customers</a>

        {{-- <a href="{{ route('customers.delete-all') }}" class="btn btn-danger float-right"
        onclick="return confirm('Do you want destroy all? All data can\'t be restore!')">Delete all</a>

        <a href="{{ route('customers.restore-all') }}" class="btn btn-warning float-right mr-2"
            onclick="return confirm('Do you want restore all data?')">Restore all</a> --}}
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
                            <th>Username</th>
                            <th>Name</th>
                            <th>Order number</th>
                            <th>Email</th>
                            <th width='15%'>Address</th>
                            {{-- <th>Postcode</th>
                            <th>City</th> --}}
                            {{-- <th>Country</th> --}}
                            <th>Phone</th>
                            <th width='15%'>User deleted</th>
                            <th>Edit</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Order number</th>
                            <th>Email</th>
                            <th width='15%'>Address</th>
                            {{-- <th>Postcode</th>
                            <th>City</th> --}}
                            {{-- <th>Country</th> --}}
                            <th>Phone</th>
                            <th width='15%'>User deleted</th>
                            <th>Edit</th>
                            <th>Restore</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($customers as $key => $customers)

                        <tr>

                            <td>{{ ++$key }}</td>
                            <td>{{ $customers->username }}</td>
                            <td>{{ $customers->name }}</td>

                            <td>{{ count($customers->bills_trash) }}</td>

                            <td>{{ $customers->email }}</td>
                            <td>{{ $customers->address }}</td>
                            {{-- <td>{{ $customers->postcode }}</td>
                            <td>{{ $customers->city }}</td> --}}
                            {{-- <td>{{ $customers->country }}</td> --}}
                            <td>+84 {{ $customers->phone }}</td>

                            <td><b style="color:purple">{{ $customers->user_updated }}</b> <br>
                                {{ $customers->updated_at }}
                            </td>

                            <td><a href="{{ route('customers.edit', $customers->id) }}" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>
                            </td>

                            <td><a href="{{ route('customers.restore', $customers->id) }}"
                                    class="btn btn-warning btn-sm"
                                    onclick="return confirm('Do you want restore customers {{ $customers->name }}?')">
                                    <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('customers.delete', $customers->id) }}" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Do you want destroy customers {{ $customers->name }}?')">
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