@extends('fashi.layouts')

@section('title', 'My Profile')

@section('content')

<style>
    label {
        color: rgba(85, 85, 85, .8);
    }
</style>

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Change mailbox</span>
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
                    <h2>Change mailbox</h2>
                    <span style="text-align: center">To update the new email, please confirm by entering the current
                        password</span>
                    <hr>

                    <form action="{{ route('verifyemail') }}" method="POST" class="beta-form-checkout" id="my-form5">
                        @csrf

                        <table>
                            <tr>
                                <td><label for="" style="">Email address: &nbsp;</label> </td>
                                <td>
                                    <span
                                        style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">{{ $user->email }}</span>
                                    @if(empty(Auth::user()->email_verified_at))
                                    <b style="color: #ee4d2d; font-size: 14.5px; padding-left: 5px;">Unverify <i
                                            class="far fa-times-circle"></i></b>
                                    &nbsp;
                                    <a href="{{ url('/email/verify') }}" style="color: blue;">Verify now</a>

                                    @else
                                    <b style="color: #00cc00; font-size: 14.5px; padding-left: 10px;">Verified <i
                                            class="fas fa-check-circle"></i></b>
                                    @endif
                                </td>
                            </tr>
                        </table><br>

                        <div class="form-input @error('email') has-error has-feedback @enderror">
                            <label for="email">New email address</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                autocomplete="email" autofocus required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <br><br>

                        <button type="submit" class="site-btn register-btn" id="btn-submit5"
                            style="border: none">Confirm</button>
                    </form>

                    <div class="switch-login">
                        <a href="{{ route('details') }}" class="or-login">Cancle</a>
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
            $("#btn-submit5").attr("disabled", true);
		    $("#btn-submit5").addClass('button-clicked');
            return true;
        });
    });
</script>

@endpush