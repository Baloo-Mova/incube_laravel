@extends('frontend.layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row well">
        <div class="col-md-2">
            @include('frontend.personal_area.sidebar')
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
                            <label class="control-label" for="Пошта">Email:</label>
                            <input type="email" value="{{ $myUser->email }}" name="email" class="form-control" id="text">
                            @if($errors->has('email'))
                                <span class="control-label"> {{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label class="control-label" for="ПІБ">Прізвище Ім'я По-батькові:</label>
                    <input type="text" value="{{ $myUser->name }}" name="name" class="form-control" id="text">
                    @if($errors->has('name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                        <label class="control-label" for="region">Країна</label>
                        <select id="country_id" class="form-control" name="country_id">
                            @foreach(\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ $myUser->country_id == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country_id'))
                            <span class="control-label"> {{ $errors->first('country_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('adress')?'has-error':'' }}">
                    <label class="control-label" for="adress">Адреса:</label>
                    <textarea rows="3" type="text" name="adress" class="form-control" id="text">{{ $myUser->adress }}</textarea>
                    @if($errors->has('adress'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
            <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('phone_number')?'has-error':'' }}">
                    <label class="control-label" for="phone_number">Номер телефону:</label>
                    <input type="text" value="{{ $myUser->phone_number }}" name="phone_number" class="form-control" id="text">
                    @if($errors->has('phone_number'))
                    <span class="control-label"> {{ $errors->first('phone_number') }}</span>
                    @endif
                </div>
            </div>
        </div>   
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('web_site')?'has-error':'' }}">
                    <label class="control-label" for="web_site">Веб-Сторінка:</label>
                    <input type="text" value="{{ $myUser->web_site }}" name="web_site" class="form-control" id="text">
                    @if($errors->has('web_site'))
                    <span class="control-label"> {{ $errors->first('web_site') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('contacts')?'has-error':'' }}">
                    <label class="control-label" for="contacts">Інші контактні відомості:</label>
                    <textarea rows="3" type="text" name="contacts" class="form-control" id="text">{{ $myUser->contacts }}</textarea>
                    @if($errors->has('contacts'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
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