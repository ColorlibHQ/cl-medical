( function( $ ){

    "use strict";
    var body = $('body');
    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".fullscreen").css("height", window_height)
    $(".fitscreen").css("height", fitscreen);

    //------- Niceselect  js --------//  
    var $select = $('select');

    if (document.getElementById("default-select")) {
        $select.niceSelect();
    };
    if (document.getElementById("default-select2")) {
        $select.niceSelect();
    };
    if (document.getElementById("service-select")) {
        $select.niceSelect();
    };    

    //------- Lightbox  js --------//  

    $('.img-gal').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.play-btn').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // ------- Datepicker  js --------//  

      $( function() {
        $( "#datepicker1" ).datepicker();
        $( "#datepicker2" ).datepicker();
      } );


    //------- Superfish nav menu  js --------//  

    $('.nav-menu').superfish({
        animation: {
            opacity: 'show'
        },
        speed: 400
    });

    /* ---------------------------------------------
     accordion
     --------------------------------------------- */

    var allPanels = $(".accordion > dd").hide();
    allPanels.first().slideDown("easeOutExpo");
    $(".accordion").each(function() {
        $(this).find("dt > a").first().addClass("active").parent().next().css({
            display: "block"
        });
    });


     $(document).on('click', '.accordion > dt > a', function(e) {

        var current = $(this).parent().next("dd");
        $(this).parents(".accordion").find("dt > a").removeClass("active");
        $(this).addClass("active");
        $(this).parents(".accordion").find("dd").slideUp("easeInExpo");
        $(this).parent().next().slideDown("easeOutExpo");

        return false;

    });

    //------- Tabs Js --------//  
    if (document.getElementById("horizontalTab")) {

    $('#horizontalTab').jqTabs({
        direction: 'horizontal',
        duration: 200
    });
    
    };  


    //------- Owl Carusel  js --------//  

    $('.active-review-carusel').owlCarousel({
        items:1,
        loop:true,
        autoplay:true,
        autoplayHoverPause: true,        
        margin:30,
        dots: true
    });


    $('.active-brand-carusel').owlCarousel({
        items: 5,
        loop: true,
        autoplayHoverPause: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1
            },
            455: {
                items: 2
            },            
            768: {
                items: 3,
            },
            991: {
                items: 4,
            },
            1024: {
                items: 5,
            }
        }
    }); 

    //------- Mobile Nav  js --------//  

    var navMenuContainer = $('#nav-menu-container');
    var mobileNavToggleI = $('#mobile-nav-toggle i');
    var mobileBodyOverlay= $('#mobile-body-overly');
    if ( navMenuContainer.length ) {
        var $mobile_nav = navMenuContainer.clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        body.append($mobile_nav);
        body.prepend('<button type="button" id="mobile-nav-toggle"><i class="lnr lnr-menu"></i></button>');
        body.append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="lnr lnr-chevron-down"></i>');

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("lnr-chevron-up lnr-chevron-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            body.toggleClass('mobile-nav-active');
            mobileNavToggleI.toggleClass('lnr-cross lnr-menu');
            mobileBodyOverlay.toggle();
        });

            $(document).on('click', function(e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if (body.hasClass('mobile-nav-active')) {
                    body.removeClass('mobile-nav-active');
                    mobileNavToggleI.toggleClass('lnr-cross lnr-menu');
                    mobileBodyOverlay.fadeOut();
                }
            }
        });
    } else if ( container.length ) {
        container.hide();
    }

    //------- Smooth Scroll  js --------//  
    var header = $('#header');
    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;

                if (header.length) {
                    top_space = header.outerHeight();

                    if (!header.hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }

                htmlBody.animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');

                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }

                if (body.hasClass('mobile-nav-active')) {
                    body.removeClass('mobile-nav-active');
                    mobileNavToggleI.toggleClass('lnr-times lnr-bars');
                    mobileBodyOverlay.fadeOut();
                }
                return false;
            }
        }
    });

    var htmlBody = $('html, body');
    $(document).ready(function() {

        htmlBody.hide();

        if (window.location.hash) {

            setTimeout(function() {

                htmlBody.scrollTop(0).show();

                htmlBody.animate({

                    scrollTop: $(window.location.hash).offset().top - 108

                }, 1000)

            }, 0);

        } else {

            htmlBody.show();

        }

    });


    //------- Header Scroll Class  js --------//  

    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            header.addClass('header-scrolled');
        } else {
            header.removeClass('header-scrolled');
        }
    });

    //------- Mailchimp js --------//  

    $(document).ready(function() {
        $('#mc_embed_signup').find('form').ajaxChimp();
    });

})(jQuery);