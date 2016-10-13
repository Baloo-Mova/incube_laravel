@extends('frontend.layouts.template')

@section('content')
<div class="container">
    <div class="page-title text-center">
        <h2>Блог</h2>
    </div>
    <hr/>


    <div class="row">

        @foreach ($articles as $article)
        <h2 class=""><a href="{{route('article.show',[$article->id])}}" class="">{{str_limit($article->name,100)}}</a></h2>
        <p>{!!str_limit($article->description,400)!!} <a href="{{route('article.show',[$article->id])}}" class="btn btn-danger">Читати далі</a></p>
        <div>
            <span class="badge badge-default">Опубліковано {{$article->created_at}} Автор: {{$article->author->name}}</span>
            <div class="pull-right">
                <span class="badge badge-category">{{$article->category->name or ''}}</span>
            </div>
        </div> 
        <hr>
        @endforeach




    </div>
</div>
@stop

@section('js')

@stop