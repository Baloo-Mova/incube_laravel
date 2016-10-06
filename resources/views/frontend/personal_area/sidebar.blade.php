<ul class="nav nav-pills nav-stacked well">

    <li class="{{ Route::is('personal_area') ? 'active':'' }}">
        <a href="javascript:;" data-toggle="collapse" class="" data-target="#customer"><i class="fa fa-file-text-o"></i> Проекти <i class="fa fa-fw fa-caret-down"></i></a>
        <ul id="customer" class="nav nav-pills nav-stacked lpadding {{((Request::is('personal-area/projects') ||Request::is('personal-area/projects/*') ||Request::is('personal-area') )? 'collapse in' : 'collapse')}}">
            <li class="{{ Route::is('personal_area.customer') ? 'active':'' }}">
                <a href="{{route("personal_area.customer")}}">Питання (проблеми)</a>
            </li>
            <li class="{{ Route::is('personal_area.investor') ? 'active':'' }}">
                <a href="{{route("personal_area.investor")}}">Заявки на інвестування</a>
            </li>
            <li class="{{ Route::is('personal_area.designer') ? 'active':'' }}">
                <a href="{{route("personal_area.designer")}}">Проекти</a>
            </li>
            <li class="{{ Route::is('personal_area.executor') ? 'active':'' }}">
                <a href="{{route("personal_area.executor")}}">Резюме</a>
            </li>
        </ul>
    </li>
    <li class="{{ Route::is('personal_area.event') ? 'active':'' }}"><a href="{{ route('personal_area.event') }}"><i class="fa fa-clock-o"></i> Сповіщення</a></li>
    <li class="{{ Route::is('personal_area.edit') ? 'active':'' }}"><a href="{{route('personal_area.edit')}}"><i class="fa fa-user"></i> Профіль</a></li>
    <li class="{{ Route::is('personal_area.security') ? 'active':'' }}"><a href="{{route('personal_area.security')}}"><i class="fa fa-key"></i> Безпека</a></li>
    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
</ul>