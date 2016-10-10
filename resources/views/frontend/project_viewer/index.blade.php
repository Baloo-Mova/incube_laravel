@extends('frontend.layouts.template')

@section('content')

<div class="container">
    <div class="page-title text-center">
        <h2>Усі подані матеріали</h2>
    </div>
    <hr/>
    <div class="text-center">
        <p>На даній сторінці Ви маєте змогу продивитися активні подані питання(проблеми), проекти, заявки на інвестування, резюме та пропозицій роботи.</p>

    </div>
    <hr/>
    <div class="page-title text-center">
        <h2>Подані матеріали</h2>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('frontend.partials.economic_activities_select',['economicActivitiesAttributeName' => "economic_activities_select",  'economicActivitiesAttributeValueNow' => $catId, 'economicActivities'=>$economicActivities])
        </div>
    </div>
    <br>
    <div class="select-tabs">
        <ul class="nav nav-pills nav-stacked text-center" id="myTab">
            <li class="active"><a href="#allmat" data-toggle="tab">Усі пропозиції</a></li>
            <li><a href="#problem" data-toggle="tab">Проблеми</a></li>
            <li><a href="#invest" data-toggle="tab">Заявки на інвестування</a></li>
            <li><a href="#project" data-toggle="tab">Проекти</a></li>
            <li><a href="#executor" data-toggle="tab">Резюме</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="allmat" class="tab-pane fade in active">
            @forelse($allMaterials as $item)
            <div class="carusel" id="problems">
              @include('frontend.partials.viewer_item',['item'=>$item])
            </div>
            @empty
            <div class="row text-center">
                <h3>Проблеми відсутні</h3>
            </div>
            @endforelse
        </div>

        <div id="problem" class="tab-pane fade">

        </div>

         <div id="invest" class="tab-pane fade">

        </div>

        <div id="project" class="tab-pane fade">

        </div>

        <div id="executor" class="tab-pane fade">
            @for($i=0;$i<10;$i++)
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="carusel-block">
                    <a  href="#" class="">
                        <div class="carusel-block-content">
                                <img src="{{ asset('img/250n300.png') }}" alt="polo shirt img" class="carusel-block-img img-responsive">
                            <h4 class="carusel-block-content-title">
                                Обновление экосистемы города запорожье и запорожской области
                            </h4>
                            <div class="carusel-block-content-description">
                                <p class="">Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки Текст на 3 строки</p> 
                            </div>
                        </div>
                        <span class="carusel-id-badge" href="#">{{ $i }}</span>
                        <span class="carusel-price-badge" href="#">{{ $i+1344  }}$</span>
                    </a>     
                </div>  
            </div>   
            @endfor
        </div>
    </div>
</div>
@stop
@section('js')
    <script>
        $(function () {

            $("select").on('change', function(){

            });

        });
    </script>
@stop


