@extends('frontend.layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row well">
            <div class="col-md-2">
                 @include('frontend.personal_area.sidebar')
            </div>
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
                        <li><a href="#event" data-toggle="tab"><i class="fa fa-clock-o"></i> Оповіщення</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <!--customer begin-->
                    <div class="tab-pane active" id="customerProj">
                        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><a class="" href="#">Назва питання</a></th>
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
                                @foreach($usersCustomerProjects as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <strong>{{$item->economicActivities->parent->name or ''}}</strong>
                                            <p>{{$item->economicActivities->name }}</p>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td> {{ $item->status->name }}
                                        </td>
                                        <td>
                                            <a href="{{url('/customer/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            @if($item->status->id!=2)
                                                <a href="{{url('/customer/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>

                                                <a href="{{url('/customer/delete/'. $item->id)}}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $usersCustomerProjects->links() }}
                        </div>
                    </div>
                    <!--customer end -->

                    <!--investor begin-->
                    <div class="tab-pane" id="investorProj">
                        <div class="grid-view">
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
                                            <a href="{{url('/investor/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            @if($item->status->id!=2)
                                                <a href="{{url('/investor/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>

                                                <a href="{{url('/investor/delete/'. $item->id)}}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $usersInvestorProjects->links() }}
                        </div>
                    </div>
                    
                    <!--investor end -->

                    <!--designer begin-->
                    <div class="tab-pane" id="designerProj">
                        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><a class="" href="#">Назва проекту</a></th>
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
                                @foreach($usersDesignerProjects as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <strong>{{$item->economicActivities->parent->name or ''}}</strong>
                                            <p>{{$item->economicActivities->name }}</p>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td> {{ $item->status->name }}
                                        </td>
                                        <td>
                                            <a href="{{route("designer.show",['id'=>$item->id])}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            @if($item->status->id!=2)
                                                <a href="{{route("designer.edit",['id'=>$item->id])}}" title="Update" aria-label="Update" data-pjax="0">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>

                                                <a href="{{route("designer.delete",['id'=>$item->id])}}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $usersDesignerProjects->links() }}
                        </div>
                    </div>
                
                <!--designer end -->
                <!-- executer begin-->
                <div class="tab-pane" id="executerProj">
                    <div class="grid-view">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th><a class="" href="#" data-sort="executor_fname">ПІБ</a></th>
                                    <th><a class="" href="#">ІД прив'язаного проекту</a></th>
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
                            <tbody class="text-center">
                                @foreach($usersExecutorProjects as $item)
                                <tr>    
                                    <td>{{$item->id}}</td>
                                    <td>
                                        <p>{{$item->second_name." ".$item->first_name." ".$item->last_name}}</p>
                                       
                                    </td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td> {{ $item->status->name }}
                                    </td>
                                    <td>
                                        <a href="{{route("executor.show",['id'=>$item->id])}}" title="View" aria-label="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        @if($item->status->id!=2)  
                                        <a href="{{route("executor.edit",['id'=>$item->id])}}" title="Update" aria-label="Update" data-pjax="0">
                                            <span class="glyphicon glyphicon-pencil"></span></a> 

                                                <a href="{{route("executor.delete",['id'=>$item->id])}}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        {{ $usersExecutorProjects->links() }}
                        </div>
                    </div>


                    <!--employer begin-->
                    <div class="tab-pane" id="employerProj">
                        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><a class="" href="#">Назва організації</a></th>
                                    <th><a class="" href="#">Вакансії</a></th>
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
                                @foreach($usersEmployerProjects as $item)
                                <tr>    
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->org_name}}</td>
                                    <td>{{$item->short_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td> {{ $item->status->name }}
                                    </td>
                                    <td>
                                        <a href="{{route("employer.show",['id'=>$item->id])}}" title="View" aria-label="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        @if($item->status->id!=2)  
                                        <a href="{{route("employer.edit",['id'=>$item->id])}}" title="Update" aria-label="Update" data-pjax="0">
                                            <span class="glyphicon glyphicon-pencil"></span></a> 

                                                <a href="{{route("employer.delete",['id'=>$item->id])}}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                            {{ $usersEmployerProjects->links() }}
                        </div>
                    </div>
                    <!--employer end -->

                    <!--event begin-->
                    <div class="tab-pane" id="event">
                        <div class="grid-view">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><a class="" href="#"></a>Обрати</th>
                                    <th>Id</th>
                                    <th><a class="" href="#">Тема</a></th>
                                    <th><a class="" href="#">Відправник</a></th>
                                    <th><a class="" href="#">Отримувач</a></th>
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
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th></th>
                                   
                                </tr>
                                </thead>
                                <tbody class='text-center'>
                                @foreach($usersNotifications as $item)
                                <tr class="<?php if(rand(0,1)!=0) echo 'new-message';?>">    
                                    <td><input type="checkbox" value=""></td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{ $item->created_at }}</td>
                                    <td> {{ $item->status->name }}
                                    </td>
                                    <td>
                                        <a href="{{url('/employer/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        @if($item->status->id!=2)  
                                        <a href="{{url('/employer/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
                                            <span class="glyphicon glyphicon-pencil"></span></a> 

                                                <a href="#" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!--event end -->
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script>
        $(function () {

            //window.location.hash = "customerProj";

            $(".pagination a").on('click', function(e){
                e.preventDefault();
               var tmp_hash = window.location.hash,
                    tmp_search = this.search,
                       tmp_url = this;
                window.location.href = this+tmp_hash;
                

            });

            $('a[href="#customerProj"]').on('click', function () {
                window.location.hash = "customerProj";
            });
            $('a[href="#investorProj"]').on('click', function () {
                window.location.hash = "#investorProj";
            });
            $('a[href="#designerProj"]').on('click', function () {
                window.location.hash = "designerProj";
            });
            $('a[href="#executerProj"]').on('click', function () {
                window.location.hash = "executerProj";
            });

            $('a[href="#event"]').on('click', function () {
                window.location.hash = "event";
            });
        });
    </script>
@stop