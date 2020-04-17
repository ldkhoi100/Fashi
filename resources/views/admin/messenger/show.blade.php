@extends('admin.layouts')

@section('title', 'Message')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('partials.message')

    <!-- Page Heading -->
    <div class="row">
        <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('mailbox') }}"
                style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Mailbox</a>
        </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    @if(empty($messenger->user1->image))
                    <img src="img/user/{{ $messenger->user1->image }}" alt="image" class="img-profile rounded-circle"
                        style="width: 2.5rem; height: 2.5rem; float: left; margin-right: 15px">
                    @else
                    <label class="icon-circle bg-warning" style="float: left; margin-right: 15px">
                        <i class="fas fa-comments text-black-50"></i>
                    </label>
                    @endif
                    <h6 class="m-0 font-weight-bold text-primary" style="float: left">{{ $messenger->title }}</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        {!! $messenger->message !!}
                        <br><br>
                        <button type="button" class="btn btn-primary proceed-btn" style="margin-top: 5px;"
                            data-toggle="modal" data-target="#exampleModal1">
                            Reply
                        </button>
                        <i style="float:right">
                            <span>Sent at: {{ date_format($messenger->created_at, "d-m-y, H:i:s") }}</span><br>
                            <span>User: {{ $messenger->user1->username }} - {{ $messenger->user1->name }}</span>
                        </i>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>

<!-- Modal reply -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reply to {{ $messenger->user1->username }} -
                    RE:{{ $messenger->title }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('reply.message') }}" class="coupon-form" method="POST" id="my-form">
                @csrf
                <input type="hidden" value="{{ $messenger->user1->id }}" name="username">
                <input type="hidden" value="RE:{{ $messenger->title }}" name="title">
                <input type="hidden" value="{{ $messenger->user1->username }}" name="name_username">
                <div class="modal-body">
                    Message: <br>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                        id="description" required>{!! old('description') !!}</textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning" width="25%" id="btn-submit"
                        style="border: none">Apply</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection

@push('ckeditor-js')
<!-- CK editor 4 installed-->
<script src="ckeditor/ckeditor.js"></script>
<script>
    // Script Ckeditor 4
    CKEDITOR.replace("description");
</script>
@endpush