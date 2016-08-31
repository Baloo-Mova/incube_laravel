$(document).ready(function () {
    $("#bg-slider").owlCarousel({
        navigation     : false, // Show next and prev buttons
        loop:true,
        items: 1,
        mouseDrag: false,
        autoplay:true,
        autoplayHoverPause:true,
        animateIn: 'bounceInRight',
        animateOut: 'bounceOutRight',
        autoplayTimeout: 8000,
        autoplaySpeed: 3000,
        smartSpeed: 3000,
    });

    $('#how-it-work').owlCarousel({
        loop:true,
        navigation:false,
        margin: 30,
        stagePadding: 150,
        dots:false,
        autoplay:true,
        autoplayHoverPause:true,
        autoplayTimeout: 3000,
        smartSpeed: 3000,
    });
});

new WOW().init();