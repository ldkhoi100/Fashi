$(document).ready(function() {
    $(window).scroll(fetchProducts);

    function fetchProducts() {
        var page = $('.endless-pagination').data('next-page');
        if (page !== null) {
            clearTimeout($.data(this, "scrollCheck"));
            $.data(this, "scrollCheck", setTimeout(function() {
                var scroll_position_for_products_load = $(window).height() + $(window).scrollTop() + 800;
                if (scroll_position_for_products_load >= $(document).height()) {
                    $.get(page, function(data) {
                        $('.scroll').append(data.product);
                        $('.endless-pagination').data('next-page', data.next_page);
                    });
                }
            }, 200))
        }
    }
});