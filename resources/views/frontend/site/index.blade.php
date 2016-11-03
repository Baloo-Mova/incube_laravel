@extends('frontend.layouts.template')

@section('content')

    @include('frontend.layouts.partials.slider')

    <div class="content-area">
        <div class="container">
            <!-- About us panel -->
            <div class="about-us">
                <div class="row">
                    <div class="page-title text-center wow zoomInLeft" data-wow-duration="1s">
                        <h2>Про нас</h2>
                    </div>
                </div>
                <div class="how-it-work wow bounceInUp" data-wow-duration="1s">
                    <div class="board">
                        <div class="board-header">
                            <div class="board-inner">
                                <ul class="nav nav-tabs" id="myTab">
                                    <div class="liner"></div>
                                    <li class="active" id="home-li">
                                        <a href="#home" data-toggle="tab" title="Вітаемо">
                                        <span class="round-tabs one">
                                            <i class="glyphicon glyphicon-home"></i>
                                        </span>
                                        </a>
                                    </li>
                                    <li id="profile-li">
                                        <a href="#profile" data-toggle="tab" title="Ваш профіль">
                                        <span class="round-tabs two">
                                            <i class="glyphicon glyphicon-user"></i>
                                        </span>
                                        </a>
                                    </li>
                                    <li id="messages-li">
                                        <a href="#messages" data-toggle="tab" title="Додайте свій проект">
                                        <span class="round-tabs three">
                                            <i class="glyphicon glyphicon-list-alt"></i>
                                        </span>
                                        </a>
                                    </li>
                                    <li id="settings-li">
                                        <a href="#settings" data-toggle="tab" title="Слідкуйте">
                                        <span class="round-tabs four">
                                            <i class="glyphicon glyphicon-comment"></i>
                                        </span>
                                        </a>
                                    </li>
                                    <li id="doner-li">
                                        <a href="#doner" data-toggle="tab" title="Кінець">
                                        <span class="round-tabs five">
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="board-content">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h3 class="head text-center">Вас вітає</h3>
                                    <h3 class="text-center">Відкрита регіональна платформа науково виробничого
                                        партнерства</h3>
                                    <h1 class="text-center">
                                        <span style='color: #D30072; font-weight: bold;'>In</span><span
                                                style="color:#00AEEF; font-weight: bold;">Cube</span>
                                    </h1>
                                    <h4 class="narrow text-center">
                                        Дана платформа розрахована на реалізацію молодіжних наукових розробок,
                                        актуальних для промислових і сільськогосподарських підприємств Запорізького
                                        регіону.
                                    </h4>
                                    <p class="text-center">
                                        <a href="{{ url('/about') }}" target="_blank"
                                           class="btn btn-success btn-outline-rounded green"> Детальніше
                                            <i class="glyphicon glyphicon-send"></i>
                                        </a>
                                        <a href="#profile" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded set-active-tab"> Далі
                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h3 class="head text-center">Зареєструйте свій аккаунт</h3>
                                    <h4 class="narrow text-center">
                                        Для того, щоб почати роботу - зареєструйтесь
                                    </h4>

                                    <p class="text-center">
                                        <a href="{{ Auth::check() ? url('/personal-area') : url('/register') }}" target="_blank"
                                           class="btn btn-success btn-outline-rounded green"> Створити свій аккаунт
                                            <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
                                        </a>
                                        <a href="#messages" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded set-active-tab"> Далі
                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="messages">
                                    <h3 class="head text-center">Подайте свій проект</h3>
                                    <h4 class="narrow text-center">
                                        Розмістіть на платформі свій проект
                                    </h4>

                                    <p class="text-center">
                                        <a href="{{ url('/designer/create') }}" class="btn btn-success btn-outline-rounded green"> Подати заявку
                                            <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span>
                                        </a>
                                        <a href="#settings" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded set-active-tab"> Далі
                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h3 class="head text-center">Слідкуйте за проектом</h3>
                                    <h4 class="narrow text-center">
                                        Для подальшого розвинення проекта спілкуйтесь з іншими учасниками платформи для
                                        отримання інвестицій, плану роботи, потрібних фахівців, тощо.
                                    </h4>

                                    <p class="text-center">
                                        <a href="#doner" data-toggle="tab"
                                           class="btn btn-success btn-outline-rounded set-active-tab"> Далі
                                            <i class="glyphicon glyphicon-arrow-right"></i>
                                        </a>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="doner">
                                    <div class="text-center">
                                        <i class="img-intro icon-checkmark-circle"></i>
                                    </div>
                                    <h3 class="head text-center">Дякуємо</h3>
                                    <h4 class="narrow text-center">
                                        Дякуємо за те, що ви берете участь у роботі платформи.
                                    </h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End about us panel -->
            <hr>
            <!-- Role users panel -->
            <div class="user-roles">
                <div class="row">
                    <div class="page-title text-center wow zoomInRight" data-wow-duration="1s">
                        <h2>Оберіть вашу роль</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="how-it-work text-center owl-carousel owl-theme" id="how-it-work">
                        <a href="{{url('/problem')}}">
                            <div class="single-work wow fadeInUp" data-wow-delay="0.3s">
                                <img src="{{ url('img/how-work3.png')}}" alt="">
                                <h3>Замовник</h3>
                                <p>Подає питання, що потрібно вирішити</p>
                            </div>
                        </a>
                        <a href="{{url('/investor')}}">
                            <div class="single-work  wow fadeInUp" data-wow-delay="0.6s">
                                <img src="{{ url('img/investor_desc_logo.png')}}" alt="">
                                <h3>Інвестор</h3>
                                <p>Юридичні та фізичні особи, які можуть вкладувати кошти у інноваційний проект</p>
                            </div>
                        </a>
                        <a href="{{url('/designer')}}">
                            <div class="single-work wow fadeInUp" data-wow-delay="0.9s">
                                <img src="{{ url('img/how-work1.png')}}" alt="">
                                <h3>Проектант</h3>
                                <p>Розробник інноваційного проекту</p>
                            </div>
                        </a>
                        <a href="{{url('/executor')}}">
                            <div class="single-work wow fadeInUp" data-wow-delay="1.2s">
                                <img src="{{ url('img/how-work2.png')}}" alt="">
                                <h3>Виконавець</h3>
                                <p>Фахівець у певній галузі, що хоче прийняти участь у проекті або знайти роботу</p>
                            </div>
                        </a>
                        {{--<a href="{{url('/employer')}}">--}}
                            {{--<div class="single-work wow fadeInUp" data-wow-delay="1.5s">--}}
                                {{--<img src="{{ url('img/how-work5.png')}}" alt="">--}}
                                {{--<h3>Підприємець</h3>--}}
                                {{--<p>Пропонує вакансії на роботу</p>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
            <!-- end Role-->
            <hr>
            <!--sliders for problems -->
            <div class="materials">
                <div class="page-title text-center wow bounceInUp" data-wow-duration="1s">
                    <h2><span>{{count($allMaterials)}}</span> нових матеріалів</h2>
                </div>
                <div class="carusel" id="materials">
                    @forelse($allMaterials as $item)
                        @include('frontend.partials.carusel_item',['item'=>$item])
                    @empty
                </div>
                <div class="row text-center">
                    <h3>Проекти відсутні</h3>
                </div>
                @endforelse

            </div>

            <div class="row text-center">
                <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index') }}">
                    Усі матеріали
                </a>
            </div>
        </div>
    </div>

    <!-- end container-->
    </div>
    <!-- end content area-->
@stop

@section('css')
@stop

@section('js')
    <script>
        $(function () {
            window.scrollTo(0, 0);
            $("#bg-slider").owlCarousel({
                navigation: false, // Show next and prev buttons
                loop: true,
                items: 1,
                mouseDrag: false,
                autoplay: true,
                autoplayHoverPause: true,
                animateIn: 'bounceInRight',
                animateOut: 'bounceOutRight',
                autoplayTimeout: 8000,
                autoplaySpeed: 3000,
                smartSpeed: 3000
            });
            $('#how-it-work').owlCarousel({
                loop: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    800: {
                        items: 2,
                        stagePadding: 200,
                    }
                },
                navigation: false,
                margin: 20,
                dots: false,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                smartSpeed: 3000
            });
            initialize_owl($('#materials'), options);
            $('.set-active-tab').on('click', function () {
                $('.board li').each(function (item) {
                    $(this).removeClass('active');
                });
                $($(this).prop("hash") + '-li').addClass('active');
            });
        });
    </script>

@stop