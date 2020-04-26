<!-- Navbar -->

<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>All departments</span>
                <ul class="depart-hover">
                    <li class="active"><a href="/shop/women">Women’s Clothing</a></li>
                    <li><a href="/shop/men">Men’s Clothing</a></li>
                    <li><a href="/shop/kid">Kid's Clothing</a></li>
                    <li><a href="/shop/women/accessories-women">Accessories/Shoes</a></li>
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                @if(Request::is('/'))
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                @else
                <li><a href="{{ route('home') }}">Home</a></li>
                @endif
                @if(Request::is('shop'))
                <li class="active"><a href="{{ route('shop') }}">Shop</a></li>
                @else
                <li><a href="{{ route('shop') }}">Shop</a></li>
                @endif
                @if(Request::is('shop/men*') || Request::is('shop/women*') || Request::is('shop/kid*') ||
                Request::is('shop/detail*'))
                <li class="active"><a href="{{ route('shop') }}">Collection</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('men') }}">Men's</a></li>
                        <li><a href="{{ route('women') }}">Women's</a></li>
                        <li><a href="{{ route('kid') }}">Kid's</a></li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('shop') }}">Collection</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('men') }}">Men's</a></li>
                        <li><a href="{{ route('women') }}">Women's</a></li>
                        <li><a href="{{ route('kid') }}">Kid's</a></li>
                    </ul>
                </li>
                @endif
                @if(Request::is('blog*'))
                <li class="active"><a href="{{ route('blog') }}">Blog</a></li>
                @else
                <li><a href="{{ route('blog') }}">Blog</a></li>
                @endif
                @if(Request::is('contact*'))
                <li class="active"><a href="{{ route('contact') }}">Contact</a></li>
                @else
                <li><a href="{{ route('contact') }}">Contact</a></li>
                @endif
                @if(Request::is('faq*'))
                <li class="active"><a href="{{ route('faq') }}">FAQs</a>
                    @else
                <li><a href="{{ route('faq') }}">FAQs</a>
                    @endif
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>

@include('partials.message')
<!-- Navbar End -->