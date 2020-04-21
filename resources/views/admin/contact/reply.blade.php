@extends('admin.layouts')

@push('select2-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('title', 'Reply Contacts')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('contacts.index') }}"
                    style="text-decoration: none; color: purple"><i class="fa fa-chevron-left"></i> Back contact</a>
            </h1>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800"><a href="{{ route('contacts.trash') }}"
                    style="text-decoration: none; color: purple">Garbage can <i class="fa fa-chevron-right"></i></a>
            </h1>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-edit"></i> Reply email from
                        <span style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">
                            {{ $contact->email }}
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('contacts.reply.post', $contact->id) }}" id="my-form">
                            @csrf

                            @include('partials.message')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Mail to: </label>

                                <span
                                    style="font-weight: bold; border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">
                                    {{ $contact->email }}
                                </span>

                            </div>

                            <div class="form-group @error('message') has-error has-feedback @enderror">

                                <label>Message</label>

                                <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                    rows="10" required></textarea>

                            </div>

                            <button type="submit" class="btn btn-primary" id="btn-submit" style="border: none">
                                Reply Mail</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle
                            </button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
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

@push('select2-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#size').select2({
            placeholder: "Select size"
        });
    });
</script>
@endpush