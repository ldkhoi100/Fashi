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
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        @include('partials.message')
                        <div class="group-input has-error has-feedback">
                            <label for="username">Username or email address</label>
                            <input id="username" type="username"
                                class="form-control @if(session('error')) is-invalid @enderror" name="username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="group-input has-error has-feedback">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @if(session('error')) is-invalid @enderror" name="password" required
                                autocomplete="current-password">

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

                        <button type="submit" class="site-btn login-btn">Sign In</button>
                    </form>

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