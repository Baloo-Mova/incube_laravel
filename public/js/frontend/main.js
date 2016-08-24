$(window).on('load',function() { // makes sure the whole site is loaded
      $('#status').fadeOut(); // will first fade out the loading animation
      $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
      $('body').delay(350).css({'overflow':'visible'});
    })

$(document).ready(function() {
 
  $("#bg-slider").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 1000,
      autoPlay: 10000,
      paginationSpeed : 1000,
      singleItem:true,
      mouseDrag: false,
      transitionStyle : "fade"
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false 
  });

  $("#testimonial-slider").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 1000,
      pagination : true,
      paginationSpeed : 1000,
      singleItem:true,
      mouseDrag: false,
      transitionStyle : "goDown"
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false 
  });

    $('.more-jobs a').click(function(e){
      e.preventDefault();
      var $this = $(this);
      $this.toggleClass('more-jobs a');
      if($this.hasClass('more-jobs a')){
        $this.text('Менше');     
      } else {
        $this.text('Більше');
      }
    });

    $('.more-jobs a').click(function(){
      $('.table tr.hide-jobs').toggle();
    });


 
})

$(".myBlock").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
});
// Record the last element to be right-clicked, since that information isn't
// passed to the contextmenu click handler that calls top_open_blacklist_ui
var rightclicked_item = null;
if (document.body) {
  document.body.addEventListener("contextmenu", function(e) {
    rightclicked_item = e.srcElement;
  });
  document.body.addEventListener("click", function() {
    rightclicked_item = null;
  });
}

 
// Initializing WOW.JS

 new WOW().init();

$(document).ready(function(ev){
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    });
});
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').removeClass('grid-group-item');$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
function changeView(t){
    switch(t){
        case"grid":$(".product-grid").removeClass("product-listview"),$(".product-grid > div").removeClass("reset-col");
            break;
        case"list":$(".product-grid").addClass("product-listview"),$(".product-grid > div").addClass("reset-col");}};