$(document).ready(function () {

});

new WOW().init();
 
	        $(window).scroll(function(){
	            if($(this).scrollTop()>0){
	                $('#header1').addClass('navbar-fixed-top');
                        $('#fix-div').removeClass('affix-top').addClass('affix');                                            
	                $('#fix-div').width($('#col').width());
                    }
	            else if ($(this).scrollTop()<=0){
	                $('#header1').removeClass('navbar-fixed-top');
                        $('#fix-div').removeClass('affix').addClass('affix-top');
	            }
	        });
$(window).on('resize',function () {
   $('#fix-div').width($('#col').width());
});
  
	   