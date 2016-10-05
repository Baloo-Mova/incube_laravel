@extends('frontend.layouts.template')

@section('content')

<div class="container">
    <div class="page-title text-center">
        <h2>Проектантам</h2>
    </div>

    <hr/>

    <p>
        <b> Проектант </b> - це користувач, що пропонує свої проекти.
    </p>
    <p>Для співпраці наукової спільноти України з підприємствами великого, середнього
        та малого бізнесу. Ви зможете на взаємовигідних умовах запропонувати їм свої вже
        наявні наукові розробки для розв’язання актуальних практичних проблем, надати
        професійні консультації чи здійснити науково-дослідні роботи, спрямовані на
        створення необхідних для конкретного замовника прикладних розробок.
    </p>
    <p><b>Проектантами</b> можуть виступати Юридичні та Фізичні особи, які можуть запропонувати інноваційний проект</p>
    <p>Якщо <b>Ви хочете запропонувати свій проект</b> - заповніть наступну форму: </p>

    <div class="text-center">
        <a href="{{ route('designer.create') }}" class="btn btn-lg btn-danger center">Подати заявку
            <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <ul class="nav"><h3>Важливі відомості:</h3>
        <li> 1. Заповнивши і надіславши цю заявку нам, Ви даєте згоду на обробку наведеної інформації згідно вимог
            чинного законодавства.
        </li>
        <li> 2. За повноту і достовірність інформації, наведеної про підприємство відповідає користувач, який
            заповнив заявку.
        </li>
        <li> 3. Не наводьте інформацію, яка підпадає під статус комерційної чи державної таємниці, оскільки
            відповідальність за її недотримання покладається на представника, який заповнив відповідну зявку.
        </li>
        <li> 4. Анкета заповнюється, перевіряється і надсилається безпосередньо представником підприємства, учбової
            установи, влади, тощо – тобто, безпосередньо контактною особою для розвитку співпраці в межах проекту.
        </li>
    </ul>
    <h3>За згодою Ваші пропозиції будуть розміщені на платформі «ІнКуб». Сподіваємося на ефективну співпрацю.</h3>

    <hr>

    <h2 class="text-center">Проектант може запропонувати свої проекти</h2>

    <div class="select-tabs">
        <ul class="nav nav-tabs text-center" id="myTab">
            <li class="active"><a href="#problem" data-toggle="tab">Проблеми</a></li>
            <li><a href="#project" data-toggle="tab">Інвестиційні пропозиції</a></li>
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

        <div id="project" class="tab-pane fade">
            <div class="carusel" id="projects">
                @forelse($investor as $item)

                    @include('frontend.partials.carusel_item',['item'=>$item])

                @empty
                    <div class="row text-center">
                        <h3>Опубліковані пропозиції відсутні </h3>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="text-center">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('project_viewer.index') }}">
            Усі питання
        </a>
    </div>

</div>

@stop
@section('js')
 <script>
        $(function () {
            initialize_owl($('#problems'),options);

            $('a[href="#problem"]').on('shown.bs.tab', function () {
                initialize_owl($('#problems'),options);
            }).on('hide.bs.tab', function () {
                destroy_owl($('#problems'));
            });

            $('a[href="#project"]').on('shown.bs.tab', function () {
                initialize_owl($('#projects'),options);
            }).on('hide.bs.tab', function () {
                destroy_owl($('#projects'));
            });
        });
    </script>   
@stop