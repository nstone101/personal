/************************************************************************************
 Template Name    : Fibonacci | Responsive Bootstrap 4.1.3 Portfolio Admin Template
 Author           : ElseColor
 Version          : 1.0.0
 Created          : 2020
 File Description : Custom js file of the template
 ***********************************************************************************/

/* -------------------------------------------------------------------
 [Table of contents]
 * 01.Preloader
 * 02.Wow Js
 * 03.Navbar
 * 04.Counter Up
 * 05.Owl Carousel
 * 06.ScrollSpy
 * 07.ScrollIt
 * 08.Magnific Popup
 * 09.Isotopğe Gallery
 * 10.Copyright
 * 11.Skills Bar
 * 12.Ripples Effect
 * 13.Glitch Effect
*/

$(function() {
    "use strict";

    // Call all ready functions
    feetroqua_preloader(),
        feetroqua_wowJs(),
        feetroqua_navbar(),
        feetroqua_counterUp(),
        feetroqua_owlCarousel(),
        feetroqua_navScrollSpy(),
        feetroqua_scrollIt(),
        feetroqua_magnificPopup(),
        feetroqua_isotopeGallery(),
        feetroqua_copyrightDynamicYear(),
        feetroqua_skillsBar(),
        feetroqua_ripplesEffect(),
        feetroqua_glitchEffect();
});
/* ------------------------------------------------------------------- */
/* 01.Preloader
/* ------------------------------------------------------------------- */
function feetroqua_preloader() {
    "use-strict";

    // Variables
    var preloaderWrap           = $('.preloader-wrap'),
        loaderInner             = $('.preloader-wrap .preloader-inner');

    $(window).ready(function(){
        loaderInner.fadeOut();
        preloaderWrap.delay(500).fadeOut('slow');
    });
}
/* ------------------------------------------------------------------- */
/* 02.Wow Js
/* ------------------------------------------------------------------- */
function feetroqua_wowJs(){
    "use-strict";

    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true,
        scrollContainer: null
    });
    wow.init();
}
/* ------------------------------------------------------------------- */
/* 03.Navbar
/* ------------------------------------------------------------------- */
function feetroqua_navbar() {
    "use-strict";

    // Variables
    let header              = $('.header'),
        logoTransparent     = $(".logo-transparent"),
        scrollTopBtn        = $(".scroll-top-btn"),
        logoNormal          = $(".logo-normal"),
        windowWidth         = $(window).innerWidth(),
        scrollTop           = $(window).scrollTop(),
        $dropdown           = $(".dropdown"),
        $dropdownToggle     = $(".dropdown-toggle"),
        $dropdownMenu       = $(".dropdown-menu"),
        showClass           = "show";

    // When Window On Scroll
    $(window).on('scroll',function(){
        let scrollTop       = $(this).scrollTop();

        if(scrollTop > 100 ) {
            header.addClass('header-shrink');
            scrollTopBtn.addClass('active');
            logoTransparent.hide();
            logoNormal.show();
        }else {
            header.removeClass('header-shrink');
            scrollTopBtn.removeClass('active');
            logoTransparent.show();
            logoNormal.hide();
        }
    });

    // The same process is done without page scroll to prevent errors.
    if(scrollTop > 100 ) {
        header.addClass('header-shrink');
        scrollTopBtn.addClass('active');
        logoTransparent.hide();
        logoNormal.show();
    }else {
        header.removeClass('header-shrink');
        scrollTopBtn.removeClass('active');
        logoTransparent.show();
        logoNormal.hide();
    }

    // Window On Resize Hover Dropdown
    $(window).on("resize", function() {
        let windowWidth  = $(this).innerWidth();

        if ( windowWidth > 991 ) {
            $dropdown.hover(
                function() {
                    let hasShowClass  =  $(this).hasClass(showClass);
                    if( hasShowClass!==true ){
                        $(this).addClass(showClass);
                        $(this).find($dropdownToggle).attr("aria-expanded", "true");
                        $(this).find($dropdownMenu).addClass(showClass);
                    }
                },
                function() {
                    $(this).removeClass(showClass);
                    $(this).find($dropdownToggle).attr("aria-expanded", "false");
                    $(this).find($dropdownMenu).removeClass(showClass);
                }
            );
        }else {
            $dropdown.off("mouseenter mouseleave");
            header.find('.main-menu').collapse('hide');
        }
    });
    // The same process is done without page scroll to prevent errors.
    if (windowWidth > 991 ) {
        $dropdown.hover(
            function() {
                const $this = $(this);

                var hasShowClass  = $this.hasClass(showClass);

                if(hasShowClass!==true){
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                }
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
        );
    }else {
        $dropdown.off("mouseenter mouseleave");
    }
}
/* ------------------------------------------------------------------- */
/* 04.Counter Up
/* ------------------------------------------------------------------- */
function feetroqua_counterUp(){
    "use-strict";

    // Variables
    var counterItem         = $('.counter');

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });
}
/* ------------------------------------------------------------------- */
/* 05.Owl Carousel
/* ------------------------------------------------------------------- */
function feetroqua_owlCarousel() {
    "use-strict";

    // Variables
    var partnersCarousel       = $('.partners-carousel'),
        testimonialsCarousel   = $('.testimonials-carousel'),
        blogsCarousel   = $('.blogs-carousel'),
        portfolioCarousel      = $('.portfolio-carousel');

    // Partners Carousel
    partnersCarousel.owlCarousel({
        loop:true,
        margin:20,
        dots:false,
        nav:false,
        autoplay:true,
        autoplayTimeout:4000,
        autoplayHoverPause:true,
        navText: ['<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>'],
        responsive: {
            0: {
                items: 3
            },
            576: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 7
            }
        }
    });
    // Testimonial Carousel
    testimonialsCarousel.owlCarousel({
        loop:true,
        margin:30,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768: {
                items:2
            },
            1000:{
                items:2
            }
        }
    });
    // Blog Carousel
    blogsCarousel.owlCarousel({
        loop:true,
        margin:0,
        nav:false,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:3000,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            768: {
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    // Portfolio Single Carousel
    portfolioCarousel.owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots:false,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        stagePadding:0,
        smartSpeed:3000,
        navText: ["<span class='fa fa-angle-left'></span>","<span class='fa fa-angle-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
}
/* ------------------------------------------------------------------- */
/* 06.ScrollSpy
/* ------------------------------------------------------------------- */
function feetroqua_navScrollSpy() {
    "use-strict";

    // Scroll Spy
    $('body').scrollspy({
        target: '#fixedNavbar',
        offset: 95
    });
}
/* ------------------------------------------------------------------- */
/* 07.ScrollIt
/* ------------------------------------------------------------------- */
function feetroqua_scrollIt() {
    "use-strict";

    $.scrollIt({
        upKey: 38,
        downKey: 40,
        easing: "swing",
        scrollTime: 600,
        activeClass: "active",
        onPageChange: null,
        topOffset: -15
    });
}
/* ------------------------------------------------------------------- */
/* 08.Magnific Popup
/* ------------------------------------------------------------------- */
function feetroqua_magnificPopup() {

    "use-strict";

    // Variables
    var portfolioGrid          = $('.portfolio-grid');
    videoPopup             = $('.popup-youtube');

    // Magnific Popup Video Iframe
    videoPopup.magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
        removalDelay: 300
    });

    //  Portfolio Gallery Popup */
    portfolioGrid.magnificPopup({
        delegate: '.portfolio-zoom-link',
        type: 'image',
        removalDelay: 350,
        preloader: true,
        fixedContentPos: false,
        gallery: {
            enabled: true
        }
    });
}
/* ------------------------------------------------------------------- */
/* 09.Isotopğe Gallery
/* ------------------------------------------------------------------- */
function feetroqua_isotopeGallery() {
    "use-strict";

    // Variables
    var portfolioFilterBtn     = $('.portfolio-filter > a'),
        portfolioGalleryWrap   = $('.portfolio-gallery');

    // Porfolio Filtering Click Events
    portfolioFilterBtn.on("click", function() {
        portfolioFilterBtn.removeClass('current');
        $(this).addClass('current');
    });

    // Portfolio Masonary Gallery
    portfolioGalleryWrap.imagesLoaded(function() {
        var grid = $('.portfolio-gallery').isotope({
            itemSelector: '.glry-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.glry-item',
            }
        });

        // filter items on button click
        portfolioFilterBtn.on('click', function() {
            var filterValue = $(this).attr('data-gallery-filter');
            grid.isotope({
                filter: filterValue
            });
        });
    });
}
/* ------------------------------------------------------------------- */
/* 10.Copyright
/* ------------------------------------------------------------------- */
function feetroqua_copyrightDynamicYear() {
    "use-strict";

    // Variables
    var fullYearCopyright       = $('#fullYearCopyright'),
        getFullYearDate         = new Date().getFullYear();

    fullYearCopyright.text(getFullYearDate);

    $('[data-toggle="tooltip"]').tooltip();
}
/* ------------------------------------------------------------------- */
/* 11.Skills Bar
/* ------------------------------------------------------------------- */
function feetroqua_skillsBar(){
    "use-strict";

    // Variables
    var skillsItem              = $('.skills-item');

    skillsItem.each(function(){
        // Variables
        var skillPercent        = $(this).find(".skills-progress-value").attr("data-percent");

        $(this).find(".skills-progress-value").css("width",skillPercent +"%");
        $(this).find(".skills-item-text .skill-percent").html(skillPercent+"%");
    });
}
/* ------------------------------------------------------------------- */
/* 12.Ripples Effect
/* ------------------------------------------------------------------- */
function feetroqua_ripplesEffect() {
    "use-strict";

    jQuery('.hero-ripless-banner').ripples({
        resolution: 500,
        dropRadius: 20,
        perturbance: 0.04
    });
}
/* ------------------------------------------------------------------- */
/* 13.Glitch Effect
/* ------------------------------------------------------------------- */
function feetroqua_glitchEffect() {
    "use-strict";

    jQuery(".glitch-img").mgGlitch();
}
