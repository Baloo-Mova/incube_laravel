@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Виконацям</h2>
</div>
<hr/>
<div class="container text-center">
    <p><b> Виконавець </b> - це користувач, що є фахівцем у певній галузі і який хоче прийняти участь у проекті або знайти роботу.</p>

    <ul class="nav"> Виконавцями можуть виступати Юридичні та Фізичні особи, які бажають взяти участь у реалізації проекту.

    </ul>

    <p>Подайте своє резюме, заповнивши наступну форму: </p>
    <div class="text-center">
        <a href="{{ route('executor.create') }}" class="btn btn-lg btn-danger center">Подати заявку
            <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
<hr/>
<div class="row page-title text-center">
    <h2>Запропонуйте свою участь у вже опублікованих проектах</h2>
    {{--<h5>або знайдіть роботу з поданих вакансій</h5>--}}
</div>
<br/>

<div class='container'>

    <div class="select-tabs">
        <ul class="nav nav-tabs text-center" id="myTab">
            <li class="active"><a href="#project" data-toggle="tab">Подані проекти</a></li>
            {{--<li><a href="#employer" data-toggle="tab">Запропоновані вакансії</a></li>--}}
        </ul>
    </div>
    <div class="tab-content">
        <div id="project" class="tab-pane fade in active">
            <div class="carusel" id="projects">
                @forelse($projects as $item)

                @include('frontend.partials.carusel_item',['item'=>$item])

                @empty
                <div class="row text-center">
                    <h3>Проблеми відсутні</h3>
                </div>
                @endforelse 
            </div>
        </div>


    </div>

    <div class="row text-center">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index') }}">
            Усі питання
        </a>
    </div>
</div>
<hr/>

<div class="row page-title text-center">

    <h2>Вже подані резюме</h2>

</div>
<div class='container'>

  
    
       
            <div class="carusel" id="problems">
                @forelse($executorProjects as $item)

                @include('frontend.partials.carusel_item',['item'=>$item])

                @empty
                <div class="row text-center">
                    <h3>Проблеми відсутні</h3>
                </div>
                @endforelse 
            </div>
        


  

    <div class="row text-center">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index') }}">
            Усі резюме
        </a>
    </div>
</div>
<br/>

@stop
@section('js')
<script>
    $(function () {
        initialize_owl($('#problems'), options);

        $('a[href="#problem"]').on('shown.bs.tab', function () {
            initialize_owl($('#problems'), options);
        }).on('hide.bs.tab', function () {
            destroy_owl($('#problems'));
        });

        $('a[href="#project"]').on('shown.bs.tab', function () {
            initialize_owl($('#projects'), options);
        }).on('hide.bs.tab', function () {
            destroy_owl($('#projects'));
        });
    });
</script>   
@stop