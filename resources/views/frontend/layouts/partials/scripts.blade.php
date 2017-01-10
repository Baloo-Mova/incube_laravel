<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/vendor/modernizr-2.6.2.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/wow.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/owl.carousel.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/plugins.js") }}" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset("js/toastr.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/moment.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/bootstrap-datetimepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/fileinput.min.js") }}" type="text/javascript"></script>
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script src="{{ asset("js/frontend/main.js") }}" type="text/javascript"></script>
<script>
$(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});

</script>
{!! Toastr::render() !!}
@yield('js')
