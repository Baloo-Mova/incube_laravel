var options = {
    loop              : true,
    nav               : true,
    items             : 4,
    center            : true,
    dots              : false,
    autoplay          : true,
    autoplayHoverPause: true,
    autoplayTimeout   : 5000,
    smartSpeed        : 1500,
    responsive: {
        0: {
            items: 1
        },
        900: {
            items: 3
        },
        1200:{
            items:4
        }
    },
    navText           : [
        "<i class='fa fa-chevron-left'></i>",
        "<i class='fa fa-chevron-right'></i>"
    ]
};

new WOW().init();

$(window).scroll(function () {
    if ($(this).scrollTop() > 0) {
        $('#header1').addClass('navbar-fixed-top');
        $('#fix-div').removeClass('affix-top').addClass('affix');
        $('#fix-div').width($('#col').width());
    }
    else if ($(this).scrollTop() <= 0) {
        $('#header1').removeClass('navbar-fixed-top');
        $('#fix-div').removeClass('affix').addClass('affix-top');
    }
});

$(window).on('resize', function () {
    $('#fix-div').width($('#col').width());
     
});

function initialize_owl(el, options) {
    el.owlCarousel(options);
}

function destroy_owl(el) {
    el.data('owlCarousel').destroy();
}
	   