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

        <ul class="nav nav-tabs text-center" id="myTab">
            <li class="active"><a href="#problem" data-toggle="tab">Проблемы</a></li>
            <li><a href="#project" data-toggle="tab">Проэкты</a></li>
        </ul>

        <div class="tab-content">
            <div id="problem" class="tab-pane fade in active">
                @forelse($problems as $item)
                    <div class="carusel" id="problems">
                        @include('frontend.partials.carusel_item',['item'=>$item])
                    </div>
                @empty
                    <div class="row text-center">
                        <h3>Проблемы отсутствуют</h3>
                    </div>
                @endforelse
            </div>

            <div id="project" class="tab-pane fade">
                @forelse($projects as $item)
                    <div class="carusel" id="projects">
                        @include('frontend.partials.carusel_item',['item'=>$item])
                    </div>
                @empty
                    <div class="row text-center">
                        <h3>Проэкты отсутствуют</h3>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="row text-center">
            <a class="btn btn-success btn-lg margin-auto" href="{{ route('material.index') }}">
                Усі питання
            </a>
        </div>


        @if(count($investProjects) > 0)
            <hr/>
            <div class="row page-title text-center">
                <h2>Актуальные инвестиционные проэкты</h2>
            </div>
            <div class="carusel" id="investorProjects">
                @foreach($investProjects as $item)
                    @include('frontend.partials.carusel_item',['item'=>$item])
                @endforeach
            </div>
    @endif
    </div>
@stop

@section('css')
    <style>
        .nav-tabs > li, .nav-pills > li {
            float: none;
            display: inline-block;
            *display: inline; /* for IE7*/
            *zoom: 1; /* for IE7*/

        }

        .nav-tabs {
            text-align: center;
        }

        .tab-content {
            padding: 0;
        }

        .tab-pane {
            padding: 20px 0px 20px 0px;
        }
    </style>
@stop


@section('js')
    <script>
        $(function () {

            var options = {
                loop              : true,
                nav               : true,
                items             : 4,
                center            : true,
                dots              : false,
                autoplay          : true,
                autoplayHoverPause: true,
                autoplayTimeout   : 5000,
                smartSpeed        : 1500
            };

            initialize_owl($('#problems'));
            initialize_owl($('#investorProjects'));

            $('a[href="#problem"]').on('shown.bs.tab', function () {
                initialize_owl($('#problems'));
            }).on('hide.bs.tab', function () {
                destroy_owl($('#problems'));
            });

            $('a[href="#project"]').on('shown.bs.tab', function () {
                initialize_owl($('#projects'));
            }).on('hide.bs.tab', function () {
                destroy_owl($('#projects'));
            });

            function initialize_owl(el) {
                el.owlCarousel(options);
            }

            function destroy_owl(el) {
                el.data('owlCarousel').destroy();
            }

        });
    </script>
@stop