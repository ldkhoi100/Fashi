@extends('fashi.layouts')

@section('title', 'Register')

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

    /* Facebook */
    .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
    }

    .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
    }

    .loginBtn--facebook:hover,
    .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
    }
</style>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Register</span>
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
                <div class="register-form">
                    <h2>Register</h2>
                    <form action="{{ route('register') }}" method="post" class="beta-form-checkout" id="my-form">
                        @csrf

                        <div class="form-input usernamediv @error('username') has-error has-feedback @enderror">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" onkeyup="duplicateUsername(this)"
                                class="form-control usernameinput @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback checkusername" role="alert">
                                <strong class="textusername"></strong>
                            </span>
                        </div> <br>

                        <div class="form-input emaildiv @error('email') has-error has-feedback @enderror">
                            <label for="email">Email address</label>
                            <input type="email" name="email" onkeyup="duplicateEmail(this)"
                                class="form-control emailinput @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" autocomplete="email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback checkemail" role="alert">
                                <strong class="textemail"></strong>
                            </span>
                        </div> <br>

                        <div class="form-input namediv @error('name') has-error has-feedback @enderror">
                            <label for="name">Full name</label>
                            <input type="text" onkeyup="duplicateName(this)" name="name"
                                class="form-control nameinput @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" autocomplete="name" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback checkname" role="alert">
                                <strong class="textname"></strong>
                            </span>
                        </div> <br>

                        <div class="form-input addressdiv @error('address') has-error has-feedback @enderror">
                            <label for="address">Address</label>
                            <input type="text" name="address" onkeyup="duplicateAddress(this)"
                                class="form-control addressinput @error('address') is-invalid @enderror"
                                value="{{ old('address') }}" required>
                            @error('address')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback checkaddress" role="alert">
                                <strong class="textaddress"></strong>
                            </span>
                        </div> <br>

                        <div class="form-input phonediv @error('phone') has-error has-feedback @enderror">
                            <label for="phone">Phone</label>
                            <input type="tel" name="phone" min="0" onkeyup="duplicatePhone(this)"
                                class="form-control phoneinput @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" autocomplete="phone" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <span class="invalid-feedback checkphone" role="alert">
                                <strong class="textphone"></strong>
                            </span>
                        </div> <br>

                        <div class="form-input @error('password') has-error has-feedback @enderror">
                            <label for="password">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" autocomplete="new-password"
                                required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <br>

                        <div class="form-input @error('password_confirm') has-error has-feedback @enderror">
                            <label for="password_confirm">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                autocomplete="new-password" required>
                            @error('password_confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <p>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        </p>
                        <button type="submit" class="site-btn register-btn" id="btn-submit"
                            style="border: none">REGISTER</button>
                    </form>

                    <div class="switch-login" style="width: 98.5%">
                        <a href="{{ url('/auth/redirect/google') }}" style="color:white">
                            <button class="loginBtn loginBtn--google">
                                Login with Google
                            </button></a> <br>
                        <a href="{{ url('/auth/redirect/facebook') }}" style="color:white">
                            <button class="loginBtn loginBtn--facebook">
                                Login with Facebook
                            </button>
                        </a> <br>
                    </div>

                    <div class="switch-login">
                        <a href="{{ route('login') }}" class="or-login">Or Login</a>
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