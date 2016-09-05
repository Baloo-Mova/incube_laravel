@extends('frontend.layouts.template')

@section('content')
    <div class="container-fluid">
        <div class="row well">
            <div class="col-md-2">
                <ul class="nav nav-pills nav-stacked well">
                    <li class="active">
                        <a href="{{ route('personal_area.index') }}"><i class="fa fa-home"></i> Кабінет</a></li>
                    <li>
                        <a href="{{  route('personal_area.edit',['personal'=>$thisUser->id])   }}"><i class="fa fa-user"></i> Профіль</a>
                    </li>
                    <li><a href="#"><i class="fa fa-key"></i> Безпека</a></li>
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="pannel-row">
                    <div class="panel background-logo" style="background-image: url('{{ empty($user->bg_logo)? '../img/bg_image.jpg' : url('/users/image/'.$user->bg_logo)}}')">

                        <img class="pic img-circle" src="{{ empty($user->logo)? '../img/man-profile.jpg' : url('/users/image/'.$user->logo)}}" alt="...">
                        <div class="name">
                            <small>{{$thisUser->name}}, {{$thisUser->country->name}}</small>
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
                                        <td>{{$item->problem_name}}</td>
                                        <td>
                                            <strong>{{($item->economicActivities->getParent() != null ? $item->economicActivities->getParent()->name : '')}}</strong>
                                            <p>{{$item->economicActivities->name }}</p>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>@if($item->status!=0) <span class="label label-success">Опубліковано</span> @endif
                                            @if($item->status==0) <span class="label label-danger">Не Опубліковано</span> @endif 
                                        </td>
                                        <td>
                                            <a href="{{url('/customer/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            @if($item->status==0)
                                                <a href="{{url('/customer/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
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
                                        <td>{{$item->investor_name}}</td>
                                        <td>
                                            <strong>{{($item->economicActivities->getParent() != null ? $item->economicActivities->getParent()->name : '')}}</strong>
                                            <p>{{$item->economicActivities->name }}</p>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>@if($item->status!=0) <span class="label label-success">Опубліковано</span> @endif
                                            @if($item->status==0) <span class="label label-danger">Не Опубліковано</span> @endif 
                                        </td>
                                        <td>
                                            <a href="{{url('/investor/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            @if($item->status==0)
                                                <a href="{{url('/investor/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
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
                                        <td>{{$item->project_name}}</td>
                                        <td>
                                            <strong>{{($item->economicActivities->getParent() != null ? $item->economicActivities->getParent()->name : '')}}</strong>
                                            <p>{{$item->economicActivities->name }}</p>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td>@if($item->status!=0) <span class="label label-success">Опубліковано</span> @endif
                                            @if($item->status==0) <span class="label label-danger">Не Опубліковано</span> @endif 
                                        </td>
                                        <td>
                                            <a href="{{url('/designer/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            @if($item->status==0)
                                                <a href="{{url('/designer/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
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
                                        <p>{{$item->executor_fname}}</p>
                                        <p>{{$item->executor_sname}}</p>
                                        <p>{{$item->executor_thname}}</p>
                                    </td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>@if($item->status!=0) <span class="label label-success">Опубліковано</span> @endif  
                                        @if($item->status==0) <span class="label label-danger">Не Опубліковано</span> @endif  
                                    </td>
                                    <td>
                                        <a href="{{url('/executor/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        @if($item->status==0)  
                                        <a href="{{url('/executor/edit/'. $item->id)}}" title="Update" aria-label="Update" data-pjax="0">
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
                                    <td>@if($item->status!=0) <span class="label label-success">Опубліковано</span> @endif  
                                        @if($item->status==0) <span class="label label-danger">Не Опубліковано</span> @endif  
                                    </td>
                                    <td>
                                        <a href="{{url('/employer/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        @if($item->status==0)  
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
                    <!--employer end -->

                    <!--event begin-->
                    <div class="tab-pane" id="event">
                        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><a class="" href="#">Тема</a></th>
                                    <th><a class="" href="#">Відправник</a></th>
                                    <th><a class="" href="#">Отримувач</a></th>
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
                                    <td>{{$item->short_name}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>@if($item->status!=0) <span class="label label-success">Опубліковано</span> @endif  
                                        @if($item->status==0) <span class="label label-danger">Не Опубліковано</span> @endif  
                                    </td>
                                    <td>
                                        <a href="{{url('/employer/show/'. $item->id)}}" title="View" aria-label="View" data-pjax="0">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                        @if($item->status==0)  
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
