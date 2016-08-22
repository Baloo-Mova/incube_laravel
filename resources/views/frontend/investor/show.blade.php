@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Заявка інвестора. Ідентифікаційний номер: {{ $model->id }}</h2>
        </div>

        <div id="content" class="project-viewer-content">
            <div class="panel panel-primary">
                <div class="panel-heading text-center"><h4>Інвестор</h4></div>
                <div class="panel-body"><h3 class="text-center" style="color: #00aeef" ><?= $model["investor_name"] ?></h3>
                </div>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-md-6">
                <div class="product col-md-9 service-image-left">
                        <img id="item-display" src="../img/projects_img/<?= $model["id"] ?>.jpg" alt=""></img>
                </div>
            </div>


            <div class="col-md-6">

                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Галузь</div>
                    <div class="panel-body">
                        {{ $model->economicActivities->name }}
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Сума, яку готові інвестувати</div>
                    <div class="panel-body product-price"><?= number_format($model["investor_cost"], 0, '.', '.') ?> $
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">Регіон інвестування</div>
                    <div class="panel-body product-price"><?= $model["region"] ?>
                    </div>
                </div>
                <div class="btn-group cart">
                    <button type="button" class="btn btn-success glyphicon glyphicon-euro">
                        Запропонувати  проект
                    </button>
                </div>
                <div class="btn-group wishlist">
                    <button type="button" class="btn btn-primary glyphicon glyphicon-user">
                        Прийняти участь
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-md-12 product-info">
                <ul id="myTab" class="nav nav-tabs nav_tabs text-center">

                    <li class="active"><a href="#service-one" data-toggle="tab">Опис заявки</a></li>

                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="service-one">

                        <section class="container product-info">


                            <h3>Інвестор:</h3>
                            <p><?= $model["investor_name"] ?></p>
                            <h3>Контактні дані:</h3>
                            <p><?= $model["investor_contacts"] ?></p>
                            <h3>Етап проекту:</h3>
                            <p><?= $model["stage_project"] ?></p>

                            <h3>Регіон інвестування:</h3>
                            <p><?= $model["region"] ?> </p>
                            <h3>Період реалізації інвестиційного проекту(у міс.):</h3>
                            <p><?= $model["duration_project"] ?> </p>
                            <h3>Термін повернення вкладених коштів(у міс.):</h3>
                            <p> <?= $model["term_refund"] ?> </p>
                            <h3>Планована рентабельність проекту:</h3>
                            <p> <?= $model["plan_rent"] ?> </p>
                            <h3>Інше:</h3>
                            <p> <?= $model["other"] ?> </p>


                        </section>

                    </div>
                    <div class="tab-pane fade" id="service-two">

                        <section class="container">

                        </section>

                    </div>
                    <div class="tab-pane fade" id="service-three">

                    </div>
                </div>
                <hr/>
            </div>
        </div>

        <p>
            <a href="#" class="btn-primary btn">Update</a>
            <a href="#" class="btn-danger btn">Delete</a>
        </p>
    </div>

@stop
