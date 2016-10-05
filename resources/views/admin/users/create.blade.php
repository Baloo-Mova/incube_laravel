@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Створення користувача</h2>
</div>
<hr/>
<div class="container">

    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}




        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label class="control-label" for="Назва питання">Прізвище Ім'я По-батькові<span class="form-required">*</span></label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="text">
                    @if($errors->has('name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('password')?'has-error':'' }}">
                    <label class="control-label" for="pass">Пароль<span class="form-required">*</span></label>
                    <input type="text" value="{{ old('password') }}" name="password" class="form-control" id="text">
                    @if($errors->has('password'))
                    <span class="control-label"> {{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="ел пошта">Електрона пошта
                        <span class='form-required'>*</span></label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="text">

                    @if($errors->has('email'))
                    <span class="control-label"> {{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                    <label class="control-label" for="region">Країна
                        <span class="form-required">*</span></label>
                    <select id="country_id" class="form-control" name="country_id">
                        @if(old('country_id')==null)
                        <option value="" selected disabled>Оберіть країну</option>
                        @endif
                        @foreach(\App\Models\Country::all() as $country)
                        <option value="{{ $country->id }}" {{ ( old('country_id') == $country->id ? "selected":"") }}>{{ $country->name }}</option>
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
                    <textarea rows="3" type="text" name="adress" class="form-control" id="text">{{ old('adress') }}</textarea>
                    @if($errors->has('adress'))
                    <span class="control-label"> {{ $errors->first('adress') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('phone_number')?'has-error':'' }}">
                    <label class="control-label" for="phone_number">Номер телефону:</label>
                    <input type="text" value="{{ old('phone_number') }}" name="phone_number" class="form-control" id="text">
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
                    <input type="text" value="{{ old('web_site') }}" name="web_site" class="form-control" id="text">
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
                    <textarea rows="3" type="text" name="contacts" class="form-control" id="text">{{ old('contacts') }}</textarea>
                    @if($errors->has('contacts'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Логотип:</label>
                    <input type="file" name="logo_img_file" class="form-control" id="logo">
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Фон:</label>
                    <input type="file" name="bg_img_file" class="form-control" id="logo">
                </div>
            </div>
        </div>



        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <input value="Подати" type="submit" class="btn btn-success">
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
        'multiple': false
    });


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
