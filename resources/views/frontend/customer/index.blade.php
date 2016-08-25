@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Замовникам</h2>
</div>
<hr/>
<div class="container text-center">
    <p><b> Замовник </b> - це користувач, что подає питання(проблему) для вирішення.</p>

    <ul class="nav"> Замовниками можуть виступати Юридичні та Фізичні особи, які можуть вкладувати кошти у інноваційний проект

    </ul>

    <p>Якщо ви хочете виступити Замовником - заповніть наступну форму: </p>
    <div class="text-center">
        <a href="{{ route('customer.create') }}" class="btn btn-lg btn-danger center">Подати заявку
            <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
</div>
<hr/>
{{--<div class="row">--}}
{{--<div class="well well-sm">--}}

{{--<div class="btn-group">--}}

{{--</div>--}}

{{--<div class="col-xs-4 col-sm-4 col-md-4">--}}

{{--<select>--}}
{{--<option>Filter</option>--}}
{{--</select>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<hr/>--}}
<div class="row page-title text-center">
    <h2>Дійсні проблеми</h2>
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
                                <!-- <ul class="nav aa-products-tab">
                                   <li class="active">
                                        <a href="#popular" data-toggle="tab">Питання(проблеми) для вирішення</a></li>
                                    <li><a href="#featured" data-toggle="tab">Запроновані проекти</a></li>

                                </ul>-->
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!-- Start popular problems -->
                                <div class="tab-pane fade in active" id="popular">
                                    <ul class="aa-product-catg aa-popular-slider">
                                        <!-- start single product item -->
                                        @foreach($customerProblems as $item)
                                        <li>
                                            <figure>
                                                <a class="aa-product-img" href="#"><img src="{{ empty($item->logo)? 'http://placehold.it/250x300' : url('/customer/image/'.$item->logo) }}" alt="polo shirt img"></a>
                                                <a class="aa-add-card-btn" href="#"><span class="glyphicon glyphicon-arrow-right"></span>Продивитись</a>
                                                <figcaption class="aa-content">
                                                    <h4 class="aa-product-title">{{ $item->problem_name }}</h4>
                                                   <!-- <span class="aa-product-price">{{ $item->problem_description }}</span>-->
                                                </figcaption>
                                            </figure>
                                            <!-- product id -->
                                            <span class="aa-badge aa-sale" href="#">{{ $item->id }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <a class="btn btn-success btn-lg" href="#">Усі питання
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

<hr/>


@stop