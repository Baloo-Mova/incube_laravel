<script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/vendor/modernizr-2.6.2.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/wow.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/main.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/owl.carousel.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/frontend/plugins.js") }}" type="text/javascript"></script>
{{--<script src="{{ asset("js/frontend/jquery.simpleLens.js") }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset("js/frontend/sliders/jquery.simpleGallery.js") }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset("js/frontend/sliders/slick.js") }}" type="text/javascript"></script>--}}
{{--<script src="{{ asset("js/frontend/sliders/custom.js") }}" type="text/javascript"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script src="{{ asset("js/toastr.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/moment.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/bootstrap-datetimepicker.min.js") }}" type="text/javascript"></script>
<script src="{{ asset("js/fileinput.min.js") }}" type="text/javascript"></script>
{!! Toastr::render() !!}
@yield('js')
