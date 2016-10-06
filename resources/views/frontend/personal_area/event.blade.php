@extends('frontend.layouts.template')

@section('content')

<div class="container-fluid">
    <div class="row well">
        <!-- Begin sidebar block-->
        <div class="col-md-2">
            @include('frontend.personal_area.sidebar')
        </div>
        <!-- End sidebar block-->
        <!-- Begin content block-->
        <div class="col-md-10">
            <div class="pannel-row">
                <div class="panel background-logo" style="background-image: url('{{ route('images.show', ['id'=> (empty($thisUser->bg_logo)? 'empty' : $thisUser->bg_logo),'height'=>'max','width'=>'max']) }}')">
                    <img class="pic img-circle" src="{{ route('images.show', ['id'=> (empty($thisUser->logo)? 'empty' : $thisUser->logo),'height'=>'200','width'=>'200']) }}" alt="">
                    <div class="name">
                        <small>{{$thisUser->name}}, {{ empty($thisUser->country_id)? '' : $thisUser->country->name}}</small>
                    </div>
                    <a href="#" class="btn btn-xs btn-primary pull-right login" style="margin:10px;"><span class="glyphicon glyphicon-picture"></span> Змінити зображення</a>
                </div>
            </div>

            <div class="page-title text-center">
                <h2>Сповіщення</h2>
            </div>

            <hr>
            <!-- Begin content table-->
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th><a class="" href="#"></a>Обрати</th>
                    <th>Id</th>
                    <th><a class="" href="#">Тема</a></th>
                    <th><a class="" href="#">Дата створення</a></th>
                    <th><a class="" href="#">Статус</a></th>
                    <th><a class="" href="#">Дії</a></th>

                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th><input type="text" class="form-control" name=""></th>
                    <th><input type="text" class="form-control" name=""></th>
                    <th><input type="text" class="form-control" name=""></th>
                    <th></th>

                </tr>
                </thead>
                <tbody class='text-center'>

                @foreach($usersNotifications as $item)
                    <tr class="<?php if(rand(0,1)!=0) echo 'new-message';?>">
                        <td><input type="checkbox" value=""></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            <!-- End content table-->
        </div>
        <!-- End content block-->
    </div>
</div>
@stop
