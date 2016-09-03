@extends('frontend.layouts.template')

@section('content')

    <div class="container">
        <div class="page-title text-center">
        <h2>Інвесторам</h2>
    </div>
    <hr/>
    <div class="container text-center">
        <p><b> Інвестор </b> - це користувач, що вкладає кошти.</p>

        <ul class="nav"> Інвесторомами можуть виступати Юридичні та Фізичні особи, які можуть вкладувати кошти у інноваційний проект

        </ul>

        <p>Якщо ви хочете виступити інвестором - заповніть наступну форму: </p>
        <div class="text-center">
            <a href="{{ route('investor.create') }}" class="btn btn-lg btn-danger center">Подати заявку
                <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <hr/>
    <div class="row page-title text-center">
        <h2>Інвестор може вкласти кошти у наступне</h2>
    </div>
    <div class="carusel" id="problems">
        @for($i = 0;$i<10;$i++)
            <div class="carusel-block wow slideInUp" data-wow-duration="{{$i/10}}s">
                <div class="carusel-block-content">
                    <a class="img-responsive" href="#">
                        <img src="{{ asset('img/250n300.png') }}" alt="polo shirt img">
                    </a>
                    <div class="carusel-block-content-description">
                        Обновление экосистемы города запорожье и запорожской области
                    </div>
                    <a class="show-btn hvr-rectangle-out" href="#">Продивитись</a>
                </div>
                <span class="carusel-badge" href="#">{{ $i }}</span>
            </div>
        @endfor
    </div>
    <div class="row text-center">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('material.index') }}">
            Усі питання
        </a>
    </div>

    <hr/>

    <div class="row page-title text-center">
        <h2>Заявки на інвестування</h2>
    </div>
    <br/>
    <div class="row">
        <section id="aa-popular-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="aa-popular-category-area">
                                <!-- start prduct navigation -->

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start popular problems -->
                                    <div class="tab-pane fade in active" id="popular">
                                        <ul class="aa-product-catg aa-popular-slider">
                                            <!-- start single product item -->
                                            @foreach($investProjects as $item)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="#"><img src="{{ empty($item->logo)? 'http://placehold.it/250x300' : url('/investor/image/'.$item->logo) }}" alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                        <figcaption class="aa-content">
                                                            <h4 class="aa-product-title">{{ $item->investor_name }}</h4>
                                                            <span class="aa-product-price">{{ $item->investor_cost }}</span>
                                                        </figcaption>
                                                    </figure>
                                                    <!-- product id -->
                                                    <span class="aa-badge aa-sale" href="#">{{ $item->id }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a class="btn btn-success btn-lg" href="#">Усі заявки
                                            <span class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / popular problem category -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / popular section -->
    </div>
        </div>
@stop

@section('js')
    <script>
        $(function () {

            $('#problems').owlCarousel({
                loop              : true,
                nav        : true,
                items             : 4,
                center            : true,
                dots              : false,
                autoplay          : true,
                autoplayHoverPause: true,
                autoplayTimeout   : 5000,
                smartSpeed        : 1500
            });

        });
    </script>
@stop