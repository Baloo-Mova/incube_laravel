@extends('frontend.layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row well">
        <div class="col-md-2">
            @include('frontend.personal_area.sidebar')
        </div>
        <div class="col-md-10">
            <div class="page-title text-center">
                <h2>Безпека</h2>
            </div>
            <hr/>
            <ul>Операції з безпеки:</ul>
            <li><a href="{{ url('/password/reset') }}">Змінити пароль</a></li>
            <!--end div-->
        </div>

    </div>
</div>
@stop

