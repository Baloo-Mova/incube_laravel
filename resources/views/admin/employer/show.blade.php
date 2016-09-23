@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Пропозиція вакансій. Ідентифікаційний номер: {{ $employer->id }}</h2>
    </div>

    <h2 class="text-center">{{ $employer->name}} </h2>
    <div class="row">

        <div class="col-md-8">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img  class="img-responsive"src="{{ route('images.show', ['id'=> (empty($employer->logo)? 'empty' : $employer->logo),'height'=>'max','width'=>'max']) }}" alt="">

                </div>

            </div>

            <hr/>
            <div class="">
                <div class="btn-toolbar">



                    <div class="btn-group">
                        <a href="{{ route('admin.employer.edit', ['id'=>$employer->id]) }}"
                           class="btn-primary btn">Оновити</a>
                    </div>
                    <div class="btn-group">
                        <a href="{{ route('admin.employer.delete', ['id'=>$employer->id]) }}"
                           onclick="return confirm('Вы точно хотите удалить проэкт?')"
                           class="btn-danger btn">Видалити</a>
                    </div>
                    <div class="btn-group pull-left">
                        <a href="{{ route('employer.show', ['id'=>$employer->id]) }}"
                           class="btn-default btn">Продивитись на стороні клієнта</a>
                    </div>





                </div>
            </div>
            <hr/>
            <div class="product-info">

                <div class="tab-pane fade in active" id="service-one">
                    <section class="product-info">
                        <label>Автор</label>
                        <p> {{$employer->author->name }}</p>

                        @if(isset($employer->publisher_id))
                        <label>Редактор</label>
                        <p> {{  $employer->publisher->name }}</p>
                        @endif
                        <label>Статус</label>
                        <p>{{ $employer->status->name }}</p>


                        <label>Назва організації</label>
                        <p>{{ $employer->company_name }}</p>



                        <label>Коротка характеристика діяльності організації</label>
                        {!! $employer->company_info !!}



                        <label>Вакансії (звернення організації)</label>
                        {!! $employer->description !!}

                        <label>Вимоги:</label>
                        {!! $employer->requirements !!}</textarea>


                        <label>Умови праці</label>
                        {!! $employer->working_conditions !!}


                        <label>Адресса</label>
                        {!! $employer->adress !!}

                        <label>Телефон</label>
                        <p>{{ $employer->phone }}</p>

                        <label>Інше</label>
                        {!! $employer->other !!}


                </div>



                </section>

            </div>

        </div> 

        <div class="col-md-4" id="col">
            <div class="panel panel-primary affix-top" id="fix-div">
                <div class="text-center">
                    <label class="title-border">Галузь</label>
                    @if(!$employer->economicActivities->isChildren())
                    <p>{{ $employer->economicActivities->name }}</p>
                    @else
                    <p>{{ $employer->economicActivities->parent->name }}:</p>
                    <div class="clearfix"></div>
                    <span style="margin-left: 20px">{{ $employer->economicActivities->name }}</span>
                    @endif
                </div>
                <div class="text-center">
                    <label class="title-border">Країна</label>
                    <p>{{ $employer->country->name }}</p>
                </div>
                <div class="text-center">
                    <label>Веб-сайт</label>
                    <p><a href="#">{{ $employer->site }}</a></p>
                </div>


                <div class="text-center">
                    <a href="#" class="btn btn-primary">
                        <span><i class="fa fa-user"></i> Подати резюме</span>
                    </a>
                </div>
                <br>
            </div>
        </div>



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
