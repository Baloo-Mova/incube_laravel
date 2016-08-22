@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Заявка інвестора. Ідентифікаційний номер: {{ $model->id }}</h2>
    </div>

    <div id="content" class="project-viewer-content">
        <div class="panel panel-primary">
            <div class="panel-body"><h3 class="text-center" style="color: #00aeef">{{ $model["investor_name"]}}</h3>
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
                <div class="panel-heading text-center">Регіон інвестування</div>
                <div class="panel-body text-center">{{ $model->region }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Етап проекту</div>
                <div class="panel-body text-center">
                    {{ $model->stage_project }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Планова рентабельність проекту</div>
                <div class="panel-body text-center">{{ $model->plan_rent }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Сума, яку готові інвестувати</div>
                <div class="panel-body text-center">
                    <?= number_format($model["investor_cost"], 0, '.', ' ') ?> $
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Період реалізації інвестиційного проекту</div>
                <div class="panel-body text-center">{{$model->duration_project}}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Термін повернення вкладених коштів</div>
                <div class="panel-body text-center">{{ $model->term_refund }}
                </div>
            </div>
        </div>
    </div>

    <!--<div class="row">
        <div class="col-md-4 col-sm-4 ">
            <div class="btn-group">   
                <a href="#" class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group">
                <a href="#" class="btn-danger btn">Видалити</a>
            </div>
        </div>
        <div class="col-md-8 col-sm-8 text-right">
            <div class="btn-group">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Запропонувати проект</span> </a>
            </div>

            <div class="btn-group">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Прийняти участь</span> </a>
            </div>
        </div>
    </div>
</div>
<br/>-->
    <div class="container">
        <div class="btn-toolbar">

            <div class="btn-group pull-lef">         
                <a href="#" class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group pull-lef">
                <a href="#" class="btn-danger btn">Видалити</a>
            </div>



            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Запропонувати проект</span> </a>
            </div>

            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Прийняти участь</span> </a>
            </div>

        </div>
    </div>
    <div class="product-info">

        <div class="tab-pane fade in active" id="service-one">
            <section class="product-info">

                <h4>Інше</h4>
                <blockquote>


                    <p><em> {{ $model["other"] }}</em> </p>
            </section>
            </blockquote>
        </div>


        <hr/>
    </div>


</div>

@stop
