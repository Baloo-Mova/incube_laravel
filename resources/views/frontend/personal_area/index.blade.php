@extends('frontend.layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row well">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked well">
                <li class="active"><a href="{{ route('personal_area.index') }}"><i class="fa fa-home"></i> Кабінет</a></li>
                <li><a href="#"><i class="fa fa-user"></i> Профіль</a></li>
                <li><a href="#"><i class="fa fa-key"></i> Безпека</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="pannel-row">
                <div class="panel">
                    <img class="pic img-circle" src="../img/man-profile.jpg" alt="...">
                    <div class="name"><small>Тест Володимир, Україна</small></div>
                    <a href="#" class="btn btn-xs btn-primary pull-right login" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Змінити зображення</a>
                </div>
            </div>

            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-reply-all"></i> Заявки</a></li>
                <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Оповіщення</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="inbox">

                </div>
            </div>

        </div>
    </div>
</div>
@stop