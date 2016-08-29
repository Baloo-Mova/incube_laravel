@extends('frontend.layouts.template')

@section('content')
<div class="content-area">
    <div class="container">
        <div class="row page-title text-center">
            <h2>Про Нас</h2>
        </div>
        <div id="slider1" data-name="Investor">

        </div>
    </div>
    <!-- end container-->
</div> 
<!-- end content area-->
@stop

@section('css')
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $("#slider1").owlCarousel({
                jsonPath : '{{ url('api/json') }}/'+$("#slider1").data('name'),
                jsonSuccess : customDataSuccess
            });

            function customDataSuccess(data){
                var content = "";
                console.log(data);
                for(var i in data["items"]){
                    content += "<img src=\"" +img+ "\" alt=\"" +alt+ "\">"
                }
                $("#slider1").html(content);
            }

        });
    </script>
@stop