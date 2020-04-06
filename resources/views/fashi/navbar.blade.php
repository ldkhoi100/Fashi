<!-- Navbar -->

<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>All departments</span>
                <ul class="depart-hover">
                    <li class="active"><a href="#">Women’s Clothing</a></li>
                    <li><a href="#">Men’s Clothing</a></li>
                    <li><a href="#">Underwear</a></li>
                    <li><a href="#">Kid's Clothing</a></li>
                    <li><a href="#">Brand Fashion</a></li>
                    <li><a href="#">Accessories/Shoes</a></li>
                    <li><a href="#">Luxury Brands</a></li>
                    <li><a href="#">Brand Outdoor Apparel</a></li>
                </ul>
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                <li><a href="#">Collection</a>
                    <ul class="dropdown">
                        <li><a href="{{ route('men') }}">Men's</a></li>
                        <li><a href="{{ route('women') }}">Women's</a></li>
                        <li><a href="{{ route('kid') }}">Kid's</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        {{-- <li><a href="{{ route('blogdetail') }}">Blog Details</a>
                </li> --}}
                <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                {{-- <li><a href="{{ route('checkout') }}">Checkout</a></li> --}}
                <li><a href="{{ route('faq') }}">Faq</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
            </ul>
            </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>

<!-- Navbar End -->