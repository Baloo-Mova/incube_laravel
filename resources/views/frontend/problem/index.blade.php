@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="page-title text-center">
            <h2>Замовникам</h2>
        </div>
        <hr/>
        <div class="text-center">
            <p><b> Замовник </b> - це користувач, який подає проблему(завдання) для вирішення.</p>
            Замовниками можуть виступати юридичні та фізичні особи, які хочуть отримати рішення у вигляді проекту для поданої проблеми(завдання).
            <p>Якщо ви хочете виступити замовником - заповніть наступну форму: </p>
            <div class="text-center">
                <a href="{{ route('problem.create') }}" class="btn btn-lg btn-danger center">Подати заявку
                    <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr/>
        <div class="page-title text-center">
            <h2>Подані проблеми проблеми(завдання)</h2>
        </div>
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
        <div class="text-center all-questions">
            <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index', ['cat_id=1#Problem']) }}">
                Усі позиції
            </a>
        </div>
    </div>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            initialize_owl($("#problems"), options);
        });
    </script>
@stop