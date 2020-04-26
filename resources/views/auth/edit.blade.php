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
                    <span>My Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

@if(Auth::check())
@if(empty(Auth::user()->email_verified_at))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Please verify email before making a purchase,
        <a href="{{ url('/email/verify') }}" style="color: blue;">Click here to verify email</a>
    </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@endif

<!-- Register Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>My Profile</h2>
                    <form action="{{ route('details.update', $user->id) }}" method="POST" class="beta-form-checkout"
                        id="my-form10" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if(!empty(Auth::user()->provider))

                        <img id="zoom" src="{{ $user->image }}" alt="No Image" srcset="" width="150"
                            style="float: right; border: 1px solid #d9d9d9;" class="img-thumbnail">

                        @else

                        <img id="zoom" src="img/user/{{ $user->image }}" alt="No Image" srcset="" width="150"
                            style="float: right; border: 1px solid #d9d9d9;" class="img-thumbnail">

                        @endif

                        <table>

                            <tr>
                                <td><label for="email">Username: &nbsp;</label> </td>
                                <td><span
                                        style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">{{ Auth::user()->username }}</span>
                                </td>
                            </tr>

                            <tr>
                                <td><label for="email">Email: &nbsp;</label> </td>
                                <td>
                                    <span>
                                        <label for=""
                                            style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">{{ substr($user->email, 0, 2) . '****' . substr($user->email, strpos($user->email, '@') + 1) }}</label>

                                        @if(empty(Auth::user()->email_verified_at))
                                        <b style="color: #ee4d2d; font-size: 14.5px; padding-left: 5px;">Unverify <i
                                                class="far fa-times-circle"></i></b>
                                        @else
                                        <b style="color: #00cc00; font-size: 14.5px;">Verified <i
                                                class="fas fa-check-circle"></i></b>
                                        @endif

                                        @if(empty(Auth::user()->provider_id))
                                        <a href="{{ route('email') }}"
                                            style="padding-left: 8px; font-size:14px; color:blue; text-decoration: underline;">
                                            Change</a>
                                        @endif
                                    </span>
                                </td>
                            </tr>

                            <tr @if(empty(Auth::user()->phone)) style="background: #ffe6e6;"
                                @endif>
                                <td><label for="phone">Phone: &nbsp;</label></td>
                                <td>
                                    @if(!empty(Auth::user()->phone))
                                    <span><label for=""
                                            style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">{{ str_repeat("*", strlen($user->phone) - 2) . substr($user->phone, -2) }}
                                        </label>
                                        <a href="{{ route('phoneNumber') }}"
                                            style="padding-left: 15px; font-size:14px; color:blue; text-decoration: underline;">
                                            Change</a>
                                    </span>
                                    @else
                                    <span><label for="">No phone</label> <a href="{{ route('phoneNumber') }}"
                                            style="padding-left: 15px; font-size:14px; color:blue; text-decoration: underline;">
                                            Change</a></span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td><label for="phone">Password: &nbsp;</label></td>
                                <td>
                                    <span><label for=""
                                            style="border: 1px solid #dadada; border-radius: 12px; padding: 0px 10px; color: #5d5d5d">*********</label>
                                        <a href="{{ route('password') }}"
                                            style="padding-left: 15px; font-size:14px; color:blue; text-decoration: underline;">
                                            Change</a>
                                    </span>
                                </td>
                            </tr>
                        </table>

                        <div class="form-group @error('image') has-error has-feedback @enderror"
                            style="margin-bottom: 0px;">

                            <label>Avatar</label>

                            <input id="imgPost" type="file" name="image"
                                class="form-control @error('image') is-invalid @enderror" onchange="readURL(event)"
                                style="width: 58%; margin-left: 0px;">

                        </div><br>

                        <div class="form-input @error('name') has-error has-feedback @enderror">
                            <label for="name">Full name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}"
                                autocomplete="name" autofocus required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><br>

                        <div class="form-input @error('address') has-error has-feedback @enderror"
                            @if(empty(Auth::user()->address))
                            style="background: rgb(255, 245, 245);"
                            @endif>
                            <label for="adress">Address</label>
                            <textarea type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror @if(empty(Auth::user()->address)) {{ "is-invalid" }}
                                @endif" autofocus autocomplete="address">{{ $user->address }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><br>

                        <div class="form-input @error('current_password') has-error has-feedback @enderror">
                            <label for="password">Current Password</label>
                            <input type="password" id="password" name="current_password"
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current_password">
                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br><br>

                        <button type="submit" class="site-btn register-btn" id="btn-submit10"
                            style="border: none">Update</button>
                    </form>

                    <div class="switch-login">
                        <a href="{{ route('home') }}" class="or-login">Cancle</a>
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
        $("#my-form10").submit(function (e) {
            $("#btn-submit10").attr("disabled", true);
		    $("#btn-submit10").addClass('button-clicked');
            return true;
        });
    });
</script>
<script>
    function readURL(event) {
        if (event.target.files && event.target.files[0]) {
        let reader = new FileReader();

        reader.onload = function () {
        let output = document.getElementById('zoom');
        output.src = reader.result;
        }

        reader.readAsDataURL(event.target.files[0]);
        }
    }
</script>

@endpush