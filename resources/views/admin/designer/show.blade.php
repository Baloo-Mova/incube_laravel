@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Проект. Ідентифікаційний номер: {{ $designer->id }}</h2>
    </div>

    <h2 class="text-center">{{ $designer->name}} </h2>
    <div class="row">

        <div class="col-md-8">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img  class="img-responsive"src="{{ route('images.show', ['id'=> (empty($designer->logo)? 'empty' : $designer->logo),'height'=>'max','width'=>'max']) }}" alt="">
                    1
                </div>
                <div class="">
                    <img class="img-responsive" src="{{ route('images.show', ['id'=> (empty($designer->logo)? 'empty' : $designer->logo),'height'=>'max','width'=>'max']) }}" alt="">
                    2
                </div>
                <div class="">
                    <img class="img-responsive" src="{{ route('images.show', ['id'=> (empty($designer->logo)? 'empty' : $designer->logo),'height'=>'max','width'=>'max']) }}" alt="">
                    3
                </div>
            </div>

            <hr/>
            <div class="">
                <div class="btn-toolbar">



                    <div class="btn-group">
                        <a href="{{ route('admin.designer.edit', ['id'=>$designer->id]) }}"
                           class="btn-primary btn">Оновити</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('admin.designer.delete', ['id'=>$designer->id]) }}"
                           onclick="return confirm('Вы точно хотите удалить проэкт?')"
                           class="btn-danger btn">Видалити</a>
                    </div>
                    <div class="btn-group pull-left">
                        <a href="{{ route('designer.show', ['id'=>$designer->id]) }}"
                           class="btn-default btn">Продивитись на стороні клієнта</a>
                    </div>





                </div>
            </div>
            <hr/>
            <div class="product-info">

                <div class="tab-pane fade in active" id="service-one">
                    <section class="product-info">
                        <label>Автор</label>
                        <p> {{  $designer->author->name }}</p>

                        <label>Редактор</label>
                        <p> {{  $designer->publisher->name }}</p>

                        <label>Статус</label>
                        <p>{{ $designer->status->name }}</p>

                        <label>Назва проекту</label>
                        <p> {{ $designer->name }}</p>

                        <label>Мета проекту</label>
                        {!! $designer->idea !!}

                        <label>Дійсна ситуація</label>
                        {!! $designer->current_situation !!}

                        <label>Етап проекту</span></label>
                        <p>  {{$designer->stage->name }}</p>

                        
                        <label>Стислий опис проекту</label>
                        {!! $designer->description !!}

                        <label>Проблема чи можливість</label>
                        {!! $designer->problem !!}

                        <label>Рішення(продукт чи послуга)</label>
                        {!! $designer->solution !!}

                        <label>Конкуренція</label>
                        {!! $designer->competition !!}

                        <label>Іноваційні аспекти та переваги проекту</label>
                        {!! $designer->benefits !!}

                        <label>Фінансова частина / Бізнес-модель</label>
                        {!! $designer->buisness_model !!}

                        <label>Цільове призначення інвестицій</label>
                        {!! $designer->money_target !!}

                        <label>Пропозиції інвестору</label>
                        {!! $designer->investor_interest !!}

                        <label>Опис ризиків</label>
                        {!! $designer->risks !!}

                        <label>Контактні дані</label>
                        {!! $designer->contacts !!}
                        <div>
                            <label>Веб-сайт</label>
                            <p><a href="#">{{ $designer->site }}</a></p>
                        </div>
                        <div>
                            <label>YouTube посилання</label>
                            <p><a href="#">{{ $designer->youtube_link }}</a></p>
                        </div>
                        <label>Інше</label>
                        {!! $designer->other !!}


                </div>



                </section>

            </div>

        </div> 

        <div class="col-md-4" id="col">
            <div class="panel panel-primary affix-top" id="fix-div">
                <div class="text-center">
                    <label class="title-border">Галузь</label>
                    @if(!$designer->economicActivities->isChildren())
                    <p>{{ $designer->economicActivities->name }}</p>
                    @else
                    <p>{{ $designer->economicActivities->parent->name }}:</p>
                    <div class="clearfix"></div>
                    <span style="margin-left: 20px">{{ $designer->economicActivities->name }}</span>
                    @endif
                </div>
                <div class="text-center">
                    <label class="title-border">Країна</label>
                    <p>{{ $designer->country->name }}</p>
                </div>
                @if(isset($designer->city))
                <div class="text-center">
                    <label class="title-border">Регіон</label>
                    <p>{{ $designer->city->name }}</p>
                </div>
                @endif
                @if(isset($designer->money))
                <div class="text-center">
                    <label class="title-border">Вартість проекту</label>
                    <p><?= number_format($designer["money"], 0, '.', ' ') ?> $ </p>
                </div>
                @endif

                <div class="text-center">
                    <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span>
                    </a>
                </div>
                <br>
                <div class="text-center">
                    <a href="#" class="btn btn-primary">
                        <span><i class="fa fa-user"></i> Прийняти участь</span>
                    </a>
                </div>
                <br>
            </div>
        </div>



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
