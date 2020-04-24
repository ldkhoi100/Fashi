@extends('fashi.layouts')

@section('title', 'Login')

@section('content')

<style>
    .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
    }

    .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
    }

    .loginBtn:focus {
        outline: none;
    }

    .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0, 0, 0, 0.1);
    }

    .loginBtn--google {
        font-family: 'Nunito', sans-serif;
        background: #DD4B39;
    }

    .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
    }

    .loginBtn--google:hover,
    .loginBtn--google:focus {
        background: #E74B37;
    }
</style>

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
                    <form action="{{ route('login') }}" method="POST" id="my-form5">
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

                        <button type="submit" class="site-btn login-btn" id="btn-submitlogin5" style="border: none">Sign
                            In</button>
                    </form>

                    <div class="switch-login">
                        <a href="{{ url('/auth/redirect/google') }}" style="color:white">
                            <button class="loginBtn loginBtn--google">
                                Login with Google
                            </button></a> <br>
                    </div>

                    <div class="switch-login">
                        <a href="/password/reset/" style="color: blue;">Forgot password?</a>
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
        $("#my-form5").submit(function (e) {
            $("#btn-submitlogin5").attr("disabled", true);
		    $("#btn-submitlogin5").addClass('button-clicked');
            return true;
        });
    });
</script>

@endpush