@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="page-title text-center">
        <h2>Блог. Категорїї</h2>
    </div>
    <hr/>
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-list fa-fw"></i>
                    Категорії
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('admin.category.edit', [$category->id]) }}">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            {{ $category->name }} ()
                            <span class="pull-right text-muted">
                                <a href="{{ route('admin.category.delete', ['id'=>$category->id]) }}" class="confirm-delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </span>
                        </li>
                        @endforeach
                    </ul>
                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.category.store')}}">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </button>
                            </span>
                            <div class="col-md-6">
                                <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="text" placeholder="Введіть назву категорії">
                            </div>
                            <div class="col-md-6">
                                @include('admin.partials.categories_select',
                                    ['categories'=> $categories,
                                     'categoriesAttributeName'=>'parent_id',
                                     'categoriesAttributeValueNow' => old('parent_id')
                                    ])
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <hr/>

</div>
@stop

@section('js')

@stop