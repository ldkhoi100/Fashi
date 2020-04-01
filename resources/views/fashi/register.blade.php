@extends('fashi.layouts')

@section('title', 'register')

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
                    <form action="{{ route('register') }}" method="post" class="beta-form-checkout">
                        @csrf

                        @if (count($errors) > 0)
                        <div class="alert alert-danger center">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-input @error('username') has-error has-feedback @enderror">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username"
                                class="form-control @error('username') is-invalid @enderror"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>
                        </div>

                        <div class="form-input @error('email') has-error has-feedback @enderror">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                required autocomplete="email">
                        </div>

                        <div class="form-input @error('name') has-error has-feedback @enderror">
                            <label for="name">Full name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                required autocomplete="name" autofocus>
                        </div>

                        <div class="form-input @error('address') has-error has-feedback @enderror">
                            <label for="adress">Address</label>
                            <textarea type="text" id="address" name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ old('address') }}"></textarea>
                        </div>

                        <div class="form-input @error('phone') has-error has-feedback @enderror">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                required autocomplete="phone">
                        </div>
                        <div class="form-input @error('password') has-error has-feedback @enderror">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="new-password">
                        </div>
                        <div class="form-input @error('password_confirm') has-error has-feedback @enderror">
                            <label for="password_confirm">Confirm password</label>
                            <input type="password" id="password_confirm" name="password_confirmation"
                                class="form-control" required autocomplete="new-password">
                        </div><br><br>

                        <button type="submit" class="site-btn register-btn">REGISTER</button>
                    </form>

                    <div class="switch-login">
                        <a href="./login.html" class="or-login">Or Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->

@endsection