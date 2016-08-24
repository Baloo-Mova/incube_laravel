<div class="button navbar-right">
    @if(!Auth::check())
    <a href="{{ url('/register') }}" class="btn navbar-btn nav-button">Реєстрація</a>
    <a href="{{url('/login')}}" class="btn navbar-btn nav-button login">Вхід</a>
        @else
        <a href="{{ url('/personal-area') }}" class="btn navbar-btn nav-button">Личный кабинет</a>
        <a href="{{url('/logout')}}" class="btn navbar-btn nav-button login">Выход</a>
    @endif
</div>