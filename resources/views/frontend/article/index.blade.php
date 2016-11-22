@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="page-title text-center">
        <h2>Блог</h2>
    </div>
    <hr/>

    <!--<select class="form-control" name="type_articles">
    @foreach($categories as $item)
        
                <option value="{{ $item->id }}" {{ ( $item->id ? "selected":"") }}>{{ $item->name }}</option>
            
       
    @endforeach
</select>-->
    <div class="row">

        <div class="col-lg-3 col-md-3" id="col">
            <div class="affix-top" id="fix-div">
                <ul class="nav nav-pills nav-stacked well">
                    <li class="All active"> <a href="#All"  class="materials_button" data-toggle="tab">Усе</a></li>
                     
                    @foreach($categories as $item)
                    @if($item->isParent())
                    <li class="{{$item->id}}"> <a href="#{{$item->id}}"   data-toggle="tab"> {{$item->name}}</a> </li>
                    @if(count($item->childrens)!=0)

                    @foreach($item->childrens as $children)

                    <li class="{{$children->id}} lpadding"> <a href="#{{$children->id}}" class="materials_button" data-toggle="tab"> {{$children->name}}</a> </li>
                    @endforeach

                    @endif
                    @else

                    @endif
                    @endforeach
                </ul>
            </div>
        </div>

        <!--Post List -->
        <div class="col-lg-9 col-md-9">
            <div class="tab-content">
                <div id="All" class="tab-pane fade in active">
                    @foreach ($articles as $article)
                    <div>
                        <h2 class=""><a href="{{route('article.show',[$article->id])}}" class="">{{str_limit($article->name,100)}}</a></h2>
                        <p>{!!str_limit($article->description,300)!!}  <a href="{{route('article.show',[$article->id])}}" class="btn btn-danger">Читати далі</a></p>
                        <div>
                            <span class="badge badge-default">Опубліковано {{$article->created_at}} Автор: {{$article->author->name}}</span>
                            <div class="pull-right">
                                @if(!$article->category->isChildren())
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
                <!-- Serega help -->
                @foreach($categories as $item)
                <div id="{{$item->id}}" class="tab-pane fade">
                <!-- обновить тут -->
                    @foreach ($articles as $article)
                
                @if($article->category->id==$item->id)
                    <div>
                        <h2 class=""><a href="{{route('article.show',[$article->id])}}" class="">{{str_limit($article->name,100)}}</a></h2>
                        <p>{!!str_limit($article->description,300)!!}  <a href="{{route('article.show',[$article->id])}}" class="btn btn-danger">Читати далі</a></p>
                        <div>
                            <span class="badge badge-default">Опубліковано {{$article->created_at}} Автор: {{$article->author->name}}</span>
                            <div class="pull-right">
                                @if(!$article->category->isChildren())
                                <span class="badge badge-category">{{$article->category->name or ''}}</span>
                                @else
                                <span class="badge badge-category">{{$article->category->parent->name or ''}}</span>
                                <span class="badge badge-category">{{$article->category->name or ''}}</span>
                                @endif

                            </div>
                        </div>
                    </div> 
                    <hr>
                    @endif
                    
                    
                    @endforeach
                    <!--end obnov tyt -->
                </div>
                
                @endforeach
                <!--end serega help -->

            </div>
        </div>

        <div class="clearfix"></div>
        <!-- <div class="more_button_block text-center" style="">
             <a class="btn btn-success btn-lg margin-auto more_button" data-number="1" href="#" {{$posts_number < config('posts.project_viewer_number') ? "disabled" : ""}}>Завантажити ще...</a>
             <span class="hidden data_project_viewer_number" data-project-viewer-number="{{config('posts.project_viewer_number')}}"></span>
         </div>-->
    </div>
</div>
@stop
@section('js')

@stop