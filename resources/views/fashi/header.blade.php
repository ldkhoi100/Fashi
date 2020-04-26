<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- add icon link -->
    <link rel="icon" href="https://cdn2.iconfinder.com/data/icons/real-estate-1-12/50/13-512.png" type="image/x-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <!--  Button back to top  -->
    <link rel="stylesheet" href="css/back-to-top.css" type="text/css">
    <!--  Zoom image detail product and toastr  -->
    <link rel="stylesheet" href="css/zoom-image.css" type="text/css">
    <link rel="stylesheet" href="css/toastr.min.css" type="text/css">
    <style>
        .button-clicked {
            background: #ffe0b3;
            cursor: not-allowed;
        }

        #select_search {
            max-width: 23%;
            height: 50px;
            float: left;
            background: transparent;
            padding-left: 23px;
            padding-top: 12px;
            padding-bottom: 12px;
            font-size: 16px;
            color: #252525;
            position: relative;
        }
    </style>
</head>

@if(session('toast'))
<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="4000"
    style="position: fixed; top:13px; right: 13px; width: -webkit-fill-available; background: orange; z-index: 999999;">
    <div class="toast-header">
        <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#007aff"></rect>
        </svg>
        <strong class="mr-auto text-primary">Messeage</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
            style="position: relative; top:0; right: 0; font-size:25px; color:black">&times;</button>
    </div>
    <div class="toast-body">
        <b>{{ session('toast') }}</b>
    </div>
</div>
@endif

@if(session('toast_error'))
<div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="4000"
    style="position: fixed; top:13px; right: 13px; width: -webkit-fill-available; background: #F08080; z-index: 999999;">
    <div class="toast-header">
        <svg class="bd-placeholder-img rounded mr-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
            <rect width="100%" height="100%" fill="#007aff"></rect>
        </svg>
        <strong class="mr-auto text-primary">Messeage</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast"
            style="position: relative; top:0; right: 0; font-size:25px; color:black">&times;</button>
    </div>
    <div class="toast-body">
        <b>{{ session('toast_error') }}</b>
    </div>
</div>
@endif

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        ldkhoi100@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +84 79.399.5401
                    </div>
                </div>
                <div class="ht-right">

                    @if(Auth::user())

                    <a href="{{ route('logout') }}" class="login-panel"><i class="fa fa-sign-out-alt fa-lg"
                            aria-hidden="true"></i>Log Out</a>
                    <a href="{{ route('your.order') }}" class="login-panel" style="padding-right: 20px"><i
                            class="fas fa-cart-arrow-down"></i>My Order</a>
                    <a href="{{ route('details') }}" class="login-panel" style="padding-right: 20px"><i
                            class="fa fa-user"></i>{{ Auth::user()->username }}</a>

                    @else

                    <a href="{{ route('register') }}" class="login-panel"><i class="fa fa-users fa-lg"></i>Register</a>
                    <a href="{{ route('login') }}" class="login-panel" style="padding-right: 20px"><i
                            class="fa fa-user"></i>Login</a>

                    @endif

                    {{-- <div class="lan-selector" class="collapse-header">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;"
                            onchange="window.location.href=this.value;">
                            <option value="">Language</option>
                            <option value='/change-language/en' data-image="img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">
                                English</option>
                            <option value='/change-language/vi' data-image="img/flag-3.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh" class="flag">Vietnamese</option>
                        </select>
                    </div> --}}

                    <div class="top-social">
                        <a href="https://www.facebook.com/demon977" target="_blank"><i class="ti-facebook"></i></a>
                        {{-- <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a> --}}
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            {{-- <button type="button" class="category-btn">All Categories</button> --}}
                            <form action="{{ route('shop.search') }}" method="GET" style="all:unset">
                                @csrf
                                {{-- <select name="search_select" id="select_search" class="form-control">
                                    <option value="1">Products</option>
                                </select> --}}
                                <div class="input-group">
                                    <input type="text" name="search_products" placeholder="Search Products . . ."
                                        style="width: 194%; color: black;">
                                    <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 text-right col-md-3">
                    <ul class="nav-right">

                        {{-- Ajax store cart --}}
                        <span id="change-item-cart">

                            @include('ajax.cart')

                        </span>

                    </ul>
                </div>
            </div>
        </div>
        </div>
        <meta name="csrf-token" content="{{ csrf_token() }}">​
        @include('fashi.navbar')

    </header>
    <!-- Header End -->
    <a id="button"></a>