<div class="navbar-fixed-top">
    <div class="header-connect">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5 col-sm-8 col-xs-8">
                    <div class="header-half header-call">
                        <p>
                            <i class="fa fa-phone"></i><span>  +777 7777 7777</span>
                            <i class="fa fa-envelope-o"></i><span> incube.zp@gmail.com</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-5  col-sm-3 col-sm-offset-1  col-xs-3  col-xs-offset-1">
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

    <nav class="navbar navbar-default">  <!--navbar-fixed-top-->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img src="../img/logo.png" alt=""></a>
            </div>

            @if(!Auth::check())
                @include('frontend.layouts.partials.registered_buttons')
            @endif

            <div class="collapse navbar-collapse js-navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="main-nav nav navbar-nav navbar-center">
                    <li class="" data-wow-delay="0s">
                        <a class="{{ (Request::is('/') ? 'active' : '') }}" href="{{url('/')}}">Головна</a></li>
                    <li class=" dropdown mega-dropdown">
                        <a href="#" class="dropdown-toggle  {{ (Request::is('/projects') ? 'active' : '') }}" data-wow-delay="0s" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Проекти
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li class="col-sm-2">
                                <ul>
                                    <li class="dropdown-header">Нові проекти</li>
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                        </div><!-- End Carousel Inner -->
                                    </div><!-- /.carousel -->
                                    <li class="divider"></li>
                                    <li><a href="{{url('/project-viewer/index')}}">Усі проекти</a></li>
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

                    <li class="" data-wow-delay="0.2s"><a href="{{url('/investor/index')}}">Інвестору</a></li>
                    <li class="" data-wow-delay="0.2s"><a href="{{url('/customer/index')}}">Замовнику</a></li>
                    <li class="" data-wow-delay="0.2s"><a href="{{url('/designer/index')}}">Проектанту</a></li>
                    <li class="" data-wow-delay="0.3s"><a href="{{url('/executor/index')}}">Виконавцю</a></li>
                    <li class="" data-wow-delay="0.4s"><a href="{{url('/site/contact')}}">Контакти</a></li>

                </ul>
                <div class="button navbar-right">
                    @if(Auth::check())
                        <a href="{{url('/personal-area')}}" class="btn navbar-btn nav-button wow bounceInRight login">
                            <span class="glyphicon glyphicon-home"></span> Особистий кабінет
                        </a>
                    @endif
                </div>
            </div><!-- /.navbar-collapse -->
    </nav>
</div>
{{--<div id="myModal" class="modal fade">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal">x</button>--}}
                {{--<div class="row-fluid user-row">--}}
                    {{--<img src="../img/logo.png" class="img-responsive" alt="log"/>--}}
                {{--</div>--}}
                {{--<h3 style="text-align: center;">Реєстрація</h3>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}