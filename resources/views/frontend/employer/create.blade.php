@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Подача вакансій</h2>
</div>
<hr/>
<div class="container">
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

        @if(!Auth::check())
        <div class="form-group">
            <label class="col-md-2 control-label" for="Реєєстраційна пошта">Ел. пошта для реєстрації:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
                    <input type="email" value="{{ old('reg_email') }}" name="reg_email" class="form-control" id="text">
                </div>
            </div>
        </div>
        @endif

        <div class="form-group {{ $errors->has('org_name')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="org_name">Назва організації:</label>
            <div class="col-md-10">

                <input type="text" value="{{ old('org_name') }}" name="org_name" class="form-control" id="text">

                @if($errors->has('org_name'))
                <span class="control-label"> {{ $errors->first('org_name') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('adress')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="Contacts">Адресса:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-book ">
                        </i>
                    </div>
                    <textarea rows="2" type="text" name="adress" class="form-control" id="text">{{ old('adress') }}</textarea>

                </div>@if($errors->has('adress'))
                <span class="control-label"> {{ $errors->first('adress') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="phone">Телефон:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone">
                        </i>
                    </div>
                    <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="text">
                </div>
                @if($errors->has('phone'))
                <span class="control-label"> {{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Контактна ел. пошта:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope">
                        </i>
                    </div>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="text">
                </div>
                @if($errors->has('email'))
                <span class="control-label"> {{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('web_site')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="web_site">Веб-сайт:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-wifi">
                        </i>
                    </div>
                    <input type="text" value="{{ old('web_site') }}" name="web_site" class="form-control" id="text">
                </div>
                @if($errors->has('web_site'))
                <span class="control-label"> {{ $errors->first('web_site') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('org_info')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="org_info">Коротка характеристика діяльності організації:</label>
            <div class="col-md-10">

                <textarea rows="4" type="text" name="org_info" class="form-control" id="text">{{ old('org_info') }}</textarea>
                @if($errors->has('org_info'))
                <span class="control-label"> {{ $errors->first('org_info') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="description">Загальна інформація (звернення організації):</label>
            <div class="col-md-10">


                <textarea rows="6" type="text" name="description" class="form-control" id="text" placeholder="Укажіть точні назви відкритих вакансій у вигляді списку">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                <span class="control-label"> {{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="short_name">Короткий перелік вакансій:</label>
            <div class="col-md-10">

                <input type="text" value="{{ old('short_name') }}" name="short_name" class="form-control" id="text">
                @if($errors->has('short_name'))
                <span class="control-label"> {{ $errors->first('short_name') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="Галузь">Галузь:</label>
            <div class="col-md-10">
                <select class="form-control" name="economic_activities_id">
                    @foreach($economicActivities as $i => $item)
                    <option value="{{ $i }}" {{ ( old("economic_activities_id") == $i ? "selected":"") }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group {{ $errors->has('org_type')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="org_type">Тип організації:</label>
            <div class="col-md-10">

                <input type="text" value="{{ old('org_type') }}" name="org_type" class="form-control" id="text">
                @if($errors->has('org_type'))
                <span class="control-label"> {{ $errors->first('org_type') }}</span>
                @endif
            </div>
        </div>


        <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="other">Інше:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-info">
                        </i>
                    </div>
                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ old('other') }}</textarea>
                </div>
                @if($errors->has('other'))
                <span class="control-label"> {{ $errors->first('other') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="email">Логотип:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-photo">
                        </i>
                    </div>
                    <input type="file" name="logo_img_file" class="form-control" id="file_up">
                </div>
            </div>
        </div>



        <input value="Подати" type="submit" class="btn btn-success col-md-offset-2">

    </form>
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
        'showUpload': false,
        'previewFileType': 'any',
        'allowedFileTypes': ['image']

    });
</script>
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
