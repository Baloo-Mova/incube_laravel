@extends('frontend.layouts.template')

@section('content')


@include('frontend.layouts.partials.slider')


<div class="content-area">
    <div class="container">
        <div class="row page-title text-center wow zoomInLeft" data-wow-delay="1s">
            <h2>Про нас</h2>
        </div>
        <div class="row how-it-work">


            <div class="board"> 
                <div class="board-inner">
                    <ul class="nav nav-tabs" id="myTab">
                        <div class="liner"></div>
                        <li class="active">
                            <a href="#home" data-toggle="tab" title="welcome">
                                <span class="round-tabs one">
                                    <i class="glyphicon glyphicon-home"></i>
                                </span> 
                            </a></li>

                        <li><a href="#profile" data-toggle="tab" title="profile">
                                <span class="round-tabs two">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span> 
                            </a>
                        </li>
                        <li><a href="#messages" data-toggle="tab" title="bootsnipp goodies">
                                <span class="round-tabs three">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                </span> </a>
                        </li>

                        <li><a href="#settings" data-toggle="tab" title="blah blah">
                                <span class="round-tabs four">
                                    <i class="glyphicon glyphicon-comment"></i>
                                </span> 
                            </a></li>

                        <li><a href="#doner" data-toggle="tab" title="completed">
                                <span class="round-tabs five">
                                    <i class="glyphicon glyphicon-ok"></i>
                                </span> </a>
                        </li>

                    </ul></div>

                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">

                        <h3 class="head text-center">Вас вітає <span style="color:#f48260;"></span></h3>
                        <h3 class="text-center">Відкрита регіональна платформа науково виробничого партнерства</h3>
                        <h1 class="text-center"><span style='color: #D30072; font-weight: bold;'>In</span><span style="color:#00AEEF; font-weight: bold;">Cube</span></h1>


                        <h4 class="narrow text-center">
                            Дана платформа розрахована на реалізацію молодіжних наукових розробок, актуальних для промислових і сільськогосподарських підприємств Запорізького регіону.

                        </h4>
                        <p class="text-center">
                            <a href="#" class="btn btn-success btn-outline-rounded green"> Детальніше <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <h3 class="head text-center">Зареєструйте свій аккаунт</h3>
                        <h4 class="narrow text-center">
                            Для того, щоб почати роботу - зареєструйтесь
                        </h4>

                        <p class="text-center">
                            <a href="#" class="btn btn-success btn-outline-rounded green"> Створити свій аккаунт <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                        </p>

                    </div>
                    <div class="tab-pane fade" id="messages">
                        <h3 class="head text-center">Подайте свій проект</h3>
                        <h4 class="narrow text-center">
                            Розмістіть на платформі свій проект
                        </h4>

                        <p class="text-center">
                            <a href="#" class="btn btn-success btn-outline-rounded green"> Подати заявку <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <h3 class="head text-center">Слідкуйте за проектом</h3>
                        <h4 class="narrow text-center">
                            Для подальшого розвинення проекта спілкуйтесь з іншими учасниками платформи для отримання інвестицій, плану роботи, потрібних фахівців, тощо.
                        </h4>

                        <p class="text-center">
                           <!-- <a href="" class="btn btn-success btn-outline-rounded green"> start using bootsnipp <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></a>-->
                        </p>
                    </div>
                    <div class="tab-pane fade" id="doner">
                        <div class="text-center">
                            <i class="img-intro icon-checkmark-circle"></i>
                        </div>
                        <h3 class="head text-center">Дякуємо</h3>
                        <h4 class="narrow text-center">
                            Дякуємо за те, що ви берете участь у роботі платформи.
                        </h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Role users panel -->
        <div class="page-title text-center wow zoomInDown" data-wow-delay="1s">

            <h2>Оберіть вашу роль</h2>
        </div>
        <div class="row how-it-work text-center">
            <a href="/customer/index">
                <div class="col-md-3">
                    <div class="single-work wow fadeInUp" data-wow-delay="0.8s">
                        <img src="../img/how-work3.png" alt="">
                        <h3>Замовник</h3>
                        <p>Подає питання, що потрібно вирішити</p>
                    </div>
                </div>
            </a>
            <a href="investor/index">
                <div class="col-md-3">
                    <div class="single-work  wow fadeInUp"  data-wow-delay="0.9s">
                        <img src="../img/investor_desc_logo.png" alt="">
                        <h3>Інвестор</h3>
                        <p>Юридичні та фізичні особи, які можуть вкладувати кошти у інноваційний проект</p>
                    </div>
                </div>
            </a>
            <a href="/designer/index">
                <div class="col-md-3">
                    <div class="single-work wow fadeInUp"  data-wow-delay="1s">
                        <img src="../img/how-work1.png" alt="">
                        <h3>Проектант</h3>
                        <p>Розробник інноваційного проекту</p>
                    </div>
                </div>
            </a>
            <a href="/executor/index">
                <div class="col-md-3">
                    <div class="single-work wow fadeInUp"  data-wow-delay="1s">
                        <img src="../img/how-work2.png" alt="">
                        <h3>Виконавець</h3>
                        <p>Фахівець певної галузі, який бажає взяти участь у проекті</p>
                    </div>
                </div>
            </a>
        </div>
        <!-- end Role-->
        <hr>
        <!--sliders for problems and projects -->
        <div class="container">
            <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                <h5>Дійсні проекти</h5>
                <h2><span>10</span>-ТОП Проектів для вас</h2>
            </div>
            <div class="row">
                <section id="aa-popular-category">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="aa-popular-category-area">

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <!-- Start popular projects -->
                                            <div class="tab-pane fade in active" id="popular">
                                                <ul class="aa-product-catg aa-popular-slider">
                                                    <!-- start single product item -->

                                                    <?php
                                                    for ($i = 0; $i < 10; $i++) {
                                                        ?>
                                                        <li>
                                                            <figure>
                                                                <a class="aa-product-img" href="#"><img src="../img/250n300.png" alt="polo shirt img"></a>
                                                                <a class="aa-add-card-btn"href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                                <figcaption>
                                                                    <h4 class="aa-product-title">Projects </h4>
                                                                    <!--<span class="aa-product-price">$<?= number_format(rand(60, 662000), 0, '.', '.') ?></span><span class="aa-product-price"><del>$65.50</del></span>-->
                                                                </figcaption>
                                                            </figure>                     

                                                            <!-- product id -->
                                                            <span class="aa-badge aa-sale" href="#"><?= $i + 1 ?></span>
                                                        </li>
                                                    <?php } ?>                                
                                                </ul>
                                                <a class="btn btn-success btn-lg" href="#">Усі проекты <span class="fa fa-long-arrow-right"></span></a>
                                            </div>
                                            <!-- / popular projects category -->
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </section>
                <!-- / popular section -->
            </div>

            <hr>
            <!--sliders for problems and projects -->
            <div class="container">
                <div class="row page-title text-center wow bounce"  data-wow-delay="1s">
                    <h5>Дійсні питання</h5>
                    <h2><span>10</span>-ТОП питань для вас</h2>
                </div>
                <div class="row">
                    <section id="aa-popular-category">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="aa-popular-category-area">

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <!-- Start popular problems -->
                                                <div class="tab-pane fade in active" id="popular">
                                                    <ul class="aa-product-catg aa-popular-slider">
                                                        <!-- start single product item -->

                                                        <?php
                                                        for ($i = 0; $i < 10; $i++) {
                                                            ?>
                                                            <li>
                                                                <figure>
                                                                    <a class="aa-product-img" href="#"><img src="../img/250n300.png" alt="polo shirt img"></a>
                                                                    <a class="aa-add-card-btn"href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                                    <figcaption>
                                                                        <h4 class="aa-product-title">Питання </h4>
                                                                        <!--<span class="aa-product-price">$<?= number_format(rand(60, 662000), 0, '.', '.') ?></span><span class="aa-product-price"><del>$65.50</del></span>-->
                                                                    </figcaption>
                                                                </figure>                     

                                                                <!-- product id -->
                                                                <span class="aa-badge aa-sale" href="#"><?= $i + 1 ?></span>
                                                            </li>
                                                        <?php } ?>                                
                                                    </ul>
                                                    <a class="btn btn-success btn-lg" href="#">Усі питання <span class="fa fa-long-arrow-right"></span></a>
                                                </div>
                                                <!-- / popular problem category -->
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- / popular section -->
                </div>

                <hr/>

                <div class="homeSection-categories homeSection-subSection">


                    <div class="row page-title text-center wow bounce animated" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: bounce;">

                        <h2>Оберіть сферу діяльності</h2>
                    </div>



                    <div class="container odd wow fadeInLeft" data-wow-delay="1s">    
                        <div class="row">

                            <?php
                            for ($i = 1; $i < 14; $i++) {
                                //if($key->pid==NULL){
                                ?>

                                <a class="homeTile ng-isolate-scope" href="#" ga-event-on="click" ga-event-category="Homepage" ga-event-action="Explore" ga-event-label="Technology">
                                    <div class="homeTile-content" style="background-image: url('../img/eco_category/e<?= $i ?>.png')">
                                        <div class="homeTile-background"></div>
                                        <div class="homeTile-icon">    <svg class=""><use xmlns:xlink="" xlink:href="#icon-icon-technology"></use></svg>
                                        </div>
                                        <div class="homeTile-title">
                                            name
                                        </div>
                                    </div>
                                </a>
                            <?php } ?> 
                        </div>

                    </div>
                </div>

            </div>

        </div>
        <!-- end container-->
    </div> 
    <!-- end content area-->
    @stop

    @section('css')
    @stop

    @section('js')
    @stop