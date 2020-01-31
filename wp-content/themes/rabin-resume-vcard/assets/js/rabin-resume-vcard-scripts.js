(function($) {
    'use strict';

    /** Detecting viewpot dimension */
    var vW = $(window).width();
    var vH = $(window).height();
    var bH = $('.bb-bigbook-wrapper').height();
    var $wCntnr = $('.works-container');

    /** Window Load */
    $(window).on('load', function() {
        /** Loader */
        $('.loader-wrapper').fadeOut('slow');
    });

    $(document).ready(function () {
        $('body').toggleClass('book-open');
        $('.scroll-wrap').toggleClass('hide-overflow');
        $('.bb-bigbook').toggleClass('show');
        $('.smallbook').toggleClass('opened');
    });

    var Page = (function () {
        var bbDir;
        if( $( "html" ).attr("dir") == "rtl" ) {
            bbDir = 'rtl';
        } else {
            bbDir = 'ltr';
        }

        var current_page = 0;

        var config = {
                $bookBlock: $('.bb-bookblock'),
                $nav: $('.site-nav > .main-nav > li'),
                $navNext: $('.bb-nav-next'),
                $navPrev: $('.bb-nav-prev'),
                $navFirst: $('#bb-nav-first'),
                $navLast: $('#bb-nav-last')
            },
            init = function () {
                config.$bookBlock.bookblock({
                    direction: bbDir,
                    speed: 1000,
                    shadowSides: 0.8,
                    shadowFlip: 0.4,
                    onEndFlip: function (old, page, isLimit) {
                        current_page = page;

                        // initPortfolio
                        $('.bb-item').eq(page).find('.works-container').trigger({type:'initWorks', test:true, name:'initWorks'});
                    }
                });
                initEvents();
            },
            initEvents = function () {

                var $slides = config.$bookBlock.children();

                // add navigation events
                config.$nav.on('click touchstart', function () {
                    var i = $(this).index();
                    config.$bookBlock.bookblock('jump', i + 1);
                    return false;
                });

                config.$navNext.on('click touchstart', function () {
                    config.$bookBlock.bookblock('next');
                    return false;
                });

                config.$navPrev.on('click touchstart', function () {
                    config.$bookBlock.bookblock('prev');
                    return false;
                });

                config.$navFirst.on('click touchstart', function () {
                    config.$bookBlock.bookblock('first');
                    return false;
                });

                config.$navLast.on('click touchstart', function () {
                    config.$bookBlock.bookblock('last');
                    return false;
                });

                // add swipe events
                $slides.on({
                    'swipeleft': function (event) {
                        config.$bookBlock.bookblock('next');
                        return false;
                    },
                    'swiperight': function (event) {
                        config.$bookBlock.bookblock('prev');
                        return false;
                    }
                });

                // add keyboard events
                $(document).keydown(function (e) {
                    var keyCode = e.keyCode || e.which,
                        arrow = {
                            left: 37,
                            up: 38,
                            right: 39,
                            down: 40
                        };

                    switch (keyCode) {
                        case arrow.left:
                            config.$bookBlock.bookblock('prev');
                            break;
                        case arrow.right:
                            config.$bookBlock.bookblock('next');
                            break;
                    }
                });
            };

        return {
            init: init
        };

    })();

    if ($(window).width() > 991) {
        Page.init();
    }

    /** Animation on scroll */
    function elementInView() {
        var $animatedElements = $(".anim");
        var $window = $(window);

        $window.on('scroll resize', function () {
            var windowHeight = $window.height();
            var windowTopPosition = $window.scrollTop();
            var windowBottPosition = (windowTopPosition + windowHeight);

            $.each($animatedElements, function () {
                var $element = $(this);
                var elementHeight = $element.outerHeight();
                var elementTopPosition = $element.offset().top;
                var elementBottPosition = (elementTopPosition + elementHeight);

                //Check to see if this current container is within viewport
                if ((elementBottPosition >= windowTopPosition) &&
                    (elementTopPosition <= windowBottPosition)) {
                    $element.addClass('animated');
                    //$element.removeClass('anim');

                    //Animate progress bar
                    if ($element.hasClass('progress-bar')) {
                        $element.css('width', $element.attr('data-percent') + '%');
                    }

                }
                //else {
                //$element.removeClass('animated');
                //}
            });
        });

        $window.trigger('scroll');

    }

    $(document).ready(function () {

        elementInView();


        if ($(window).width() > 991) {
            $('.bb-custom-side-content').slimScroll({
                height: bH + 'px'
            });
            $('.bb-custom-side').each(function () {
                $(this).append('<div class="bb-custom-side-space-top"></div><div class="bb-custom-side-space-bottom"></div>')
            });
        }

        if ($(window).width() < 992) {
            /** Site Navigation LocalScroll */
            $('.site-nav ul').localScroll({
                target: 'body',
                offset: -50,
                queue: true,
                duration: 1000,
                hash: false,
            });
        }
    });

$(document).ready(function() {
    var $toggleButton = $('.toggle-button'),
        $menuWrap = $('.menu-wrap');
    $toggleButton.on('click', function() {
        console.log('click');
        $(this).toggleClass('button-open');
        $menuWrap.toggleClass('menu-show');
    });
});


})(jQuery);