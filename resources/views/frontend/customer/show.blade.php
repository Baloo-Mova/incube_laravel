@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Заявка на вирішення питання(проблеми). Ідентифікаційний номер: {{ $model->id }}</h2>
    </div>

    <div class="project-viewer-content">
        <div class="panel panel-primary">
            <div class="panel-body"><h3 class="text-center" style="color: #00aeef">{{ $model["problem_name"]}}</h3>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Галузь</div>
                <div class="panel-body text-center">{{ $model->economicActivities->name }}
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Регіон</div>
                <div class="panel-body text-center">{{ $model->region }}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Опис питання</div>
                <div class="panel-body text-center">
                    {!!$model->problem_description!!}
                </div>
            </div>
        </div>
        
    </div>

    <div class="container">
        <div class="btn-toolbar">

            @if(Auth::check() && Auth::user()->id == $model->author_id)
                <div class="btn-group pull-lef">
                    <a href="{{ route('edit') }}" class="btn-primary btn">Оновити</a>
                </div>
                <div class="btn-group pull-lef">
                    <a href="#" class="btn-danger btn">Видалити</a>
                </div>
            @endif

            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span> </a>
            </div>

            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Запропонувати проект</span> </a>
            </div>

        </div>
    </div>
    <div class="product-info">
        <div class="tab-pane fade in active" id="service-one">
            <section class="product-info">
                <h4>Інше</h4>
                <blockquote>
                    <p><em> {{ $model["other"] }}</em> </p>
                </blockquote>
            </section>
        </div>
        <hr/>
    </div>


</div>

@stop
