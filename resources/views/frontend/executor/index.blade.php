@extends('frontend.layouts.template')

@section('content')

<div class="container">
    <div class="page-title text-center">
        <h2>Виконацям</h2>
    </div>

    <hr/>

    <div class="text-center">
        <p><b> Виконавець </b> - це користувач, що є фахівцем у певній галузі і який хоче прийняти участь у проекті або знайти роботу.</p>
        <ul class="nav"> Виконавцями можуть виступати Юридичні та Фізичні особи, які бажають взяти участь у реалізації проекту.
        </ul>
        <p>Подайте своє резюме, заповнивши наступну форму: </p>
        <div class="text-center">
            <a href="{{ route('executor.create') }}" class="btn btn-lg btn-danger center">Подати заявку
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>

    <hr/>

    <div class="page-title text-center">
        <h2>Запропонуйте свою участь у вже опублікованих проектах</h2>
    </div>

    <br>

    <div class="select-tabs">
        <ul class="nav nav-tabs text-center" id="myTab">
            <li class="active"><a href="#problem" data-toggle="tab">Проблеми</a></li>
            <li><a href="#designer" data-toggle="tab">Інвестиційні пропозиції</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div id="problem" class="tab-pane fade in active">
            <div class="carusel" id="problems">
                @forelse($problems as $item)
                    @include('frontend.partials.carusel_item',['item'=>$item])
                @empty
                    <div class="row text-center">
                        <h3>Проблеми відсутні</h3>
                    </div>
                @endforelse
            </div>
        </div>
        <div id="designer" class="tab-pane fade">
            <div class="carusel" id="designers">
                @forelse($designers as $item)
                    @include('frontend.partials.carusel_item',['item'=>$item])
                @empty
                    <div class="row text-center">
                        <h3>Опубліковані пропозиції відсутні </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="text-center all-questions">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index') }}">
            Усі позиції
        </a>
    </div>
</div>

@stop
@section('js')
    <script>
        $(function () {

            initialize_owl($('#problems'),options);
            initialize_owl($('#executors'),options);

            $('a[href="#problem"]').on('shown.bs.tab', function () {
                initialize_owl($('#problems'),options);
            }).on('hide.bs.tab', function () {
                destroy_owl($('#problems'));
            });

            $('a[href="#designer"]').on('shown.bs.tab', function () {
                initialize_owl($('#designers'),options);
            }).on('hide.bs.tab', function () {
                destroy_owl($('#designers'));
            });
        });
    </script>
@stop