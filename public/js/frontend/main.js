$(document).ready(function() {
  $("#bg-slider").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 1000,
      autoPlay: 10000,
      paginationSpeed : 1000,
      singleItem:true,
      mouseDrag: false,
      transitionStyle : "fade"
  });
    // $(window).scroll(function() {
    //     if ($(this).scrollTop() > 1){
    //         $('#header').addClass("navbar-fixed-top");
    //     }
    //     else{
    //         $('#header').removeClass("navbar-fixed-top");
    //     }
    // });
});

 new WOW().init();
 
 function setEqualHeight(columns)
{
var tallestcolumn = 0;
columns.each(
function()
{
currentHeight = $(this).height();
if(currentHeight > tallestcolumn)
{
tallestcolumn = currentHeight;
}
}
);
columns.height(tallestcolumn);
}
$(document).ready(function() {
setEqualHeight($(".how-it-work > a > div > div > p"));
});