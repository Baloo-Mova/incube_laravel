@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Заявка на вирішення питання(проблеми). Ідентифікаційний номер: {{ $problem->id }}</h2>
    </div>

    <hr/>

    <h2 class="text-center">{{ $problem->name}} </h2>

    <div class="row">
        <div class="col-md-8">
            <div>
                <img class="img-responsive preview-image" src="{{ route('images.show', ['id'=> (empty($problem->logo)? 'empty' : $problem->logo),'height'=>'max','width'=>'max']) }}" alt="">
            </div>
            <hr/>
            <div class="btn-toolbar">
                @if(Auth::check())
                @if($problem->status_id != \App\Models\Status::PUBLISHED)
                <div class="btn-group pull-left">
                    <a href="{{ route('problem.edit', ['id'=>$problem->id]) }}"
                       class="btn-primary btn">Оновити</a>
                </div>
                <div class="btn-group pull-left">
                    <a href="{{ route('problem.delete', ['id'=>$problem->id]) }}"
                       onclick="return confirm('Вы точно хотите удалить проэкт?')"
                       class="btn-danger btn">Видалити</a>
                </div>
                @endif
                @endif
            </div>
            <hr/>
            <h4 class="text-center">Опис питання</h4>
            {!!$problem->description!!}
        </div>
        <div class="col-md-4" id="col">
            <div class="panel panel-primary affix-top" id="fix-div">
                <div class="text-center">
                    <h4 class="title-border">Галузь</h4>
                    @if(!$problem->economicActivities->isChildren())
                    <p>{{ $problem->economicActivities->name }}</p>
                    @else
                    <p>{{ $problem->economicActivities->parent->name }}:</p>
                    <div class="clearfix"></div>
                    <span style="margin-left: 20px">{{ $problem->economicActivities->name }}</span>
                    @endif
                </div>
                <div class="text-center">
                    <h4 class="title-border">Країна</h4>
                    <p>{{ $problem->country->name }}</p>
                </div>
                @if(isset($problem->city))
                <div class="text-center">
                    <h4 class="title-border">Регіон</h4>
                    <p>{{ $problem->city->name }}</p>
                </div>
                @endif
                @if(Auth::check() && Auth::user()->can('offer', $problem))
                <div class="text-center">
                    <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span>
                    </a>
                </div>
                <br>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">
                        <span><i class="fa fa-user"></i> Запропонувати проект</span>
                    </a>
                </div>
                <br>
                @endif
            </div>
        </div>
    </div>
    <hr>

</div>
@stop