@extends('frontend.layouts.template')

@section('content')

<div class="container">
    <div class="page-title text-center">
        <h2>Усі подані пропозиції</h2>
    </div>
    <hr/>
    <div class="text-center">
        <p>Ця сторінка надає Вам змогу продивитися активні подані проблеми(завдання), проекти, заявки на інвестування та резюме.</p>

    </div>
    <hr/>
    <div class="page-title text-center">
        <h2>Подані пропозиції</h2>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            @include('frontend.partials.economic_activities_select',['economicActivitiesAttributeName' => "economic_activities_select",  'economicActivitiesAttributeValueNow' => $catId, 'economicActivities'=>$economicActivities])
        </div>
    </div>
    <br>
    <div class="select-tabs">
        <ul class="nav nav-pills nav-stacked text-center" id="myTab">
            <li class="All active"><a href="#All" class="materials_button" data-toggle="tab">Усі пропозиції</a></li>
            <li class="Problem" ><a href="#Problem" class="materials_button"   data-toggle="tab">Проблеми</a></li>
            <li class="Investor"> <a href="#Investor" class="materials_button"   data-toggle="tab">Заявки на інвестування</a></li>
            <li class="Designer" ><a href="#Designer" class="materials_button"   data-toggle="tab">Проекти</a></li>
            <li class="Executor" ><a href="#Executor" class="materials_button"   data-toggle="tab">Резюме</a></li>
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
        <a class="btn btn-success btn-lg margin-auto more_button" data-number="1" href="#" {{$posts_number < config('posts.project_viewer_number') ? "disabled" : ""}}>Завантажити ще...</a>
        <span class="hidden data_project_viewer_number" data-project-viewer-number="{{config('posts.project_viewer_number')}}"></span>
    </div>
</div>
@stop
@section('js')
    <script>
        $(function () {

            if(window.location.hash != ""){
                $('#preloader').fadeIn('slow');
                $(".All").removeClass('active');
                $("#All").removeClass('in active');
                $("."+window.location.hash.replace('#',"")).addClass('active');
                $(window.location.hash).addClass('active in');
                $('.more_button').data('number', 0).attr('data-number', 0);
                updateGrid($('li.active > .materials_button'), 1);
            }

            $("select").on('change', function(){
                $('.more_button').data('number', 0).attr('data-number', 0);
                 updateGrid($('li.active > .materials_button'), 1);
            });

            $('.materials_button').on('click', function(){
                $('.more_button').data('number', 0).attr('data-number', 0);
                updateGrid(this, 1);
            });

            $('.more_button').on('click', function(e){
                e.preventDefault();
                 updateGrid($('li.active > .materials_button'), 2);
            });
        });

        function updateGrid(currentTab, printType){

            var cat_id = $('select').val(),
                    table_type = $(currentTab)[0].hash.replace('#',""),
                    nmb = $('.more_button').data('number');

            if(printType == 2){
            }else{
                $("#"+table_type).html("");
            }

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

                if(data.materials.length == 0 && printType != 2){
                    $("#"+table_type).append("<h3 class='text-center'>Пропозицый не знайдено</h3>");
                }else{

                    $.each( data.materials, function( key, val ) {
                        if(val.form_type_id == 5){
                            title = val.second_name+val.first_name+val.last_name;
                        }else{
                            title = val.name;
                        }
                        new_problem +='<div class="col-md-4 col-sm-6 col-xs-12"><div class="carusel-block">';
                        new_problem +='<a  href="project-viewer/show/'+val.id+'" class="">';
                        new_problem +='<div class="carusel-block-content">';
                        new_problem +=        '<img src="img/'+val.logo+'/maxxmax" alt="polo shirt img" class="carusel-block-img img-responsive">';
                        new_problem +=        '<h4 class="carusel-block-content-title">'+title+'</h4>';
                        new_problem +='<div class="carusel-block-content-description">';
                        new_problem +=        '<p class="">'+val.description+'</p>';
                        new_problem +='</div></div>';
                        new_problem +='<span class="carusel-id-badge" href="#">'+val.id+'</span>';
                        new_problem +='</a></div></div>';
                        $("#"+table_type).append(new_problem);
                        new_problem = "";
                    });

                }
                if(data.materials.length < $(".data_project_viewer_number").data('projectViewerNumber')){
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


