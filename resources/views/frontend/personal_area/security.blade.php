@extends('frontend.layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row well">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked well">
                <li><a href="{{ route('personal_area.index') }}"><i class="fa fa-home"></i> Кабінет</a></li>
                <li><a href="{{route('personal_area.edit')}}"><i class="fa fa-myUser"></i> Профіль</a></li>
                <li class="active"><a href="{{route('personal_area.security')}}"><i class="fa fa-key"></i> Безпека</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
            </ul>
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

