@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Список вакансій. Ідентифікаційний номер: {{ $employer->id }}</h2>
    </div>

    <div class="project-viewer-content">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3 class="text-center" style="color: #00aeef">{{ $employer->org_name}}</h3>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img class="img-responsive" src="{{url('/employer/image/'.$employer->logo)}}" alt="">

                </div>

            </div>
        </div> 

        <div class="col-md-6">
            <div class="panel panel-primary">


                <div class="text-center">
                    <h4 class="title-border">Галузь</h4>
                    <p>{{ $employer->economicActivities->name }}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Тип організації</h4>
                    <p>{{ $employer->org_type }}</p>
                </div>
                <div class="">       
                    <div class="text-center"><h4 class="title-border">Коротка характеристика діяльності організації</h4></div>
                    <p>{!! $employer->org_info !!}</p>
                </div>
            </div>
        </div>


    </div>
    <div class="">
        <div class="btn-toolbar">

            @if(Auth::check() && Auth::user()->id == $employer->author_id)
            <div class="btn-group pull-left">
                <a href="{{ route('employer.edit',['employer'=>$employer->id]) }}" class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group pull-left">
                <a href="#" class="btn-danger btn">Видалити</a>
            </div>
            @endif



            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Подати резюме</span> </a>
            </div>

        </div>
    </div>
    <hr/>
    <div class="product-info">

        <div class="tab-pane fade in active" id="service-one">
            <section class="product-info">
                <h4>Загальна інформація (звернення організації):</h4>
                <blockquote>
                    <p> {!! $employer->description !!}</p>
                </blockquote>

                <h4>Адресса</h4>
                <blockquote>
                    <p> {!! $employer->adress !!}</p>
                </blockquote>

                <h4>Інше</h4>
                <blockquote>
                    <p><em> {!! $employer->other !!}</em></p>
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