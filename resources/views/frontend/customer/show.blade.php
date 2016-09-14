@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Заявка на вирішення питання(проблеми). Ідентифікаційний номер: {{ $problem->id }}</h2>
    </div>

    <hr/>
    <div class="row">

        <div class="col-md-8">

            <div class="text-center owl-carousel owl-theme" id="owl-demo">

                <div class="">
                    <img class="img-responsive" src="{{ empty($problem->logo)? 'http://placehold.it/250x300' : url('/customer/image/'.$problem->logo)}}" alt="">

                </div>

            </div>
            <div class="panel panel-primary">
                <div class="panel-body"><h3 class="text-center" style="color: #00aeef">{{ $problem->name}}</h3>
                </div>
            </div>
        </div> 

        <div class="col-md-4" id="col">
            <div class="panel panel-primary affix-top" id="fix-div">


                <div class="text-center">
                    <h4 class="title-border">Галузь</h4>
                    @if(!$problem->economicActivities->isChildren())
                    <p>{{ $problem->economicActivities->name }}</p>
                    @else
                    <p>{{ $problem->economicActivities->parent->name }}:</p> <div class="clearfix"></div>  <span style="margin-left: 20px">{{ $problem->economicActivities->name }}</span>
                    @endif


                </div>


                <div class="text-center">
                    <h4 class="title-border">Країна</h4>
                    <p>{{ $problem->country->name }}</p>
                </div>
                @if(isset($problem->city))
                <div class="text-center">
                    <h4 class="title-border">Регіон</h4>
                    <p>{{ $problem->city->name }}</p>

                </div>
                @endif
                <hr/>
                <div class="">  
                    @if(Auth::check())
                    @if(Auth::user()->can('offer', $problem))

                    <div class="text-center">
                        <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span> </a>
                    </div>

                    <div class="text-center">
                        <a href="#" class="btn btn-primary"> <span><i class="fa fa-user"></i> Запропонувати проект</span> </a>
                    </div>
                    @endif
                    @endif
                </div>
                <hr/>
            </div>
        </div>


    </div>
    <div class='row col-md-8'>
        <div class="btn-toolbar">

            @if(Auth::check())
            @if($problem->status_id != \App\Models\Status::PUBLISHED)

            <div class="btn-group pull-left">
                <a href="{{ route('customer.edit', ['id'=>$problem->id]) }}"
                   class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group pull-left">
                <a href="{{ route('customer.delete', ['id'=>$problem->id]) }}"
                   onclick="return confirm('Вы точно хотите удалить проэкт?')"
                   class="btn-danger btn">Видалити</a>
            </div>
            @endif
            @endif 

        </div>
        <hr/>
        <div class="product-info">
            <!--<div class="tab-pane fade in active" id="service-one">
                <section class="product-info">-->
            <h4>Опис питання</h4>
            <blockquote>
                <p> {!!$problem->description!!} </p>
            </blockquote>



            <!-- </section>
         </div>-->

        </div>
    </div>
    <hr/>

</div>

@stop
@section('js')
<script>
    $(document).ready(function () {

        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 1,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });


    });

</script>
@stop