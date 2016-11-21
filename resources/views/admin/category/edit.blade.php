@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Редагування категорії. Ідентифікаційний номер:{{$category->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <div class="col-md-offset-2">
        <div class="c col-md-10 text-center">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            <a href="{{ route('admin.article.index') }}" class="btn-primary btn">Продивитись</a>
        </div>
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
       
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                        <label class="control-label" for="name">Назва:<span class="form-required">*</span></label>
                        <input type="text" value="{{ $category->name }}" name="name" class="form-control" id="text">

                        @if($errors->has('name'))
                            <span class="control-label"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
           
             <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="parent">Головна Категорія:</label>
                    @include('admin.partials.categories_select',
                    ['categories'=> $categories,
                    'categoriesAttributeName'=>'parent_id',
                    'categoriesAttributeValueNow' => $category->parent_id
                    ])
                </div>
            </div>
        </div>
           

          

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <input value="Зберегти" type="submit" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@section('js')

@stop
