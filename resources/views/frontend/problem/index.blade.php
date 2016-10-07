@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="page-title text-center">
            <h2>Замовникам</h2>
        </div>
        <hr/>
        <div class="text-center">
            <p><b> Замовник </b> - це користувач, что подає питання(проблему) для вирішення.</p>
            Замовниками можуть виступати Юридичні та Фізичні особи, які можуть вкладувати кошти у інноваційний проект
            <p>Якщо ви хочете виступити Замовником - заповніть наступну форму: </p>
            <div class="text-center">
                <a href="{{ route('problem.create') }}" class="btn btn-lg btn-danger center">Подати заявку
                    <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr/>
        <div class="page-title text-center">
            <h2>Дійсні проблеми</h2>
        </div>
        <div id="problem" class="tab-pane fade in active">
            <div class="carusel" id="problems">
            @forelse($problems as $item)
                    @include('frontend.partials.carusel_item',['item'=>$item])
            @empty
                <div class="row text-center">
                    <h3>Проблемы отсутствуют</h3>
                </div>
            @endforelse
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
        $(document).ready(function () {
            initialize_owl($("#problems"), options);
        });
    </script>
@stop