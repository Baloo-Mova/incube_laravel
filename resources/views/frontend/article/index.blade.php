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

        @foreach ($articles as $article)
        <h2 class=""><a href="{{route('article.show',[$article->id])}}" class="">{{str_limit($article->name,100)}}</a></h2>
        <p>{!!str_limit($article->description,400)!!}  <a href="{{route('article.show',[$article->id])}}" class="btn btn-danger">Читати далі</a></p>
        <div>
            <span class="badge badge-default">Опубліковано {{$article->created_at}} Автор: {{$article->author->name}}</span>
            <div class="pull-right">
                <span class="badge badge-category">{{$article->category->name or ''}}</span>
            </div>
        </div> 
        <hr>
        @endforeach



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