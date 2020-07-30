(function ($){
    $('figure.wp-caption.aligncenter').removeAttr('style');
    $('img.aligncenter').wrap('<figure class="centered-image" />');
    
    
    $('.search-submit').click(function () {
        $('.search-field').css("opacity", "1");
        $('.search-field').css("visibility", "visible");
        $('.type-submit').css("opacity", "1");
        $('.type-submit').css("visibility", "visible");
        $('.type-button').css("opacity", "0");
        $('.type-button').css("visibility", "hidden");
    });
    
    $(document).ready(function () {

        $('.slider').slick({
            prevArrow: $('.prev1'),
            nextArrow: $('.next1'),
            autoplay: true,
            autoplaySpeed: 5000
        });

        $('#home-blog').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 3,
            prevArrow: $('.prev'),
            nextArrow: $('.next')
        });

        $('ul.post').hover(
            function () { $(this).addClass('active') },
            function () { $(this).removeClass('active') }
        );

    });

    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 200) {
            $(".header-wrap").addClass("minified");
        } else {
            $(".header-wrap").removeClass("minified");
        }
    });


})(jQuery);