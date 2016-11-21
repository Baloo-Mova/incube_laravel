@extends('frontend.layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row page-title text-center">
        <h2>{{ $article->name}} </h2>
    </div>
    <hr/>


    <div class="row">

        <div class="col-md-12">
            <div class="text-center owl-carousel owl-theme" id="owl-demo">


                <img class="img-responsive"
                     src="{{ route('images.show', ['id'=> $article->logo,'height'=>'max','width'=>'max']) }}"
                     alt="">

            </div>
            
            <div class="">
                <div class="text-center"><span class="badge badge-default">Автор: {{$article->author->name}} Обубліковано: {{$article->created_at}}</span></div>
                
            </div>
            <hr/>
            <div class="product-info">

                {!! $article->description !!}



                @if(!empty($article->link))
                <p>Для більш детальної інформації перейдтіть за посиланням:  <a href="{{ $article->link }}" class="btn-primary btn">Перейти</a></p>
                @endif
            </div>

        </div>


        <hr/>
    </div>
    
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
