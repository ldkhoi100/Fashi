@extends('fashi.layouts')

@section('title', 'Confirm Reset Password')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Confirm Reset Password</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<div class="container" style="margin: 90px 200px;">
    <div class="row justify-content-center">
        <span style="font-weight: bold; color: #666666">If you have lost your password, enter the email below and a
            link will be sent to your email</span> <br><br>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reset Your Password</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" id="my-form5">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="btn-submit5">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('clicked')

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form5").submit(function (e) {
            $("#btn-submit5").attr("disabled", true);
		    $("#btn-submit5").addClass('button-clicked');
            return true;
        });
    });
</script>

@endpush