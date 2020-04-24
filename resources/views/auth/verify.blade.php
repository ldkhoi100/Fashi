@extends('fashi.layouts')

@section('title', 'Verify Email')

@section('content')

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Verify Your Email Address</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin: 100px 200px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif

                    {{ __('Before purchase, please check your email for a verification link.') }} <br>
                    {{ __('If you did not receive the email') }},

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit"
                            class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request link to verify') }}</button>.
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection