@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="page-title text-center">
        <h2>Список поданних питань(проблем)</h2>
    </div>
    <hr/>
    <div class="row">

        <div >
            <a href="{{ route('admin.users.create') }}" class="btn btn-danger center">Створити користувача</a>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="grid-view">
                            <table class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th><a class="" href="#">ПІБ</a></th>
                                    <th><a class="" href="#">e-mail</a></th>
                                    <th><a class="" href="#">Країна</a></th>
                                    <th><a class="" href="#">Права</a></th>
                                    <th><a class="" href="#">Дата створення</a></th>
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
                                @foreach($ListUsers as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td><a href="#">{{$item->name}}</a></td>
                                        <td>{{$item->email}}</td>
                                        <td>
                                           {{$item->country->name or ''}}
                                        </td>
                                        <td> {{ $item->user_type_id }}
                                        </td>
                                        <td>{{$item->created_at}}</td>
                                        
                                        <td>
                                            <a href="{{route('admin.users.show', [$item->id])}}" title="View" aria-label="View" data-pjax="0">
                                                <span class="glyphicon glyphicon-eye-open"></span>
                                            </a>
                                            
                                                <a href="{{route('admin.users.edit', [$item->id])}}" title="Update" aria-label="Update" data-pjax="0">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>

                                                <a href="{{ route('admin.users.delete', ['id'=>$item->id]) }}" title="Delete" aria-label="Delete" data-confirm="Ви Дійсно хочете видалити заявку?" data-method="post" data-pjax="0">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
         {!! $ListUsers->links() !!}
    </div>
</div>
@stop

@section('js')

@stop