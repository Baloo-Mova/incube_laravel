@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="page-title text-center">
        <h2>Список поданних питань(проблем)</h2>
    </div>
    <hr/>
    <div class="row">

        <div >
            <a href="{{ route('admin.problem.create') }}" class="btn btn-danger center">Подати питання</a>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><a class="" href="#">Автор</a></th>
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
                                    <th><input type="text" class="form-control" name=""></th>
                                    <th><a class="" href="#"></a></th>
                                </tr>
                                </thead>
                                <tbody class='text-center'>
                                @foreach($problems as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><a href="{{route('admin.users.show', [$item->author_id])}}">{{$item->author_id}}</a></td>
                                        <td>{{$item->name}}</td>
                                        <td>
                                            <strong>{{$item->economicActivities->parent->name or ''}}</strong>
                                            <p>{{$item->economicActivities->name }}</p>
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        <td> {{ $item->status->name }}
                                        </td>
                                        <td>
                                            <a href="{{route('admin.'. strtolower($item->formType->name).'.show', [$item->id])}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            
                                                <a href="{{route('admin.'.strtolower($item->formType->name).'.edit', [$item->id])}}" title="Update" aria-label="Update" data-pjax="0">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>

                                                <a href="{{ route('admin.'.strtolower($item->formType->name).'.delete', ['id'=>$item->id]) }}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
        {!! $problems->links() !!}
    </div>
</div>
@stop

@section('js')

@stop