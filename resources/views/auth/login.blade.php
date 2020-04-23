@extends('fashi.layouts')

@section('title', 'Login')

@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Login</span>
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
                    <h2>Login</h2>
                    <form action="{{ route('login') }}" method="POST" id="my-form">
                        @csrf
                        <div class="group-input usernamedivlogin @error('username') has-error has-feedback @enderror">
                            <label for="username">Username or email address</label>
                            <input type="text" onkeyup="duplicateUsernamelogin(this)"
                                class="form-control usernameinputlogin @if(session('error')) is-invalid @enderror"
                                name="username" value="{{ old('username') }}" required autocomplete="username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback checkusernamelogin" role="alert">
                                <strong class="textusernamelogin"></strong>
                            </span>
                        </div>

                        <div class="group-input has-error has-feedback">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @if(session('error')) is-invalid @enderror"
                                name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input class="form-check-input" type="checkbox" name="remember" id="save-pass"
                                        {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                {{--  <a href="#" class="forget-pass">Forget your Password</a>  --}}
                            </div>
                        </div>

                        <button type="submit" class="site-btn login-btn" id="btn-submitlogin" style="border: none">Sign
                            In</button>
                    </form>

                    <div>
                        <a href="{{ url('/auth/redirect/google') }}" class="btn btn-primary"><i
                                class="fa fa-google"></i> Google
                        </a>
                    </div>

                    <div class="switch-login">
                        <a href="{{ route('register') }}" class="or-login">Or Create An Account</a>
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