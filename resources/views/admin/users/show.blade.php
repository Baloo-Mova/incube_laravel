@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Користувач: {{ $user->id }}</h2>
    </div>

    <hr/>



    <div class="row">
        <div class="row well">
            <div class="col-md-10">
                <div class="pannel-row">
                    <div class="panel background-logo" style="background-image: url('{{ route('images.show', ['id'=> (empty($user->bg_logo)? 'empty' : $user->bg_logo),'height'=>'max','width'=>'max']) }}')">

                        <img class="pic img-circle" src="{{ route('images.show', ['id'=> (empty($user->logo)? 'empty' : $user->logo),'height'=>'200','width'=>'200']) }}" alt="">
                        <div class="name">
                            <small>{{$user->name}}, {{ empty($user->country_id)? '' : $user->country->name}}</small>
                        </div>
                        <a href="#" class="btn btn-xs btn-primary pull-right login" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Змінити зображення</a>
                    </div>
                </div>
                <div class="select-tabs">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class='active'>
                            <a href="#customerProj" data-toggle="tab"><i class="fa fa-caret-down" f></i> Питання(проблеми)</a>
                        </li>
                        <li>
                            <a href="#investorProj" data-toggle="tab"><i class="fa fa-caret-down"></i> Заявки на інвестування</a>
                        </li>
                        <li><a href="#designerProj" data-toggle="tab"><i class="fa fa-caret-down"></i> Проекти</a></li>
                        <li><a href="#executerProj" data-toggle="tab"><i class="fa fa-caret-down"></i> Резюме</a></li>
                        <li>
                            <a href="#employerProj" data-toggle="tab"><i class="fa fa-caret-down"></i> Списки вакансій</a>
                        </li>
                        <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Оповіщення</a></li>
                    </ul>
                </div>


                <hr/>
                <div class="btn-toolbar">

                    <div class="btn-group">
                        <a href="{{ route('admin.users.edit', ['id'=>$user->id]) }}"
                           class="btn-primary btn">Оновити</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('admin.users.delete', ['id'=>$user->id]) }}"
                           onclick="return confirm('Вы точно хотите удалить проэкт?')"
                           class="btn-danger btn">Видалити</a>
                    </div>
                    {{--  <div class="btn-group pull-left">
                <a href="{{ route('users.show', ['id'=>$user->id]) }}"
                    class="btn-default btn">Продивитись на стороні клієнта</a>
                </div>--}}
            </div>


        </div>
    </div>


</div>
</div>
@stop