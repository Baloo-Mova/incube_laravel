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
                    <div class="panel background-logo"
                         style="background-image: url('{{ route('images.show', ['id'=> (empty($thisUser->bg_logo)? 'empty' : $thisUser->bg_logo),'height'=>'max','width'=>'max']) }}')">
                        <img class="pic img-circle"
                             src="{{ route('images.show', ['id'=> (empty($thisUser->logo)? 'empty' : $thisUser->logo),'height'=>'200','width'=>'200']) }}"
                             alt="">
                        <div class="name">
                            <small>{{$thisUser->name}}
                                , {{ empty($thisUser->country_id)? '' : $thisUser->country->name}}</small>
                        </div>
                        <a href="#" class="btn btn-xs btn-primary pull-right login" style="margin:10px;"><span
                                    class="glyphicon glyphicon-picture"></span> Змінити зображення</a>
                    </div>
                </div>

                <div class="page-title text-center">
                    <h2>Список інвестиційних заявок</h2>
                </div>

                <hr>
                <!-- Begin content table-->
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th><a class="" href="#">Назва</a></th>
                        <th><a class="" href="#">Галузь</a></th>
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
                    <tbody class='text-center'>
                    @foreach($usersInvestorProjects as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <strong>{{$item->economicActivities->parent->name or ''}}</strong>
                                <p>{{$item->economicActivities->name }}</p>
                            </td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                {{ $item->status->name }}
                            </td>
                            <td>
                                <a href="{{route('project_viewer.show',['material'=>$item->id])}}" title="View"
                                   aria-label="View"
                                   data-pjax="0">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <a href="{{url('/investor/edit/'. $item->id)}}" title="Update" aria-label="Update"
                                   data-pjax="0">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{url('/investor/delete/'. $item->id)}}" title="Delete" aria-label="Delete"
                                   data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- End content table-->
                {{ $usersInvestorProjects->links() }}
            </div>
            <!-- End content block-->
        </div>
    </div>
@stop
