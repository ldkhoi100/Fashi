@extends('admin.layouts')

@section('title', 'Garbage can contact')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('contacts.index') }}" class="btn btn-primary">Home page contact</a>

        <a href="{{ route('contacts.delete-all') }}" class="btn btn-danger float-right"
            onclick="return confirm('Do you want destroy all? All data can\'t be restore!')">Delete all</a>

        <a href="{{ route('contacts.restore-all') }}" class="btn btn-warning float-right mr-2"
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
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width='40%'>Message</th>
                            <th>User deleted</th>
                            <th>Restore</th>
                            <th>Destroy</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width='40%'>Message</th>
                            <th>User deleted</th>
                            <th>Restore</th>
                            <th>Destroy</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($contact as $key => $contact)

                        <tr>
                            <td>{{ ++$key }}</td>

                            <td>{{ $contact->name }}</td>

                            <td>{{ $contact->email }}</td>

                            <td>{{ $contact->message }}</td>

                            <td><b style="color:orange">{{ $contact->user_deleted }}</b> <br>
                                {{ date("y-m-d, H:i:s",strtotime($contact->deleted_at)) }}
                            </td>

                            <td><a href="{{ route('contacts.restore', $contact->id) }}" class="btn btn-warning"
                                    onclick="return confirm('Do you want restore contact {{ $contact->link }}?')">
                                    <i class="far fa-window-restore" aria-hidden="true" title="Restore"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('contacts.delete', $contact->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Do you want destroy contact {{ $contact->link }}?')">
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