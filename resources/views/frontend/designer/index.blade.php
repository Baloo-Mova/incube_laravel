@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Проектантам</h2>
</div>
<hr/>
<div class="container">
    <p><b> Проектант </b> - це користувач, що пропонує свої проекти.</p>
    <p>Для співпраці наукової спільноти України з підприємствами великого, середнього
        та малого бізнесу. Ви зможете на взаємовигідних умовах запропонувати їм свої вже
        наявні наукові розробки для розв’язання актуальних практичних проблем, надати
        професійні консультації чи здійснити науково-дослідні роботи, спрямовані на
        створення необхідних для конкретного замовника прикладних розробок.</p>

    <ul class="nav"> Інвесторомами можуть виступати Юридичні та Фізичні особи, які можуть вкладувати кошти у інноваційний проект

    </ul>

    <p>Якщо Ви хочете запропонувати свій проект - заповніть наступну форму: </p>
    <div class="text-center">
        <a href="{{ route('designer.create') }}" class="btn btn-lg btn-danger center">Подати заявку
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
<div class="row page-title text-center">
    <h2>Проектант може запропонувати свої прокти</h2>
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
                                        @foreach($designerProjects as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#"><img src="{{ empty($item->logo)? 'http://placehold.it/250x300' : url('/designer/image/'.$item->logo) }}" alt="polo shirt img"></a>
                                                <a class="aa-add-card-btn" href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                <figcaption class="aa-content">
                                                    <h4 class="aa-product-title">{{ $item->project_name }}</h4>
                                                    <span class="aa-product-price">{{ $item->project_cost }}</span>
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