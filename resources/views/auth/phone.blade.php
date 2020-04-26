@extends('fashi.layouts')

@section('title', 'Change phone number')

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
                    <span>Change phone number</span>
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
                    <h2>Change phone number</h2>
                    <span style="text-align: center">To update the new phone, please confirm by entering the current
                        password</span>
                    <hr>

                    <form action="{{ route('verifyPhone') }}" method="post" class="beta-form-checkout" id="my-form5">
                        @csrf

                        <table>
                            <tr>
                                <td><label>Phone number: &nbsp;</label> </td>
                                <td>
                                    <span style=" border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px;
                        color: #5d5d5d">+84 {{ $user->phone }}</span>
                                </td>
                            </tr>
                        </table><br>

                        <div class="form-input @error('phone') has-error has-feedback @enderror">
                            <label for="phone">New phone</label>
                            <input type="phone" id="phone" name="phone"
                                class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                autocomplete="phone" autofocus required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <br><br>

                        <button type="submit" class="site-btn register-btn" id="btn-submit5">Confirm</button>
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