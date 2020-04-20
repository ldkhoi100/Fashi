@extends('fashi.layouts')

@section('title', 'Register')

@section('content')

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
                            <input type="text" name="username" id="username" onblur="duplicateUsername(this)"
                                class="form-control usernameinput @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" autocomplete="username" required>
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
                            <input type="email" name="email" onblur="duplicateEmail(this)"
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
                            <input type="text" onblur="duplicateName(this)" name="name"
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
                            <input type="text" name="address" onblur="duplicateAddress(this)"
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
                            <input type="tel" name="phone" onblur="duplicatePhone(this)"
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
<meta name="csrf-token" content="{{ csrf_token() }}">​
<script src="js/register.js"></script>

@endpush