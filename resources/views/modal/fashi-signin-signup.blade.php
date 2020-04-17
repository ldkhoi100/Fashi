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
                            <input type="username" class="form-control" name="username" placeholder="Email or Username"
                                value="{{ old('username') }}" required autocomplete="username" autofocus>
                        </p>
                        <p>
                            <input type="password" class="form-control" name="password" placeholder="Password" required
                                autocomplete="current-password">
                        </p>
                    </div>
                    <p>
                        <button type="submit" class="site-btn login-btn" id="btn-submit3"
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
                            <input type="text" name="name" placeholder="First Name & Last Name*" class="form-control"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </p>
                        <p>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                placeholder="Username*" required autocomplete="username" autofocus>
                        </p>
                        <p>
                            <input type="email" name="email" placeholder="Email*" class="form-control"
                                value="{{ old('email') }}" required autocomplete="email">
                        </p>
                        <p>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}"
                                placeholder="Address*">
                        </p>
                        <p>
                            <input type="tel" name="phone" class="form-control" min="0" value="{{ old('phone') }}"
                                required autocomplete="phone" placeholder="Mobile Number (11 digits)*">
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
                        <button type="submit" class="site-btn login-btn" id="btn-submit4"
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