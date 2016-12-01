<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="">
                <ul class="nav nav-pills nav-stacked well">
                    <li class="{{(Request::is('admin') ? 'active' : '') }}">
                        <a href="{{route('site.index')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                     <li class="{{((Request::is('admin/problem') ||Request::is('admin/problem/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#customer">Замовник <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="customer" class="{{((Request::is('admin/problem') ||Request::is('admin/problem/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.problem.index")}}">Список питань(проблем)</a>
                            </li>
                            {{--<li>
                                <a href="{{route("admin.problem.create")}}">Створити питання</a>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{((Request::is('admin/investor') ||Request::is('admin/investor/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#investor">Інвестор <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="investor" class="{{((Request::is('admin/investor') ||Request::is('admin/investor/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.investor.index")}}">Список інвестиційних заявок</a>
                            </li>
                            {{--<li>
                                <a href="{{route("admin.investor.create")}}">Створити заявку</a>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{((Request::is('admin/designer') ||Request::is('admin/designer/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#designer">Проектант <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="designer" class="{{((Request::is('admin/designer') ||Request::is('admin/designer/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.designer.index")}}">Список проектів</a>
                            </li>
                            {{--<li>
                                <a href="{{route("admin.designer.create")}}">Створити проект</a>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{((Request::is('admin/executor') ||Request::is('admin/executor/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#executor">Виконавець <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="executor" class="{{((Request::is('admin/executor') ||Request::is('admin/executor/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.executor.index")}}">Список резюме</a>
                            </li>
                            {{--<li>
                                <a href="{{route("admin.executor.create")}}">Створити резюме</a>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{((Request::is('admin/employer') ||Request::is('admin/employer/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#employer">Роботодавець <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="employer" class="{{((Request::is('admin/employer') ||Request::is('admin/employer/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.employer.index")}}">Список пропозицій роботи</a>
                            </li>
                           {{-- <li>
                                <a href="{{route("admin.employer.create")}}">Сворити пропозицію</a>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{((Request::is('admin/users') ||Request::is('admin/users/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#users">Користувачі <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="{{((Request::is('admin/users') ||Request::is('admin/users/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.users.index")}}">Список користувачів</a>
                            </li>
                           {{-- <li>
                                <a href="{{route("admin.users.create")}}">Сворити користувача</a>
                            </li>--}}
                        </ul>
                    </li>
                    <li class="{{((Request::is('admin/blog') ||Request::is('admin/blog/*') )? 'active' : '') }}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#blog">Блог <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="blog" class="{{((Request::is('admin/blog') ||Request::is('admin/blog/*') )? 'collapse in' : 'collapse') }}">
                            <li>
                                <a href="{{route("admin.article.index")}}">Список cтатей</a>
                            </li>
                           <li>
                                <a href="{{route("admin.category.index")}}">Список категорій</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>