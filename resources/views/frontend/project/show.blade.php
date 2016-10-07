@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Проект. Ідентифікаційний номер: {{ $project->id }}</h2>
        </div>

        <h2 class="text-center">{{ $project->name}} </h2>
        <div class="row">

            <div class="col-md-8">
                <div class="text-center owl-carousel owl-theme" id="owl-demo">
                    @foreach($files as $item)
                        <img class="img-responsive"
                             src="{{ route('images.show', ['id'=> $item,'height'=>'max','width'=>'max']) }}"
                             alt="">
                        @endforeach
                </div>
                <hr/>
                <div class="">
                    <div class="btn-toolbar">


                        <div class="btn-group">
                            <a href="{{ route('designer.edit', ['id'=>$project->id]) }}"
                               class="btn-primary btn">Оновити</a>
                        </div>
                        <div class="btn-group">
                            <a href="{{ route('designer.delete', ['id'=>$project->id]) }}"
                               onclick="return confirm('Вы точно бажаєте видалити цей проект?')"
                               class="btn-danger btn">Видалити</a>
                        </div>

                    </div>
                </div>
                <hr/>
                <div class="product-info">

                    <div class="tab-pane fade in active" id="service-one">
                        <section class="product-info">

                            <label>Мета проекту</label>
                            <p>  {!! $project->idea !!}</p>

                            <label>Дійсна ситуація</label>
                            <p> {!! $project->current_situation !!}</p>

                            <label>Етап проекту</span></label>
                            <p>  {{$project->stage->name }}</p>

                            <label>Стислий опис проекту</label>
                            <p> {!! $project->description !!}</p>

                            <label>Проблема чи можливість</label>
                            <p> {!! $project->problem !!}</p>

                            <label>Рішення(продукт чи послуга)</label>
                            <p> {!! $project->solution !!}</p>

                            <label>Конкуренція</label>
                            <p>  {!! $project->competition !!}</p>

                            <label>Іноваційні аспекти та переваги проекту</label>
                            <p>  {!! $project->benefits !!}</p>

                            <label>Фінансова частина / Бізнес-модель</label>
                            <p>  {!! $project->buisness_model !!}</p>

                            <label>Цільове призначення інвестицій</label>
                            <p>   {!! $project->money_target !!}</p>

                            <label>Пропозиції інвестору</label>
                            <p>   {!! $project->investor_interest !!}</p>

                            <label>Опис ризиків</label>
                            <p>   {!! $project->risks !!}</p>

                            {{--<label>Контактні дані</label>
                            <p>   {!! $project->contacts !!}</p>--}}
                            <div>
                                <label>Веб-сайт</label>
                                <p><a href="#">{{ $project->site }}</a></p>
                            </div>
                            <div>
                                <label>YouTube посилання</label>
                                <p><a href="#">{{ $project->youtube_link }}</a></p>
                            </div>
                            <label>Інше</label>
                            {!! $project->other !!}


                    </div>


                    </section>

                </div>

            </div>

            <div class="col-md-4" id="col">
                <div class="panel panel-primary affix-top" id="fix-div">
                    <div class="text-center">
                        <label class="title-border">Галузь</label>
                        @if(!$project->economicActivities->isChildren())
                            <p>{{ $project->economicActivities->name }}</p>
                        @else
                            <p>{{ $project->economicActivities->parent->name }}:</p>
                            <div class="clearfix"></div>
                            <span style="margin-left: 20px">{{ $project->economicActivities->name }}</span>
                        @endif
                    </div>
                    <div class="text-center">
                        <label class="title-border">Країна</label>
                        <p>{{ $project->country->name }}</p>
                    </div>
                    @if(isset($project->city))
                        <div class="text-center">
                            <label class="title-border">Регіон</label>
                            <p>{{ $project->city->name }}</p>
                        </div>
                    @endif
                    @if(isset($project->money))
                        <div class="text-center">
                            <label class="title-border">Вартість проекту</label>
                            <p><?= number_format($project["money"], 0, '.', ' ') ?> $ </p>
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
