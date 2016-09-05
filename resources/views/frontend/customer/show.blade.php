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
            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img class="img-responsive" src="{{url('/customer/image/'.$model->logo)}}" alt="">

                </div>

            </div>
        </div> 

        <div class="col-md-6">
            <div class="panel panel-primary">


                <div class="text-center">
                    <h4 class="title-border">Галузь</h4>
                    <p>{{ $model->economicActivities->name }}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Регіон</h4>
                    <p>{{ $model->region }}</p>

                </div>

            </div>
        </div>


    </div>

    <div class="">
        <div class="btn-toolbar">

            @if(Auth::check() && Auth::user()->id == $model->author_id)
            <div class="btn-group pull-lef">
                <a href="{{ route('customer.edit',['problem'=>$model->id]) }}" class="btn-primary btn">Оновити</a>
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
    <hr/>
    <div class="product-info">
        <!--<div class="tab-pane fade in active" id="service-one">
            <section class="product-info">-->
        <h4>Опис питання</h4>
        <blockquote>
            <p> {!!$model->problem_description!!} </p>
        </blockquote>


        <h4>Інше</h4>
        <blockquote>
            <p> {!! $model["other"] !!} </p>
        </blockquote>
        <!-- </section>
     </div>-->

    </div>
    <hr/>

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