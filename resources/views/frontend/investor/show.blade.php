@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Заявка інвестора. Ідентифікаційний номер: {{ $investor->id }}</h2>
    </div>

    <div class="project-viewer-content">
        <div class="panel panel-primary">
            <div class="panel-body">
                <h3 class="text-center" style="color: #00aeef">{{ $investor["investor_name"]}}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">
                <div class="">
                    <img class="img-responsive" src="{{url('/investor/image/'.$investor->logo)}}" alt="">
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="panel panel-primary">


                <div class="text-center">
                    <h4 class="title-border">Галузь</h4>
                    <p>{{ $investor->economicActivities->name }}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Регіон інвестування</h4>
                    <p>{{ $investor->region }}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Період реалізації інвестиційного проекту</h4>
                    <p>{!!$investor->duration_project!!}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Термін повернення вкладених коштів</h4>
                    <p>{!! $investor->term_refund !!}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Етап проекту</h4>
                    <p>{!!$investor->stage_project!!}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Планова рентабельність проекту</h4>
                    <p>{!!$investor->plan_rent!!}</p>
                </div>
                <div class="text-center">
                    <h4 class="title-border">Сума, яку готові інвестувати</h4>
                    <p> <?= number_format($investor["investor_cost"], 0, '.', ' ') ?> $ </p>
                </div>

            </div>
        </div>
    </div>
    <hr/>
    <div class="btn-toolbar">
        @if(Auth::check() && Auth::user()->id == $investor->author_id)
        @if($investor->status == 0)
        <div class="btn-group pull-lef">
            <a href="{{ route('investor.edit', ['id'=>$investor->id]) }}" class="btn-primary btn">Оновити</a>
        </div>
        <div class="btn-group pull-lef">
            <a href="{{ route('investor.delete', ['id'=>$investor->id]) }}" onclick="return confirm('Вы точно хотите удалить проэкт?')" class="btn-danger btn">Видалити</a>
        </div>
        @endif
        @else
        <div class="btn-group pull-right">
            <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Запропонувати проект</span>
            </a>
        </div>
        <div class="btn-group pull-right">
            <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Прийняти участь</span> </a>
        </div>
        @endif
    </div>
    <div class="product-info">
        <div class="tab-pane fade in active" id="service-one">
            <section class="product-info">
                <h4>Інше</h4>
                <blockquote>
                    <p><em> {!! $investor["other"] !!}</em></p>
                </blockquote>
            </section>
        </div>
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