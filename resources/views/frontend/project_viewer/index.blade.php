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
            <li class="active"><a href="#All" class="materials_button" data-toggle="tab">Усі пропозиції</a></li>
            <li><a href="#Problem" class="materials_button"   data-toggle="tab">Проблеми</a></li>
            <li><a href="#Investor" class="materials_button"   data-toggle="tab">Заявки на інвестування</a></li>
            <li><a href="#Designer" class="materials_button"   data-toggle="tab">Проекти</a></li>
            <li><a href="#Executor" class="materials_button"   data-toggle="tab">Резюме</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="All" class="tab-pane fade in active">
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

        <div id="Problem" class="tab-pane fade">

        </div>

         <div id="Investor" class="tab-pane fade">

        </div>

        <div id="Designer" class="tab-pane fade">

        </div>

        <div id="Executor" class="tab-pane fade">

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="more_button_block text-center" style="">
        <a class="btn btn-success btn-lg margin-auto more_button" data-number="0" href="#" disabled="{{$posts_number < config('posts.project_viewer_number') ? "disabled" : false}}">Завантажити ще...</a>
    </div>
</div>
@stop
@section('js')
    <script>
        $(function () {

            $("select").on('change', function(){
                $('.more_button').data('number', 0).attr('data-number', 0);
                 updateGrid($('li.active > .materials_button'));
            });

            $('.materials_button').on('click', function(){
                $('.more_button').data('number', 0).attr('data-number', 0);
                updateGrid(this);
            });

            $('.more_button').on('click', function(e){
                e.preventDefault();
                 updateGrid($('li.active > .materials_button'));
            });
        });

        function updateGrid(currentTab){

            var cat_id = $('select').val(),
                    table_type = $(currentTab)[0].hash.replace('#',""),
                    nmb = $('.more_button').data('number');

            $("#"+table_type).html("");
            $.ajax({
                url: "{{ route('project-viewer.get') }}",
                method: 'get',
                data:{
                    table_types : table_type,
                    cat_id : cat_id,
                    number : nmb
                },
                beforeSend: function(){
                    pagePreloader();
                },
            })
        .done(function(data) {

                var new_problem = "";

                if(data.materials.length == 0){
                    $("#"+table_type).append("<h3 class='text-center'>Матеріалів не знайдено</h3>");
                }else{

                    $.each( data.materials, function( key, val ) {
                        new_problem +='<div class="col-md-4 col-sm-6 col-xs-12"><div class="carusel-block">';
                        new_problem +='<a  href="project-viewer/show/'+val.id+'" class="">';
                        new_problem +='<div class="carusel-block-content">';
                        new_problem +=        '<img src="img/'+val.logo+'/maxxmax" alt="polo shirt img" class="carusel-block-img img-responsive">';
                        new_problem +=        '<h4 class="carusel-block-content-title">'+val.name+'</h4>';
                        new_problem +='<div class="carusel-block-content-description">';
                        new_problem +=        '<p class="">'+val.description+'</p>';
                        new_problem +='</div></div>';
                        new_problem +='<span class="carusel-id-badge" href="#">'+val.id+'</span>';
                        new_problem +='</a></div></div>';
                        $("#"+table_type).append(new_problem);
                        new_problem = "";
                    });

                }
                if(data.materials.length < 9){
                    $('.more_button').attr('disabled','disabled');
                }else{
                    $('.more_button').attr('disabled',false);
                    $('.more_button').data('number', ++nmb).attr('data-number', nmb);
                }


            });
            pagePreloaderHide();
        }

        function pagePreloader(){
            $('#preloader').fadeIn('slow');
        }
        function pagePreloaderHide(){
            $('#preloader').fadeOut('slow');
        }

    </script>
@stop


