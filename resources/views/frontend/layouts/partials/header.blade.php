<div id="header" class="navbar-fixed-top navbar-fixed-top-size" role="navigation">
    <div class="header-connect">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-sm-8 col-xs-12 text-center">
                    <div class="header-call">
                        <i class="glyphicon glyphicon-earphone"></i><span>  +777 7777 7777</span>
                        <i class="glyphicon glyphicon-envelope"></i><span> incube.zp@gmail.com</span>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1 hidden-xs">
                    <div class="header-half header-social">
                        <ul class="list-inline">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-vine"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <div class="nav-logo">
                <a class="navbar-brand" href="{{url('/')}}"><img src="{{url('/img/'.'logo.png')}}" alt=""> &nbsp;</a>
            </div>
            <div class="nav-toggle">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="main-nav nav navbar-nav navbar-center">
                <li class="" data-wow-delay="0s">
                    <a class="{{ (Request::is('/') ? 'active' : '') }}" href="{{url('/')}}">Головна</a>
                </li>
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle  {{ (Request::is('/projects') ? 'active' : '') }}" data-wow-delay="0s" data-toggle="dropdown">
                        Проекти <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu mega-dropdown-menu">
                        <li class="col-sm-2">
                            <ul>
                                <li class="dropdown-header">Нові проекти</li>
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                    </div><!-- End Carousel Inner -->
                                </div><!-- /.carousel -->
                                <li class="divider"></li>
                                <li><a href="{{url('/project-viewer')}}">Усі проекти</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li>
                                    <a class="dropdown-header">Сільське господарство, лісове господарство та рибне господарство</a>
                                </li>
                                <li class="divider"></li>
                                <li><a class="dropdown-header">Переробна промисловість (Виробництво)</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a class="dropdown-header">Водопостачання, каналізація, поводження з відходами</a>
                                </li>
                                <li class="divider"></li>
                                <li><a class="dropdown-header">Будівництво</a></li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li>
                                    <a class="dropdown-header">Транспорт, складське господарство, поштова та кур'єрська діяльність</a>
                                </li>
                                <li class="divider"></li>
                                <li><a class="dropdown-header">Професійна, наукова та технічна діяльність</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a class="dropdown-header">Діяльність у сфері адміністративного та допоміжного обслуговування</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a class="dropdown-header">Державне управління й оборона, обов'язкове соціальне страхування</a>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li><a class="dropdown-header">Освіта</a></li>
                                <li class="divider"></li>
                                <li><a class="dropdown-header">Охорона здоров'я та надання соціальної допомоги</a>
                                </li>
                                <li class="divider"></li>
                                <li><a class="dropdown-header">Мистецтво, спорт, розваги та відпочинок</a></li>
                                <li class="divider"></li>
                                <li>
                                    <a class="dropdown-header">Надання інших видів послуг (інші види діяльності) </a>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown mega-dropdown">
                    <a href="#" class="dropdown-toggle  {{ (Request::is('/projects') ? 'active' : '') }}" data-wow-delay="0s" data-toggle="dropdown">
                        Користувачу<b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu mega-dropdown-menu">


                        <li class="col-sm-2 col-sm-offset-1 text-center">
                            <a href="{{url('/customer')}}" class="dropdown-header">
                                <div class="hidden-xs"> 
                                    <img src="{{url('/img/'.'how-work3.png')}}" alt="" >
                                    
                                </div>
                                Замовнику
                            </a>
                        </li>
                        <li class="col-sm-2 text-center">
                            <a href="{{url('/investor')}}" class="dropdown-header">
                                <div class="hidden-xs"> 
                                    <img src="{{url('/img/'.'investor_desc_logo.png')}}" alt="" >
                                    
                                </div>
                                Інвестору
                            </a>
                        </li>
                        <li class="col-sm-2 text-center">
                            <a href="{{url('/designer')}}" class="dropdown-header">
                               <div class="hidden-xs"> 
                                    <img src="{{url('/img/'.'how-work1.png')}}" alt="" >
                                    
                                </div>
                                
                                Проектанту
                            </a>
                        </li>
                        <li class="col-sm-2 text-center">
                            <a href="{{url('/executor')}}" class="dropdown-header">
                                <div class="hidden-xs"> 
                                    <img src="{{url('/img/'.'how-work2.png')}}" alt="" >
                                    
                                </div>
                                Виконавцю
                            
                            </a>
                        </li>
                        <li class="col-sm-2 text-center">
                            <a href="{{url('/employer')}}" class="dropdown-header">
                            
                                 <div class="hidden-xs"> 
                                    <img src="{{url('/img/'.'how-work5.png')}}" alt="" >
                                    
                                </div>
                                Підприємцю
                            </a>
                        </li>

                    </ul>

                </li>
                <li><a href="{{url('/contacts')}}">Контакти</a></li>
                <li><a href="{{url('/about')}}">Про нас</a></li>
                <li><a href="{{url('/rules')}}">Правила</a></li>
            </ul>
            <ul class="main-nav nav navbar-nav navbar-right">
                @if(!Auth::check())
                <li class=""><a href="{{ url('/register') }}">Реєстрація</a></li>
                <li class=""><a href="{{url('/login')}}">Вхід</a></li>
                @else
                <li class=""><a href="{{ url('/personal-area') }}">Особистий кабінет</a></li>
                <li class=""><a href="{{url('/logout')}}">Вихід</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</div>
<div class="navbar-delimiter"></div>