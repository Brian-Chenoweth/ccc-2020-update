/**
 * File custom.js.
 */




var $ = jQuery.noConflict();




// Contains a list of jquery wrapped elements that have dropdowns
/* ===================================================
  START: Handles dropdown on touch devices
  =================================================== */
(function () {

    // Contains a list of jquery wrapped elements that have dropdowns
    var hasDropdowns = [];

    if (isTouchDevice()) {
        // Need to find which elements have menus and add them to an array
        $('ul#primary-menu > li > a').each(function (index, value) {
            if ($(value).siblings().length) {
                hasDropdowns.push($(this));
            }
        });

        // Applying the listener to the elements that have dropdowns
        $.each(hasDropdowns, handleDropdownParents);
    }

    function handleDropdownParents(index, currentElement) {

        // Initialize this data attribute on all dropdown "<a />" elements
        currentElement.attr('has-been-clicked', false);

        // Add an event listener to those "<a />" links
        currentElement.on('click', function (e) {

            // If the element is the first time getting clicked:
            //   1. preventDefault()
            //   2. reset other dropdown elements
            //   3. Add the dropdown class to the parent element "<li />"
            //   4. Then set 'has-been-clicked' to true so if it gets clicked again it will go through
            if (currentElement.attr('has-been-clicked') === 'false') {
                e.preventDefault();
                resetOtherDropdownParents($(this), hasDropdowns);
                currentElement.parent().addClass('show-dropdown');
                currentElement.attr('has-been-clicked', true);
            }
        });
    }

    function resetOtherDropdownParents($self, arr) {
        // This happens durring a menu item click that has a dropdown.

        if ($self === null) {
            $.each(arr, function (index, $item) {
                $item.attr('has-been-clicked', false).parent().removeClass('show-dropdown');
            });
        } else {
            // We want to reset all other has-been-clicked to false and hide other dropdowns
            $.each(arr, function (index, $item) {

                // We don't want to reset the current element
                if ($item.text() === $self.text()) {
                    // do nothing

                } else {
                    // Reseting 'has-been-clicked' && removing 'show-dropdown' class name from parent "<li />"
                    $item.attr('has-been-clicked', false).parent().removeClass('show-dropdown');
                }
            });
        }
    }

    function aMenuIsOpenCheck(event) {
        // If a menu is open and you clicked out of the current menu, then close it!

        var clickedOutOfMenu = false;
        $.each(hasDropdowns, function (i, $val) {
            // If a menu is open,
            if ($val.parent().hasClass('show-dropdown')) {

                // then check to see if it's the current menu
                if (!$(event.target).closest($val.parent()).length) {
                    // set var to true,
                    clickedOutOfMenu = true;
                }
            }
        });

        return (clickedOutOfMenu) ? resetOtherDropdownParents(null, hasDropdowns) : null;
    }

    if (isTouchDevice()) {
        $(document).on('click', function (event) {
            // Check to see if click was outside menu,
            aMenuIsOpenCheck(event);
        });
    }

    // Same touch detection modernizr uses
    function isTouchDevice() {
        try {
            document.createEvent('TouchEvent');
            return true;
        } catch (e) {
            return false;
        }
    }
}());
  /* ===================================================
  END: Handles dropdown on touch devices
  =================================================== */




// $('body').click(function() {
//     alert("Yeah!");
// });


(function ($) {
    
    $("button.menu-toggle").click(function () {
        $("button.menu-toggle").toggleClass("is-active");
        

    });
    
    $(".menu-item-has-children").click(function () {
        $(".menu-item-has-children.show-dropdown > ul.sub-menu").addClass("sub-menu-clicked");
    });


    $("button.menu-toggle").click(function () {
        $(".menu-menu-1-container").toggleClass("menu-open");
        $(".menu-menu-1-container.menu-open").animate({
            height: "100vh",
            opacity: 0.9,
            backgroundColor: "black",
            display: "block"
        }, 100);
        $("ul#primary-menu").css("display", "flex");
        $("ul#primary-menu").css("flex-direction", "column");
        $("ul#primary-menu").css("padding", "1em 2em");



        if (!$(".menu-menu-1-container").hasClass("menu-open")) {
            // $(".menu-menu-1-container").css("display", "none");
            $(".menu-menu-1-container").animate({
                height: "0px",
                opacity: 0,
                backgroundColor: "black",
                display: "none"
            }, 100);
            $("ul#primary-menu").css("display", "none");
        }

        
    });



    
    /* ---------------------------------------------------------------------------
     * Responsive menu
     * --------------------------------------------------------------------------- */
    $('.menu-burger-menu').click(function (e) {
        e.preventDefault();
        $('.menu-menu-1-container').toggleClass('active');
        $('.menu').slideToggle(200);
        // $('.menu-open').slideToggle(300);
    });



    $('ul.menu li').bind('touchstart', function () {
        $(this).addClass('hover');
    }).bind('touchend', function () {
        $(this).removeClass('hover');
    });




    $(function () {                       //run when the DOM is ready
        $(".navbar-toggler").click(function () {  //use a class, since your ID gets mangled
            $("span.line").toggleClass("transformed-x");      //add the class to the clicked element
        });
    });


    $('.slider').bxSlider({

        controls: false,
        pager: false,
        autoHover: false,
        ticker: true,
        speed: 150000,
        slideMargin: 0,
        infiniteloop: true

    });


    $('.video-translation-button').click(
        function (index, element) {
            $(this).siblings(".translation-text").toggle(); 
        }
    );

})(jQuery);
