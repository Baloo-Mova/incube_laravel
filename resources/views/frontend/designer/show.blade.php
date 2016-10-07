@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Проект. Ідентифікаційний номер: {{ $designer->id }}</h2>
        </div>

        <h2 class="text-center">{{ $designer->name}} </h2>
        <div class="row all-questions">
            <div class="col-md-8">
                <div class="text-center owl-carousel owl-theme" id="owl-demo">
                    @foreach($files as $item)
                        <img class="img-responsive"
                             src="{{ route('images.show', ['id'=> $item,'height'=>'max','width'=>'max']) }}"
                             alt="">
                    @endforeach
                </div>
                @if(Auth::check() && Auth::user()->can('edit', $designer))
                    <hr/>
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <a href="{{ route('designer.edit', ['id'=>$designer->id]) }}"
                               class="btn btn-primary ">Оновити</a>
                            <a href="{{ route('designer.delete', ['id'=>$designer->id]) }}"
                               onclick="return confirm('Вы точно бажаєте видалити цей проект?')"
                               class="btn btn-danger">Видалити</a>
                        </div>
                    </div>
                    <hr/>
                @endif
                <div class="product-info">
                    <div class="tab-pane fade in active" id="service-one">
                        <section class="product-info">

                            <label>Мета проекту</label>
                            <p>  {!! $designer->idea !!}</p>

                            <label>Дійсна ситуація</label>
                            <p> {!! $designer->current_situation !!}</p>

                            <label>Етап проекту</span></label>
                            <p>  {{$designer->stage->name }}</p>

                            <label>Стислий опис проекту</label>
                            <p> {!! $designer->description !!}</p>

                            <label>Проблема чи можливість</label>
                            <p> {!! $designer->problem !!}</p>

                            <label>Рішення(продукт чи послуга)</label>
                            <p> {!! $designer->solution !!}</p>

                            <label>Конкуренція</label>
                            <p>  {!! $designer->competition !!}</p>

                            <label>Іноваційні аспекти та переваги проекту</label>
                            <p>  {!! $designer->benefits !!}</p>

                            <label>Фінансова частина / Бізнес-модель</label>
                            <p>  {!! $designer->buisness_model !!}</p>

                            <label>Цільове призначення інвестицій</label>
                            <p>   {!! $designer->money_target !!}</p>

                            <label>Пропозиції інвестору</label>
                            <p>   {!! $designer->investor_interest !!}</p>

                            <label>Опис ризиків</label>
                            <p>   {!! $designer->risks !!}</p>

                            {{--<label>Контактні дані</label>
                            <p>   {!! $designer->contacts !!}</p>--}}
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

                        </section>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="col">
                <div class="panel panel-primary affix-top" id="fix-div">
                    <div class="text-center">
                        <label class="title-border">Галузь</label>
                        @if(!$designer->economicActivities->isChildren())
                            <p>{{ $designer->economicActivities->name }}</p>
                        @else
                            <p><b>{{ $designer->economicActivities->parent->name }}</b>:
                                <span style="margin-left: 20px">{{ $designer->economicActivities->name }}</span>
                            </p>
                        @endif

                        <label class="title-border">Країна</label>
                        <p>{{ $designer->country->name }}</p>

                        @if(isset($designer->city))
                            <label class="title-border">Регіон</label>
                            <p>{{ $designer->city->name }}</p>
                        @endif

                        @if(isset($designer->money))
                            <label class="title-border">Вартість проекту</label>
                            <p><?= number_format($designer["money"], 0, '.', ' ') ?> $ </p>
                        @endif

                        @if(Auth::check() && Auth::user()->can('offer', $designer))
                            <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span>
                            </a>
                            <a href="#" class="btn btn-primary">
                                <i class="fa fa-user"></i> Прийняти участь
                            </a>
                        @endif

                    </div>
                </div>
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
