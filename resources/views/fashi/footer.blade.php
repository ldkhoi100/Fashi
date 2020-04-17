@include('modal.fashi-signin-signup')

<!-- Partner Logo Section Begin -->

<div class="partner-logo">
    <div class="container">
        <div class="logo-carousel owl-carousel">
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-1.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-2.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-3.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-4.png" alt="">
                </div>
            </div>
            <div class="logo-item">
                <div class="tablecell-inner">
                    <img src="img/logo-carousel/logo-5.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Partner Logo Section End -->

<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-left">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}"><img src="img/logo.png" alt="" width="150px"></a>
                    </div>
                    <ul>
                        <li>Address: 4/2 Dang Van Ngu street, Hue, Viet Nam</li>
                        <li>Phone: +84 79.399.5401</li>
                        <li>Email: ldkhoi100@gmail.com</li>
                    </ul>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/demon977"><i class="fab fa-facebook"></i></a>
                        {{-- <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-2 offset-lg-1">
                <div class="footer-widget">
                    <h5>Information</h5>
                    <ul>
                        <li><a href="{{ route('contact') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="footer-widget">
                    <h5>My Account</h5>
                    <ul>
                        <li><a href="{{ route('details') }}">My Account</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('cart.index') }}">Shopping Cart</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="newslatter-item">
                    <h5>Join Our Newsletter Now</h5>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="{{ route('subscribe.post') }}" class="subscribe-form" method="POST">
                        @csrf
                        <input type="email" placeholder="Enter Your Mail" name="email" style="display: flex">
                        <p>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            {{-- <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span> --}}
                        </p>
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="copyright-reserved">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <div class="payment-pic">
                        <img src="img/payment-method.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/jquery.dd.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
<script src="js/toastr.min.js"></script>
<!-- Back to top button -->
<script src="js/back-to-top.js"></script>
@stack('clicked')
@stack('cartjs')
<script>
    $(document).ready(function(){
      $('.toast').toast('show');
    });
</script>
<script>
    // Auto load data from database
    $(document).ready(function() {
        $(window).scroll(fetchProducts);
        function fetchProducts() {
            var page = $('.endless-pagination').data('next-page');
            if(page !== null) {
                clearTimeout( $.data( this, "scrollCheck" ) );
                $.data( this, "scrollCheck", setTimeout(function() {
                    var scroll_position_for_products_load = $(window).height() + $(window).scrollTop() + 800;
                    if(scroll_position_for_products_load >= $(document).height()) {
                        $.get(page, function(data){
                            $('.scroll').append(data.product);
                            $('.endless-pagination').data('next-page', data.next_page);
                        });
                    }
                }, 100))
            }
        }
    });
</script>

<script>
    //Modal sign up anh sign out
    $('.click').on( "click", function() {
        $('#ModalSignin').modal('show');
        $('#ModalSignUp').modal('hide');
    });
    $('.click2').on( "click", function() {
        $('#ModalSignUp').modal('show');
        $('#ModalSignin').modal('hide');
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#my-form3").submit(function (e) {
            $("#btn-submit3").attr("disabled", true);
		  $("#btn-submit3").addClass('button-clicked');
            return true;
        });
        $("#my-form4").submit(function (e) {
            $("#btn-submit4").attr("disabled", true);
		  $("#btn-submit4").addClass('button-clicked');
            return true;
        });
    });
</script>

<script>
    //Ajax add cart
    function AddCart(id){
        $.ajax({
            url : 'addCart/'+id,
            type : 'GET',
        }).done(function(response) {
            if(response.status == "error") {
                Command: toastr["warning"]("The number you have entered exceeds the number allowed !");
            } else {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                Command: toastr["success"]("Added this product to the cart");
            }
        });
    }
</script>

<script>
    $(document).ready(function(){
        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".qtyavailable").hide();
        $('.size-select1').click(function(){
            var inputValue = $(this).attr("value");
            console.log(inputValue);
            var targetBox = $("." + inputValue);
            $(".qtyavailable").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>

<script>
    let size = 'abc';
    function sizes(id){
        size = id;
    }
    //Ajax add cart with add quantity on detail products
    function AddCartPost(id){
        let qty = document.getElementById('quantity').value;
        let check = document.getElementById('check_stock').value;
        $.ajax({
            url : 'addCart/'+id+'/'+qty+'/'+check+'/'+size,
            type : 'GET',
        }).done(function(response) {
            console.log(size);
            if(response.status == "error") {
                Command: toastr["warning"]("The number you have entered exceeds the number allowed !");
            } else if(response.status == "errorsize") {
                toastr.warning("Please select size");
            } else {
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                Command: toastr["success"]("Added this product to the cart");
            }
        });
    }

    //delete in cart and update
    $("#change-item-cart").on("click", ".si-close i", function(){
        var ajax1 = $.ajax({
            url : 'deleteCart/'+ $(this).data("id"),
            type : 'GET',
        });
        var ajax2 = $.ajax({
            url : 'updatedeleteCart/',
            type : 'GET',
        });
        $.when(ajax1, ajax2).done(function(res1, res2){
            $("#change-item-cart").empty();
            $("#change-item-cart").html(res1[0]);
            $("#list-cart").empty();
            $("#list-cart").html(res2[0]);
            
        });
    });

    //Delete in shoppingcart and update
    $("#list-cart").on("click", ".close-td i", function(){
        var ajax3 = $.ajax({
            url : 'deleteListCart/' + $(this).data("id"),
            type : 'GET',
        });
        var ajax4 = $.ajax({
            url : 'updateDeleteListCart/',
            type : 'GET',
        });
        $.when(ajax3, ajax4).done(function(res3, res4){
            $("#list-cart").empty();
            $("#list-cart").html(res3[0]);
            $("#change-item-cart").empty();
            $("#change-item-cart").html(res4[0]);    
        });
    });
</script>
<script>
    //Save Cart
    $("#list-cart").on("click", ".save-td .ti-save", function(){
        var y = $(this).data("idsave");
        var x = document.getElementById("quantityItem" + $(this).data("idsave")).value;
        var ajax1 = $.ajax({
            url : 'saveCart/'+ y + '/'+ x,
            type : 'GET',
        })
        var ajax2 = $.ajax({
            url : 'updateDeleteListCart/',
            type : 'GET',
        });
        $.when(ajax1, ajax2).done(function(res1, res2){
            if(res1[0].status == "Wrong") {
                Command: toastr["warning"]("The number you have entered exceeds the number allowed !");
            } else {
                Command: toastr["success"]("Updated this product");
                $("#list-cart").empty();
                $("#list-cart").html(res1[0]);
                $("#change-item-cart").empty();
                $("#change-item-cart").html(res2[0]);  
            }  
        });
    });
</script>

</body>

</html>