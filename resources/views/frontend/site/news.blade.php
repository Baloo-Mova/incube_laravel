@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="page-title text-center">
        <h2>Новини</h2>
    </div>
    <hr/>

  
    <div class="row">

        

        <!--Post List -->
        <div class="">
            <div class="tab-content">
                <div id="All" class="tab-pane fade in active">
                    @foreach ($articles as $article)
                    <div>
                        <h2 class=""><a href="{{route('article.show',[$article->id])}}" class="">{{str_limit($article->name,100)}}</a></h2>
                        <p>{!!str_limit($article->description,300)!!}  <a href="{{route('article.show',[$article->id])}}" class="btn btn-danger">Читати далі</a></p>
                        <div>
                            <span class="badge badge-default">Опубліковано {{$article->created_at}} Автор: {{$article->author->name}}</span>
                            <div class="pull-right">
                                @if($article->category!=null && !$article->category->isChildren())
                                <span class="badge badge-category">{{$article->category->name or ''}}</span>
                                @else
                                <span class="badge badge-category">{{$article->category->parent->name or ''}}</span>
                                <span class="badge badge-category">{{$article->category->name or ''}}</span>
                                @endif

                            </div>
                        </div>
                    </div> 
                    <hr>
                    @endforeach
                </div>
                

            
        </div>

        <div class="clearfix"></div>
        
    </div>
</div>
@stop
@section('js')

@stop