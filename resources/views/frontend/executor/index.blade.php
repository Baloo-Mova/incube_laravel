@extends('frontend.layouts.template')

@section('content')

<div class="container">
    <div class="page-title text-center">
        <h2>Виконавцям</h2>
    </div>

    <hr/>

    <div class="text-center">
        <p><b> Виконавець </b> - це користувач, який є фахівцем у певній галузі і хоче взяти участь у проекті або знайти роботу.</p>
        <ul class="nav"> Виконавцями можуть виступати юридичні та фізичні особи, які бажають взяти участь у реалізації проекту.
        </ul>
        <p>Подайте своє резюме, заповнивши наступну форму: </p>
        <div class="text-center">
            <a href="{{ route('executor.create') }}" class="btn btn-lg btn-danger center">Подати заявку
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
    <div>
        <ul class="nav"><h3>Важливі відомості:</h3>
            <li> 1. Заповнивши і надіславши цю заявку нам, Ви даєте згоду на обробку наведеної інформації згідно вимог
                чинного законодавства.
            </li>
            <li> 2. За повноту і достовірність інформації, наведеної про підприємство, відповідає користувач, який
                заповнив заявку.
            </li>
            <li> 3. Не наводьте інформацію, яка підпадає під статус комерційної чи державної таємниці, оскільки
                відповідальність за її недотримання покладається на представника, який заповнив відповідну зявку.
            </li>
            <li> 4. Анкета заповнюється, перевіряється і надсилається безпосередньо представником підприємства, влади
                або навчального закладу, який є контактною особою в межах проекту.
            </li>
        </ul>
    </div>
    <div class="text-center">
        <h3>За згодою Ваші пропозиції будуть розміщені на платформі «ІнКуб».</h3><h3>Сподіваємося на ефективну співпрацю.</h3>
    </div>
    <hr/>

    <div class="page-title text-center">
        <h2>Запропонуйте свою участь у вже опублікованих проектах</h2>
    </div>

    <br>

    <div class="select-tabs">
        <ul class="nav nav-tabs text-center" id="myTab">
            <li class="active"><a href="#problem" data-toggle="tab">Проблеми</a></li>
            <li><a href="#designer" data-toggle="tab">Проекти</a></li>
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
            <div class="row text-center all-questions">
                <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index', ['cat_id=1#Problem']) }}">
                    Усі позиції
                </a>
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
            <div class="row text-center all-questions">
                <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index', ['cat_id=1#Investor']) }}">
                    Усі проекти
                </a>
            </div>
        </div>
    </div>

</div>

@stop
@section('js')
<script>
    $(function () {

        initialize_owl($('#problems'), options);
        initialize_owl($('#executors'), options);

        $('a[href="#problem"]').on('shown.bs.tab', function () {
            initialize_owl($('#problems'), options);
        }).on('hide.bs.tab', function () {
            destroy_owl($('#problems'));
        });

        $('a[href="#designer"]').on('shown.bs.tab', function () {
            initialize_owl($('#designers'), options);
        }).on('hide.bs.tab', function () {
            destroy_owl($('#designers'));
        });
    });
</script>
@stop