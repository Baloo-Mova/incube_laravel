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
            <li><a href="#Problem" class="materials_button" data-table-type="Problem" data-toggle="tab">Проблеми</a></li>
            <li><a href="#Investor" class="materials_button" data-table-type="Investor" data-toggle="tab">Заявки на інвестування</a></li>
            <li><a href="#Designer" class="materials_button" data-table-type="Designer" data-toggle="tab">Проекти</a></li>
            <li><a href="#Executor" class="materials_button" data-table-type="Executor" data-toggle="tab">Резюме</a></li>
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

        <div id="Problem" class="tab-pane fade">

        </div>

         <div id="Investor" class="tab-pane fade">

        </div>

        <div id="Designer" class="tab-pane fade">

        </div>

        <div id="Executor" class="tab-pane fade">

        </div>
    </div>
</div>
@stop
@section('js')
    <script>
        $(function () {

            $("select").on('change', function(){

            });

            $('.materials_button').on('click', function(){
                var cat_id = $('select').val(),
                        table_type = $(this).attr('data-table-type');
                $.ajax({
                    url: "get/problems",
                    method: 'get',
                    data:{
                        table_types : table_type,
                        cat_id : cat_id
                    },
                }).done(function(data) {

                    $("#"+table_type).html("");
                    var new_problem = "";

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
                        new_problem +=        '</a></div></div>';
                        $("#"+table_type).append(new_problem);
                        new_problem = "";
                    });

                });

            });

        });
    </script>
@stop


