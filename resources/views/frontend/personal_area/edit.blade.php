@extends('frontend.layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row well">
        <div class="col-md-2">
            <ul class="nav nav-pills nav-stacked well">
                <li><a href="{{ route('personal_area.index') }}"><i class="fa fa-home"></i> Кабінет</a></li>
                <li class="active"><a href=""><i class="fa fa-myUser"></i> Профіль</a></li>
                <li><a href="#"><i class="fa fa-key"></i> Безпека</a></li>
                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i> Вихід</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="page-title text-center">
                <h2>Редагування Аккаунта</h2>
            </div>
            <hr/>
            @if(Session::has('message'))
            <p class="alert alert-info col-md-offset-2 col-md-10">{{ Session::get('message') }}</p>
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
                        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                            <label class="control-label" for="Назва інвестування">Email:</label>
                            <input type="email" value="{{ $myUser->email }}" name="email" class="form-control" id="text">
                            @if($errors->has('email'))
                                <span class="control-label"> {{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('investor_name')?'has-error':'' }}">
                    <label class="control-label" for="Назва інвестування">PIB:</label>
                    <input type="text" value="{{ $myUser->name }}" name="name" class="form-control" id="text">
                    @if($errors->has('myUser_name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
                
        
       
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Аватар:</label>


                        <input type="file" name="logo_img_file" class="form-control" id="file_up">

                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Фон:</label>
                       <input type="file" name="bg_img_file" class="form-control" id="file_up">
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
            
            <!--end div-->
        </div>

    </div>
</div>
@stop
@section('js')
<script type="text/javascript">
    //    $('select').select2({
    //        placeholder: "Выберите регион",
    //        allowClear: true,
    //        width: 'resolve'
    //    });
    $("#file_up").fileinput({
    'showUpload'          : false,
            'previewFileType'     : 'image',
            'allowedFileTypes'    : ['image'],
            'initialPreview'      : [
                    @if (!empty($myUser->logo)) '{{url('/myUsers/image/'.$investor->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
    });</script>
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js')}}"></script>
<script>
            tinymce.init({
            selector: "textarea",
                    plugins: [
                            "advlist autolink lists link image charmap print preview anchor",
                            "searchreplace visualblocks code fullscreen",
                            "insertdatetime media table contextmenu paste"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
            });
</script>
@stop