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
        $('.slider').bxSlider({
            auto: true
            // pager: false
        });
    });

})(jQuery);