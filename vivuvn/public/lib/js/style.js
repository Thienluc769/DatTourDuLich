// $(window).scroll(function() {
//     var headerHeight = $(".header").outerHeight();
//     // kiểm tra điều kiện > header thì mới addClass 
//     if ($(window).scrollTop() > headerHeight) {
//         $('.header').addClass('white-bg');
//         // $('.header').addClass('header-sticky');
//         $('.contacthotel').slideUp();
//         $('.header-middle').addClass('animated');
//     } else {
//         $('.header').removeClass('white-bg');
//         // $('.header').removeClass('header-sticky');
//         $('.contacthotel').slideDown();
//         $('.header-middle').removeClass('animated');
//     }
// });
/* back to top */
var btn = $('.scrollup');

$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        btn.addClass('activate');
    } else {
        btn.removeClass('activate');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, '1000');
});

$(document).ready(function() {

    $("#date_form").datepicker();
    $("#booking_date").datepicker();

    //click header-menu
    $('.mega-tag__title').on('click', function() {
        var tagId = $(this).attr("data-tab");

        $('.mega-tag__title[data-tab=' + tagId + ']').addClass('active');
        $('.mega-content__item[data-tab=' + tagId + ']').addClass('active').css('display', 'block');

        $('.mega-tag__title.active').not($(this)).removeClass('active');
        $('.mega-content__item.active').not($('.mega-content__item[data-tab=' + tagId + ']')).removeClass('active').css('display', 'none');
    })


    //search popup
    $('.button-search-popup').on('click', function() {
        $('.search-popup').addClass('active');
        $('.search-popup__overlay').addClass('active');
    })
    $('.search-popup__close').on('click', function() {
        $('.search-popup').removeClass('active');
        $('.search-popup__overlay').removeClass('active');
    })
    $(document).mouseup(function(e) {
        var container = $(".search-popup");
        var container__overlay = $(".search-popup__overlay");
        if (!container.is(e.target) &&
            container.has(e.target).length === 0) {
            container.removeClass('active');
            container__overlay.removeClass('active');
        }
    });

    //menu mobile
    $('.menu-toggle__button').on('click', function() {
        $('.zourney-mobile__nav').addClass('active');
        $('.zourney-overlay').addClass('active');
        $('body').addClass('ov-hidden');
    })
    $('.mobile-nav__close').on('click', function() {
        $('.zourney-mobile__nav').removeClass('active');
        $('.zourney-overlay').removeClass('active');
        $('body').removeClass('ov-hidden');
    })
    $(document).mouseup(function(e) {
        var mobilemenu = $(".zourney-mobile__nav"),
            bodyover = $(".ov-hidden"),
            mobilemenuover = $(".zourney-overlay");

        if (!mobilemenu.is(e.target) &&
            mobilemenu.has(e.target).length === 0) {
            mobilemenu.removeClass('active');
            mobilemenuover.removeClass('active');
            bodyover.removeClass('ov-hidden');
        }
    });

    $('li .dropdown-toggle').on('click', function() {
        $(this).parent("li").children(".submenu").slideToggle();
        $(this).toggleClass('toggled-on');
    })
    $('.guest-block').on('click', function() {
            $('.search-guest-wrapper').addClass('active');
        })
        // $(document).mouseup(function(e) {
        //     var container = $(".search-guest-wrapper");
        //     if (!container.is(e.target) &&
        //         container.has(e.target).length === 0) {
        //         container.removeClass('active');
        //     }
        // });


    $('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: '<button class="slick-prev slick-arrow"><div class="tp-rotate"></div></button>',
        prevArrow: '<button class="slick-next slick-arrow"><div class="tp-rotate"></div></button>',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,

                },
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                },
            }
        ]
    });
    $('.explore-slider-1').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: '<button class="slick-prev slick-arrow"><span></span></button>',
        prevArrow: '<button class="slick-next slick-arrow"><span></span></button>',
        responsive: [{
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            }
        ]
    });
    $('.explore-slider-2').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        responsive: [{
                breakpoint: 1366,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            }

        ]
    });
    $('.category-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: false,
        responsive: [{
                breakpoint: 1366,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                },
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            }
        ]
    });
    $('.reviews-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        nextArrow: '<button class="slick-prev slick-arrow"><span></span></button>',
        prevArrow: '<button class="slick-next slick-arrow"><span></span></button>'
    });

    $(".by_default").click(function() {
        $(this).parent().toggleClass("active");
    })

    $(".options li").click(function() {
        var defaultShare = $(this).html();
        $(".by_default li").html(defaultShare);

        $(this).parents(".box").removeClass("active");
    })

    $("#slider-range").slider({
        range: true,
        min: 130,
        max: 500,
        values: [130, 250],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });
    $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));


    //tour-list
    $('.tab-title').on('click', function() {
        var tabId = $(this).attr("data-tab");

        $('.tab-title[data-tab=' + tabId + ']').toggleClass('active');
        $('.tab-content[data-tab=' + tabId + ']').toggleClass('active').slideToggle();

        $('.tab-tilte.active').not($('.tab-title[data-tab=' + tabId + ']')).removeClass('active');

        $('.tab-content.active').not($('.tab-content[data-tab=' + tabId + ']')).removeClass('active').slideUp();
    })

    //gallery-tour-details
    $('.details-tour-gallery').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.details-tour-thumb'
    });
    $('.details-tour-thumb').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.details-tour-gallery',
        dots: false,
        arrows: false,
        // centerMode: true,
        focusOnSelect: true
    });

    $('.desc-p .link-holder a').on('click', function() {
        $(this).toggleClass('active');
        $(this).parents('.desc-p').toggleClass('active');
        $(this.active).children('span ').html('less');
        if ($(this).hasClass('active')) {
            $(this).children('span').html('View less');
        } else {
            $(this).children('span').html('View more');
        }
    })

    $('.toggle-step').on('click', function() {
        $(this).toggleClass('active');

        $('.block-step__title').toggleClass('block-active');
        $('.block-step__content').toggleClass('block-active');

        if ($(this).hasClass('active')) {
            $(this).html('Collapse All');
            $('.block-step__title').addClass('block-active');
            $('.block-step__content').addClass('block-active');
        } else {
            $(this).html('Expand All');
            $('.block-step__title').removeClass('block-active');
            $('.block-step__content').removeClass('block-active');
        }
    })
    $('.block-step .block-step__title').on('click', function() {
        $(this).toggleClass('block-active');
        $(this).parent('.block-step').children('.block-step__content').toggleClass('block-active');
    })

    $('.block-more-tour').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },

        ]
    });


    $('.input_select_wrapper .input_select_input').on('click', function() {
        $(this).parent('.input_select_wrapper').children('.input_select_list').toggleClass('active');
    })

    $(document).mouseup(function(e) {
        var input_select_list = $(".input_select_list");
        if (!input_select_list.is(e.target) &&
            input_select_list.has(e.target).length === 0) {
            input_select_list.removeClass('active');
        }

        var search_guest = $(".search-guest-wrapper");
        if (!search_guest.is(e.target) &&
            search_guest.has(e.target).length === 0) {
            search_guest.removeClass('active');
        }
    });

    $('.input_select_wrapper .input_select_list .term_item').on('click', function() {
        var valId = $(this).attr("data-value");

        $(this).addClass('term_item_selected');
        $(this).parents('.input_select_wrapper').children('.input_select_input').val(valId);
        $(this).parents('.input_select_wrapper').children('.input_select_list').removeClass('active');
        $(this).parent('.input_select_list ').children('.term_item').not($(this)).removeClass('term_item_selected');
    })

    // $('.input-select-feild-guest .search-guests-plus').on('click', function() {
    //     var nameNumber = $(this).parent('.input-select-feild-guest').attr("data-name");

    //     $(this).parent('.input-select-feild-guest[data-name=' + nameNumber + ']').hide();

    // })

});

$(function() {
    // var valueName = $('.input-select-feild-guest').attr('data-name');
    // set the + functionality
    $('.input-select-feild-guest .search-guests-plus').click(function() {
        var counterValue = $(this).parent('.input-select-feild-guest').children('.select-guests-value').html();
        var value = $('.search-guest-title-value').html();
        $(this).parent('.input-select-feild-guest').children('.select-guests-value').html(++counterValue);
        // $(this).parent('.input-select-feild-guest').children('.select_guests_input_value').html(++counterValue);
        $('.search-guest-title-value').html(++value);

    });
    // set the - functionality
    $('.input-select-feild-guest .search-guests-minus').click(function() {
        var counterValue = $(this).parent('.input-select-feild-guest').children('.select-guests-value').html();
        var value = $('.search-guest-title-value').html();
        $(this).parent('.input-select-feild-guest').children('.select-guests-value').html((counterValue - 1 < 0) ? counterValue : --counterValue);
        $('.search-guest-title-value').html((value - 1 < 0) ? value : --value);
        // if (counterValue <= 0) {
        //     $(this).off('click');
        // }


    });
    // initialize display
    $('.select-guests-value').html(counterValue);
    $('.select-guests-title-value').html(value);

});