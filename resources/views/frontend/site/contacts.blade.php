@extends('frontend.layouts.template')

@section('content')
<div class="content-area">
    <div class="container">
        <div class="row page-title text-center">
            <h2>Контактні дані</h2>
        </div>
        <div class="site-contact">
            <h3 class="text-center">Керівник проекту «InCube» - Начальник відділу проектної діяльності Запорізького національного університету</h3>
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic"
                         src="{{ url('img/kovalenko.jpg')}}"
                         class="img-responsive">


                </div>
                <div class=" col-md-9 col-lg-9 ">
                    <h4>Коваленко Наталія Миколаївна</h4> 
                    <h5><b>тел. </b>(061) 228-75-82</h5>
                    <h5><b>Е-mail:</b> vpd@znu.edu.ua</h5>
                </div>
            </div>
            <hr/>
            <h3 class="text-center">Супровід проекту «InCube» - Фахівець відділу проектної діяльності Запорізького національного університету</h3>
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic"
                         src="{{ url('img/logo.png')}}"
                         class="img-responsive">


                </div>
                <div class=" col-md-9 col-lg-9 ">
                    <h4>Нелепа Лілія Сергіївна</h4> 
                    <!--<h5><b>тел. </b>(061) 228-75-82</h5>
                    <h5><b>Е-mail:</b> vpd@znu.edu.ua</h5>
                    -->
                </div>
            </div>
            <hr/>

            <h3 class="text-center">Створення інтернет-сайту і розвиток його функціональних можливостей - Фахівець відділу проектної діяльності Запорізького національного університету</h3>
            
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img alt="User Pic"
                         src="{{ url('img/logo.png')}}"
                         class="img-responsive">


                </div>
                <div class=" col-md-9 col-lg-9 ">
                    <h4>Терновой Владислав Валентинович</h4> 
                    <!--<h5><b>тел. </b>(061) 228-75-82</h5>-->
                    <h5><b>Е-mail:</b> incube.zp@gmail.com</h5>
                    
                </div>
            </div>
            <hr/>



        </div>
    </div>
    <!-- end container-->
</div> 
<!-- end content area-->
@stop

@section('css')
@stop

@section('js')
@stop