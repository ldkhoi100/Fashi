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

<!-- Modal sign in -->
<div id="ModalSignin" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title w-100">SIGN IN</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="POST" id="my-form3">
                    @csrf
                    <p style="text-align: center">Have account? Sign in</p>
                    <div>
                        <p>
                            <input type="username" class="form-control usernameinputlogin"
                                onkeyup="duplicateUsernamelogin(this)" name="username" placeholder="Email or Username"
                                value="{{ old('username') }}" required>
                            <span class="invalid-feedback checkusernamelogin" role="alert">
                                <strong class="textusernamelogin"></strong>
                            </span>
                        </p>
                        <p>
                            <input type="password" class="form-control" name="password" placeholder="Password" required
                                autocomplete="current-password">
                        </p>
                    </div>
                    <p>
                        <button type="submit" class="site-btn login-btn" id="btn-submitlogin"
                            style="border: none; width: 100%">Sign In
                        </button>
                    </p>

                    <div class="switch-login">
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

                    <p style="text-align: center;">
                        <a href="" style="color: #ff5d3b; border-bottom: solid 1px #ff5d3b; margin: 10px 0; 
                        font: 13px/13px PTSans-Regular; display: inline-block;">Forgot password?</a>
                    </p>
                    <p style="text-align: center;">
                        <span>Create a new account? <a href="javascript:void(0);" class="click2" style="font: 16px/26px PTSans-Bold; text-decoration: none;
                            outline: 0; color: #ff5d3b; font-weight: bold">Sign Up</a>
                        </span>
                    </p>
                    <p style="text-align: center;">
                        <span class="offer">
                            <img src="{{ "img/10percentoff.png" }}" alt="" width="300px" height="100px">
                        </span>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sign Up-->
<div id="ModalSignUp" class="modal fade" role="dialog" tabindex="-1" ia-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title w-100">SIGN UP</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" class="beta-form-checkout" method="POST" id="my-form4">
                    @csrf
                    <div>
                        <p style="text-align: center;">
                            Create your account on Fashion Shop
                        </p>
                        <p>
                            <input type="text" onkeyup="duplicateName(this)" name="name"
                                placeholder="First Name & Last Name*" class="form-control nameinput"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="invalid-feedback checkname" role="alert">
                                <strong class="textname"></strong>
                            </span>
                        </p>
                        <p>
                            <input type="text" onkeyup="duplicateUsername(this)" name="username"
                                class="form-control usernameinput" value="{{ old('username') }}" placeholder="Username*"
                                required autocomplete="username" autofocus>
                            <span class="invalid-feedback checkusername" role="alert">
                                <strong class="textusername"></strong>
                            </span>
                        </p>
                        <p>
                            <input type="email" name="email" placeholder="Email*" onkeyup="duplicateEmail(this)"
                                class="form-control emailinput" value="{{ old('email') }}" required
                                autocomplete="email">
                            <span class="invalid-feedback checkemail" role="alert">
                                <strong class="textemail"></strong>
                            </span>
                        </p>
                        <p>
                            <input type="text" name="address" class="form-control addressinput"
                                onkeyup="duplicateAddress(this)" value="{{ old('address') }}" placeholder="Address*">
                            <span class="invalid-feedback checkaddress" role="alert">
                                <strong class="textaddress"></strong>
                            </span>
                        </p>
                        <p>
                            <input type="tel" name="phone" class="form-control phoneinput" min="0"
                                onkeyup="duplicatePhone(this)" value="{{ old('phone') }}" required autocomplete="phone"
                                placeholder="Mobile Number (11 digits)*">
                            <span class="invalid-feedback checkphone" role="alert">
                                <strong class="textphone"></strong>
                            </span>
                        </p>
                        <p>
                            <input type="password" name="password" class="form-control" required
                                autocomplete="new-password" placeholder="Password*">
                        </p>
                        <p>
                            <input type="password" name="password_confirmation" class="form-control" required
                                autocomplete="new-password" placeholder="Confirm Password*">
                        </p>
                        <p>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        </p>
                    </div>
                    <p>
                        <button type="submit" class="site-btn login-btn" id="btn-submit"
                            style="border: none; width: 100%">Sign Up
                        </button>
                    </p>

                    <div class="switch-login">
                        <a href="{{ url('/auth/redirect/google') }}" style="color:white">
                            <button class="loginBtn loginBtn--google">
                                Login with Google
                            </button></a> <br>
                    </div>

                    <p style="text-align: center;">
                        <a href="" style="color: #ff5d3b; border-bottom: solid 1px #ff5d3b; margin: 10px 0; 
                        font: 13px/13px PTSans-Regular; display: inline-block;">Forgot password?</a>
                    </p>
                    <p style="text-align: center;">
                        <span>Have an account? <a href="javascript:void(0);" class="click" style="font: 16px/26px PTSans-Bold; text-decoration: none;
                            outline: 0; color: #ff5d3b; font-weight: bold">Sign In</a>
                        </span>
                    </p>
                    <p style="text-align: center;">
                        <span class="offer">
                            <img src="{{ "img/10percentoff.png" }}" alt="" width="300px" height="100px">
                        </span>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>