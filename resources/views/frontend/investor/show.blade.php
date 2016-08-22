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
                    <div class="panel-heading text-center">Етап проекту</div>
                    <div class="panel-body text-center">
                        {{ $model->stage_project }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Галузь</div>
                    <div class="panel-body text-center">
                        {{ $model->economicActivities->name }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Регіон інвестування</div>
                    <div class="panel-body text-center">{{ $model->region }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Сума, яку готові інвестувати</div>
                    <div class="panel-body product-price text-center"><?= number_format($model["investor_cost"], 0, '.', ' ') ?> $
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
                    <div class="panel-heading text-center">Регіон інвестування</div>
                    <div class="panel-body text-center">{{ $model->region }}
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
        </div>
        <div class="text-right">
            <div class="btn-group">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Запропонувати проект</span> </a>
            </div>
            <div class="btn-group">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Прийняти участь</span> </a>
            </div>
        </div>
    </div>
    <div class="col-md-12 product-info">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="service-one">
                <section class="container product-info">
                    <h4 class="text-center">Період реалізації інвестиційного проекту</h4>
                    <p>{{ $model["duration_project"] }} </p>
                    <h4 class="text-center">Термін повернення вкладених коштів</h4>
                    <p> {{ $model["term_refund"]}} </p>
                    <h4 class="text-center">Планова рентабельність проекту</h4>
                    <p> {{ $model["plan_rent"] }} </p>
                    <h4 class="text-center">Інше</h4>
                    <p> {{ $model["other"] }} </p>
                </section>

            </div>
            <div class="tab-pane fade" id="service-two">

                <section class="container">

                </section>

            </div>
            <div class="tab-pane fade" id="service-three">

            </div>
        </div>
        <hr/>
    </div>

    <p>
        <a href="#" class="btn-primary btn">Update</a>
        <a href="#" class="btn-danger btn">Delete</a>
    </p>
    </div>

@stop
