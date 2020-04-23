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