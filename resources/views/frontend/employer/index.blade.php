@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Підприємцям</h2>
</div>
<hr/>
<div class="container">
    <p><b> Підприємець </b> - це користувач, що пропонує вакансії на роботу.</p>

    <ul class="nav"> Підприємцями можуть виступати Юридичні та Фізичні особи. </ul>

    <p>Якщо Ви хочете запропонувати свої вакансії на роботу - заповніть наступну форму: </p>
    <div class="text-center">
        <a href="{{ route('employer.create') }}" class="btn btn-lg btn-danger center">Подати заявку
            <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <ul class="nav"> <h3>Важливі відомості:</h3>
        <li> 1. Заповнивши і надіславши цю заявку нам, Ви даєте згоду на обробку наведеної інформації згідно вимог чинного законодавства.</li>
        <li> 2. За повноту і достовірність інформації, наведеної про підприємство відповідає користувач, який заповнив заявку.</li>
        <li> 3. Не наводьте інформацію, яка підпадає під статус комерційної чи державної таємниці, оскільки відповідальність за її недотримання покладається на представника, який заповнив відповідну зявку.</li>
        <li> 4. Анкета заповнюється, перевіряється і надсилається безпосередньо представником підприємства, учбової установи, влади, тощо – тобто, безпосередньо контактною особою для розвитку співпраці в межах проекту.</li>
    </ul> 
    <h3>За згодою Ваші пропозиції будуть розміщені на платформі «ІнКуб». Сподіваємося на ефективну співпрацю.</h3>
</div>
<hr/>


<div class="materials">
    <div class="page-title text-center">


        <h2>Підприємець може може знайти працівника</h2>
    </div>
    <br/>

    <div class="carusel" id="materials">
        @for($i = 0;$i<10;$i++)
        <div class="carusel-block wow slideInUp" data-wow-duration="{{$i/10}}s">
            <div class="carusel-block-content">
                <a class="img-responsive" href="#">
                    <img src="{{ asset('img/250n300.png') }}" alt="polo shirt img">
                </a>
                <div class="carusel-block-content-description">
                    Обновление экосистемы города запорожье и запорожской области
                </div>
                <a class="show-btn hvr-rectangle-out" href="#">Продивитись</a>
            </div>
            <span class="carusel-badge" href="#">{{ $i }}</span>
        </div>
        @endfor
    </div>
    <div class="row text-center">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('material.index') }}">
            Усі питання
        </a>
    </div>
</div>

<hr/>


<br/>
<div class="materials">
    <div class="page-title text-center">

        <h2>Вже опубліковані вакансії</h2>

    </div>
    <div class="carusel" id="materials">
        @foreach($employerProjects as $item)
        <div class="carusel-block">
            <div class="carusel-block-content">
                <a class="img-responsive" href="#">
                    <img src="{{ empty($item->logo)? 'http://placehold.it/250x300' : url('/employer/image/'.$item->logo)}}" alt="polo shirt img">
                </a>
                <div class="carusel-block-content-description">
                    {{$item->short_name}}
                </div>
                <a class="show-btn hvr-rectangle-out" href="#">Продивитись</a>
            </div>
            <span class="carusel-badge" href="#">{{ $item->id }}</span>
        </div>
        @endforeach
    </div>
    <div class="row text-center">
        <a class="btn btn-success btn-lg margin-auto" href="{{ route('material.index') }}">
            Усі питання
        </a>
    </div>
</div>
@stop
@section('js')
<script>
    $(function () {

        window.scrollTo(0, 0);

        $("#bg-slider").owlCarousel({
            navigation: false, // Show next and prev buttons
            loop: true,
            items: 1,
            mouseDrag: false,
            autoplay: true,
            autoplayHoverPause: true,
            animateIn: 'bounceInRight',
            animateOut: 'bounceOutRight',
            autoplayTimeout: 8000,
            autoplaySpeed: 3000,
            smartSpeed: 3000
        });

        $('#how-it-work').owlCarousel({
            loop: true,
            navigation: false,
            margin: 30,
            stagePadding: 150,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 3000,
            smartSpeed: 3000
        });

        $('#materials').owlCarousel({
            loop: true,
            nav: true,
            items: 4,
            center: true,
            dots: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500
        });

        $('.set-active-tab').on('click', function () {
            $('.board li').each(function (item) {
                $(this).removeClass('active');
            });
            $($(this).prop("hash") + '-li').addClass('active');
        });
    });
</script>
@stop