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

                </tr>
                <tr>
                    <th class="text-center"><input type="checkbox" name="notify_select_all" id="notify_select_all" title="Обрати все"></th>
                    <th><input type="text" class="form-control" name=""></th>
                    <th><input type="text" class="form-control" name=""></th>
                    <th><input type="text" class="form-control" name=""></th>
                    <th><input type="text" class="form-control" name=""></th>

                </tr>
                </thead>
                <tbody class='text-center'>

                <form method="POST" enctype="multipart/form-data" class="form-horizontal" action="{!! route('personal_area.events_read') !!}">
                    {{ csrf_field() }}

                @foreach($usersNotifications as $item)
                    <tr class="{{ empty($item->read_at)? 'new-message' : ''}}">
                        <td><input type="checkbox" class="notify_checkbox" name="notify_id[]" value="{!! $item->id !!}"></td>
                        <td>{!! $item->id !!}</td>
                        <td>
                            @if($item->type != 'App\Notifications\NewOffer')
                            {{config('eventsstatuses.'.$item->type)}}
                                @else
                            <a style="color: #00A2DE;" href="{{ route('project_viewer.show',['material'=>$item->data['offer_id']]) }}"> {{config('eventsstatuses.'.$item->type)}}</a>
                            @endif
                        </td>
                        <td>{!! $item->created_at !!}</td>
                        <td>{{ empty($item->read_at)? 'Нове' : 'Прочитане'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <input value="Зробити відмічені сповіщення прочитаними" type="submit" class="btn btn-info">

            <hr>

            {!! $usersNotifications->links() !!}
            <!-- End content table-->
        </div>
        <!-- End content block-->
    </div>
</div>
@stop
@section('js')
    <script>
        $(function () {
            $("#notify_select_all").on('change',function(){
                if($("#notify_select_all").prop("checked") != true){
                    $('.notify_checkbox').prop('checked', false);
                }else{
                    $('.notify_checkbox').prop('checked', this.checked);
                }

            });
        });
    </script>
@stop
