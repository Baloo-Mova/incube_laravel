@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Редагування Статті. Ідентифікаційний номер:{{$article->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <div class="col-md-offset-2">
        <div class="c col-md-10 text-center">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            <a href="{{ route('article.show',['material'=>$article->id]) }}" class="btn-primary btn">Продивитись</a>
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
                <div class="form-group {{ $errors->has('status_id')?'has-error':'' }}">
                    <label class="control-label" for="status_id">Автор:</label>{{$article->author->name}}
                    
                   
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('status_id')?'has-error':'' }}">
                    <label class="control-label" for="status_id">Статус</label>
                    <select id="country_id" class="form-control" name="status_id">
                       @foreach(\App\Models\Status::all() as $status)
                        <option value="{{ $status->id }}" {{ $article->status_id == $status->id ? "selected" : "" }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status_id'))
                    <span class="control-label"> {{ $errors->first('status_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                        <label class="control-label" for="name">Назва статті:<span class="form-required">*</span></label>
                        <input type="text" value="{{ $article->name }}" name="name" class="form-control" id="text">

                        @if($errors->has('name'))
                            <span class="control-label"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
           
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('stage_id')?'has-error':'' }}">
                        <label class="control-label" for="category_id">Категорія <span class="form-required">*</span></label>
                        @include('admin.partials.categories_select',
                        ['categories'=> $categories,
                        'categoriesAttributeName'=>'category_id',
                        'categoriesAttributeValueNow' => $article->category_id
                        ])
                        @if($errors->has('category_id'))
                            <span class="control-label"> {{ $errors->first('category_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>
           
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                        <label class="control-label" for="description">Зміст:</label>
                        <textarea rows="12" type="text" name="description" class="form-control"
                                  id="text">{{ $article->description }}</textarea>
                        @if($errors->has('description'))
                            <span class="control-label"> {{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('link')?'has-error':'' }}">
                        <label class="control-label" for="link">Посилання:</label>
                        <input type="text" value="{{ $article->link }}" name="link" class="form-control"
                               id="text">
                        @if($errors->has('link'))
                            <span class="control-label"> {{ $errors->first('link') }}</span>
                        @endif
                    </div>
                </div>
            </div>
          <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="control-label" for="email">Логотип:</label>
                        <input type="file" name="logo_file" class="form-control" id="logo">
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
<script type="text/javascript">
   
   $("#logo").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            'allowedFileTypes': ['image'],
            'multiple': false,
            initialPreview: [
                "{{route('images.show',['id'=>$article->logo,'width'=>'max','height'=>'max'])}}"
            ],
            initialPreviewAsData: true,
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {upload} {zoom} {other}' +
                '    </div>\n' +
                '    {drag}\n' +
                '    <div class="clearfix"></div>\n' +
                '</div>',
            }
        });
        

      
    </script>
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
            tinymce.init({
            selector: "textarea",
                    language: 'uk_UA',
                    plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
</script>
@stop
