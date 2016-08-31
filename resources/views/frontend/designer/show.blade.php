@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Проект. Ідентифікаційний номер: {{ $designer->id }}</h2>
    </div>

    <div class="project-viewer-content">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3 class="text-center" style="color: #00aeef">{{ $designer["project_name"]}}</h3>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img src="{{url('/designer/image/'.$designer->logo)}}" alt="">
                    1
                </div>
                <div class="">
                    <img src="{{url('/designer/image/'.$designer->logo)}}" alt="">
                    2
                </div>
                <div class="">
                    <img src="{{url('/designer/image/'.$designer->logo)}}" alt="">
                    3
                </div>
            </div>
        </div> 

        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Галузь</div>
                <div class="panel-body text-center">{{ $designer->economicActivities->name }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Географія проекту</div>
                <div class="panel-body text-center">{{ $designer->region }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Період реалізації проекту</div>
                <div class="panel-body text-center">{{$designer->project_duration}}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Сума, яку готові інвестувати</div>
                <div class="panel-body text-center">
                    <?= number_format($designer["project_cost"], 0, '.', ' ') ?> $
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="btn-toolbar">

            @if(Auth::check() && Auth::user()->id == $designer->author_id)
            <div class="btn-group pull-lef">
                <a href="#" class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group pull-lef">
                <a href="#" class="btn-danger btn">Видалити</a>
            </div>
            @endif


            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Запропонувати проект</span>
                </a>
            </div>

            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Прийняти участь</span> </a>
            </div>

        </div>
    </div>
    <div class="product-info">

        <div class="tab-pane fade in active" id="service-one">
            <section class="product-info">
                <h4>Стислий опис проекту</h4>
                <blockquote>
                    <p> {{ $designer->description }}</p>
                </blockquote>
                
                <h4>Мета проекту</h4>
                <blockquote>
                    <p> {{ $designer->project_goal }}</p>
                </blockquote>
                <h4>Іноваційні аспекти та переваги проекту</h4>
                <blockquote>
                    <p> {{ $designer->project_aspects }}</p>
                </blockquote>
                <h4>Отримувачі вигоди</h4>
                <blockquote>
                    <p> {{ $designer->beneficaries }}</p>
                </blockquote>
                <h4>Стадія проекту</h4>
                <blockquote>
                    <p> {{ $designer->project_stage }}</p>
                </blockquote>
                <h4>Джерела фінансування</h4>
                <blockquote>
                    <p> {{ $designer->available_funding }}</p>
                </blockquote>
                <h4>Інше</h4>
                <blockquote>
                    <p><em> {{ $designer->other }}</em></p>
                </blockquote>


            </section>

        </div>


        <hr/>
    </div>


</div>

@stop
@section('js')
<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 1,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });

    });
</script>
@stop