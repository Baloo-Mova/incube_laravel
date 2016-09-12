<ul class="nav nav-pills nav-stacked well">
    <li class="{{ Route::is('personal_area.index') ? 'active':'' }}"><a href="{{ route('personal_area.index') }}"><i class="fa fa-home"></i> Кабінет</a></li>
    <li class="{{ Route::is('personal_area.edit') ? 'active':'' }}"><a href="{{route('personal_area.edit')}}"><i class="fa fa-user"></i> Профіль</a></li>
    <li class="{{ Route::is('personal_area.security') ? 'active':'' }}"><a href="{{route('personal_area.security')}}"><i class="fa fa-key"></i> Безпека</a></li>
    <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
</ul>