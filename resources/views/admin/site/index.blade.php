@extends('admin.layouts.template')

@section('content')

@include('admin.layouts.partials.slider')

<div class="content-area">
    <div class="container">
        <div class="page-title text-center">
            <h2>Сторінка Адміністрації сайту</h2>
        </div>
        <hr/>
        <div class="text-center">
            <p>
               Ця частина платформи 
               <b><span style='color: #D30072; font-weight: bold;'>In</span><span style="color:#00AEEF; font-weight: bold;">Cube</span></b>
               Доступна лише для користувачів, які мають права для Адміністрування роботи платформи.
            </p>
           
            
        </div>
        <hr/>

    </div>

    <!-- end container-->
</div>
<!-- end content area-->
@stop

@section('css')
@stop
