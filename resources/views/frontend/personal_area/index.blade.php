@extends('frontend.layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row well">
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked well">
                    <li class="active">
                        <a href="{{ route('personal_area.index') }}"><i class="fa fa-home"></i> Кабінет</a></li>
                    <li><a href="#"><i class="fa fa-user"></i> Профіль</a></li>
                    <li><a href="#"><i class="fa fa-key"></i> Безпека</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="pannel-row">
                    <div class="panel">
                        <img class="pic img-circle" src="../img/man-profile.jpg" alt="...">
                        <div class="name">
                            <small>Тест Володимир, Україна</small>
                        </div>
                        <a href="#" class="btn btn-xs btn-primary pull-right login" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Змінити зображення</a>
                    </div>
                </div>
                <div class="select-tabs">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#inbox" data-toggle="tab"><i class="fa fa-reply-all"></i> Заявки</a>
                        </li>
                        <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Оповіщення</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="inbox">
                        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>
                                        <a class="" href="{{url('/personal-area/index' . '?sort=executor_fname')}}" data-sort="executor_fname">ПІБ</a>
                                    </th>
                                    <th><a class="" href="#">Назва проекту</a></th>
                                    <th><a class="" href="#">Дата створення</a></th>
                                    <th><a class="" href="#">Статус</a></th>
                                    <th><a class="" href="#"></a></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th><a class="" href="#"></a></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($usersExecutorProjects as $item)
                                    <tr>
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->shortname}}</th>
                                        <th>{{$item->id}}</th>
                                        <th>{{$item->created_at}}</th>
                                        <th>@if($item->status!=0) Опубліковано @endif
                                            @if($item->status==0) Не Опубліковано @endif
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop