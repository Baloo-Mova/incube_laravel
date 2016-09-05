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

        <div class="col-md-4">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img src="{{url('/employer/image/'.$employer->logo)}}" alt="">

                </div>

            </div>
        </div> 

        <div class="col-md-8">
            <h3 class="text-center" style="color: #00aeef">{{ $employer->org_name}}</h3>
       
        
        </div>
        
        <div class="col-md-8">
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Галузь</div>
                <div class="panel-body text-center">{{ $employer->economicActivities->name }}
                </div>
            </div>
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Тип організації</div>
                <div class="panel-body text-center">{{ $employer->org_type }}
                </div>
            </div>
            <div class="panel panel-primary one-row-pannel">
                <div class="panel-heading text-center">Коротка характеристика діяльності організації</div>
                <div class="panel-body text-center">{!! $employer->org_info !!}
                </div>
            </div>
        </div>

    </div>
    <div class="">
        <div class="btn-toolbar">

            @if(Auth::check() && Auth::user()->id == $employer->author_id)
            <div class="btn-group pull-lef">
                <a href="#" class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group pull-lef">
                <a href="#" class="btn-danger btn">Видалити</a>
            </div>
            @endif



            <div class="btn-group pull-right">
                <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Подати резюме</span> </a>
            </div>

        </div>
    </div>
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