@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Заявка на вирішення проблеми(завдання). Ідентифікаційний номер: {{ $problem->id }}</h2>
    </div>

    <hr/>



    <div class="row">
        <div>
            <img class="img-responsive preview-image" src="{{ route('images.show', ['id'=> (empty($problem->logo)? 'empty' : $problem->logo),'height'=>'max','width'=>'max']) }}" alt="">
        </div>

        <h4 class="title-border">Статус: </h4>
        <p>{{ $problem->status->name}} </p>
        <h4 class="title-border">Автор: </h4>
        <p>{{ $problem->author->name}} </p>
        <h4 class="title-border">Назва: </h4>
        <p>{{ $problem->name}} </p>
        <h4 class="title-border">Галузь:</h4>
        @if(!$problem->economicActivities->isChildren())
        <p>{{ $problem->economicActivities->name }}</p>
        @else
        <p>{{ $problem->economicActivities->parent->name }}: {{ $problem->economicActivities->name }}</p>
        @endif
        <h4 class="title-border">Країна:</h4>
        <p>{{ $problem->country->name }}</p>
        @if(isset($problem->city))
        <h4 class="title-border">Регіон:</h4>
        <p>{{ $problem->city->name }}</p>
        @endif
        <h4 class="title-border">Опис питання:</h4>
        {!!$problem->description!!}

        <h4 class="title-border">Дата створення: </h4>
        <p>{{ $problem->created_at}} </p>
        <h4 class="title-border">Дата оновлення: </h4>
        <p>{{ $problem->updated_at}} </p>
        <h4 class="title-border">Запропоновані інвестиції: </h4>
        <ul> 
            <li><a href="#">d</a></li>
            <li><a href="#">d</a></li>
        </ul>
        <h4 class="title-border">Запропоновані проекти: </h4>
        <ul> 
            <li><a href="#">d</a></li>
            <li><a href="#">d</a></li>
        </ul>

        <hr/>
        <div class="btn-toolbar">
            <div class="btn-group">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span>
                </a>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-primary">
                    <span><i class="fa fa-user"></i> Запропонувати проект</span>
                </a>
            </div>
        </div>
        <hr/>
        <div class="btn-toolbar">

            <div class="btn-group">
                <a href="{{ route('admin.problem.edit', ['id'=>$problem->id]) }}"
                   class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group">
                <a href="{{ route('admin.problem.delete', ['id'=>$problem->id]) }}"
                   onclick="return confirm('Вы точно хотите удалить проэкт?')"
                   class="btn-danger btn">Видалити</a>
            </div>
            <div class="btn-group pull-left">
                <a href="{{ route('project_viewer.show',['material'=>$problem->id]) }}"
                   class="btn-default btn">Продивитись на стороні клієнта</a>
            </div>
        </div>


    </div>




</div>
@stop