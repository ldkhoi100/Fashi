@extends('admin.layouts')

@section('title', 'Customers')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back home</a>
        <a href="{{ route('customers.trash') }}" class="btn btn-danger" style="float:right">Garbage can</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List of customers</h6>
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
                            <th width='10%'>Email</th>
                            <th width='15%'>Address</th>
                            {{-- <th>Postcode</th>
                            <th>City</th> --}}
                            {{-- <th>Country</th> --}}
                            <th>Phone</th>
                            <th width='15%'>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Order number</th>
                            <th width='10%'>Email</th>
                            <th width='15%'>Address</th>
                            {{-- <th>Postcode</th>
                            <th>City</th> --}}
                            {{-- <th>Country</th> --}}
                            <th>Phone</th>
                            <th width='15%'>User updated</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($customers as $key => $customers)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $customers->username }}</td>
                            <td>{{ $customers->name }}</td>

                            <td>{{ count($customers->bills) }}</td>

                            <td>{{ $customers->email }}</td>
                            <td>{{ $customers->address }}</td>
                            {{-- <td>{{ $customers->postcode }}</td>
                            <td>{{ $customers->city }}</td> --}}
                            {{-- <td>{{ $customers->country }}</td> --}}
                            <td>+84 {{ $customers->phone }}</td>

                            <td><b style="color:purple">{{ $customers->user_updated }}</b> <br>
                                {{ $customers->updated_at }}
                            </td>

                            <td><a href="{{ route('customers.edit', $customers->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Edit"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('customers.destroy', $customers->id) }}" method="POST"
                                    id="my-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Do you want delete customers {{$customers->name}} ?')"
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

@endsection