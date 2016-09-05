$(document).ready(function () {

});

new WOW().init();
 
	        $(window).scroll(function(){
	            if($(this).scrollTop()>0){
	                $('#header1').addClass('navbar-fixed-top');
	            }
	            else if ($(this).scrollTop()<=0){
	                $('#header1').removeClass('navbar-fixed-top');
	            }
	        });
	   