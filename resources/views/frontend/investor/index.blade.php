@extends('frontend.layouts.template')

@section('content')
    <div class="page-title text-center">
        <h2>Інвесторам</h2>
    </div>
    <hr/>
    <div class="container text-center">
        <p><b> Інвестор </b> - це користувач, що вкладає кошти.</p>

        <ul class="nav"> Інвесторомами можуть виступати Юридичні та Фізичні особи, які можуть вкладувати кошти у інноваційний проект

        </ul>

        <p>Якщо ви хочете виступити інвестором - заповніть наступну форму: </p>
        <div class="text-center">
            <a href="{{ route('investor.create') }}" class="btn btn-lg btn-danger center">Подати заявку
                <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>
    <hr/>
    <div class="row page-title text-center">
        <h2>Інвестор може вкласти кошти у наступне</h2>
    </div>
    <br/>
    <div class="row">
        <section id="aa-popular-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="aa-popular-category-area">
                                <!-- start prduct navigation -->
                                <div class="row" >
                                <ul class="nav aa-products-tab">
                                    <li class="active">
                                        <a href="#popular" data-toggle="tab">Питання(проблеми) для вирішення</a></li>
                                    <li><a href="#featured" data-toggle="tab">Запроновані проекти</a></li>

                                </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start popular problems -->
                                    <div class="tab-pane fade in active" id="popular">
                                        <ul class="aa-product-catg aa-popular-slider">
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="#"><img src="../img/250n300.png" alt="polo shirt img"></a>
                                                    <a class="aa-add-card-btn" href="$"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                    <figcaption class="aa-content">
                                                        <h4 class="aa-product-title">asdasd</h4>
                                                        </span><span class="aa-product-price"><del>$65.50</del></span>
                                                    </figcaption>
                                                </figure>
                                                <!-- product id -->
                                                <span class="aa-badge aa-sale" href="#">1</span>
                                            </li>
                                        </ul>
                                        <a class="btn btn-success btn-lg" href="#">Усі питання
                                            <span class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / popular problem category -->
                                    <!-- start prop-project category -->
                                    <div class="tab-pane fade" id="featured">
                                        <ul class="aa-product-catg aa-featured-slider">
                                            <!-- start single product item -->
                                            <li>
                                                <figure>
                                                    <a class="aa-product-img" href="#"><img src="../img/250n300.png" alt="polo shirt img"></a>
                                                    <a class="aa-add-card-btn" href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                    <figcaption class="aa-content">
                                                        <h4 class="aa-product-title">asd</h4>
                                                    </figcaption>
                                                </figure>
                                                <!-- product badge -->
                                                <span class="aa-badge aa-sale" href="#">1</span>
                                            </li>
                                        </ul>
                                        <a class="btn btn-success btn-lg" href="#">Усі запропоновані проекти<span class="fa fa-long-arrow-right"></span></a>
                                    </div>
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

    <div class="row page-title text-center">

        <h2>Заявки на інвестування</h2>

    </div>
    <br/>
    <div class="row">
        <section id="aa-popular-category">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="aa-popular-category-area">
                                <!-- start prduct navigation -->

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- Start popular problems -->
                                    <div class="tab-pane fade in active" id="popular">
                                        <ul class="aa-product-catg aa-popular-slider">
                                            <!-- start single product item -->
                                            @foreach($investProjects as $item)
                                                <li>
                                                    <figure>
                                                        <a class="aa-product-img" href="#"><img src="{{ empty($item->logo)? 'http://placehold.it/250x300' : url('/investor/image/'.$item->logo) }}" alt="polo shirt img"></a>
                                                        <a class="aa-add-card-btn" href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                        <figcaption class="aa-content">
                                                            <h4 class="aa-product-title">{{ $item->investor_name }}</h4>
                                                            <span class="aa-product-price">{{ $item->investor_cost }}</span>
                                                        </figcaption>
                                                    </figure>
                                                    <!-- product id -->
                                                    <span class="aa-badge aa-sale" href="#">{{ $item->id }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <a class="btn btn-success btn-lg" href="#">Усі заявки
                                            <span class="fa fa-long-arrow-right"></span></a>
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
@stop