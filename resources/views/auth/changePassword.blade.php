@extends('fashi.layouts')

@section('title', 'Change password')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Change password</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Change password</h2>
                    <form action="{{ route('details.store') }}" method="POST" id="my-form">
                        @csrf

                        <div class="form-input has-error has-feedback" style="margin-bottom: 20px">
                            <label for="password">Current Password</label>

                            <input id="password" type="password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                name="current_password" autocomplete="current-password">

                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-input has-error has-feedback" style="margin-bottom: 20px">
                            <label for="password">New Password</label>

                            <input id="new_password" type="password"
                                class="form-control @error('current_password') is-invalid @enderror" name="new_password"
                                autocomplete="current-password">

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-input has-error has-feedback" style="margin-bottom: 25px">
                            <label for="password">Confirm Password</label>

                            <input id="new_confirm_password" type="password"
                                class="form-control @error('new_confirm_password') is-invalid @enderror"
                                name="new_confirm_password" autocomplete="current-password">

                            @error('new_confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="site-btn login-btn" id="btn-submit" style="border: none">Change
                            password</button>
                    </form>

                    <div class="switch-login">
                        <a href="{{ route('register') }}" class="or-login">Cancle</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection

@push('clicked')

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form").submit(function (e) {
            $("#btn-submit").attr("disabled", true);
		  $("#btn-submit").addClass('button-clicked');
            return true;
        });
    });
</script>

@endpush