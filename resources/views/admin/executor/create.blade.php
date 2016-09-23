@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Падача резюме</h2>
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

       <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('author_id')?'has-error':'' }}">
                    <label class="control-label" for="author_id">Автор</label>
                    <select id="country_id" class="form-control" name="author_id">
                        @foreach(\App\User::all() as $user)
                        <option value="{{ $user->id }}" {{ ( old('author_id') == $user->id ? "selected":"") }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('author_id'))
                    <span class="control-label"> {{ $errors->first('author_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('status_id')?'has-error':'' }}">
                    <label class="control-label" for="status_id">Статус</label>
                    <select id="country_id" class="form-control" name="status_id">
                        @foreach(\App\Models\Status::all() as $status)
                        <option value="{{ $status->id }}" {{ ( old('status_id') == $status->id ? "selected":"") }}>{{ $status->name }}</option>
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
                    <label class="control-label" for="name">Прізвище, Ім'я, По-батькові:</label>
                   
                        <input type="text" value="{{ old('name') }}" class="form-control" name="name">

                    
                    @if($errors->has('name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif


                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('date_birth')?'has-error':'' }}">
                    <label class="control-label" for="date_birth">Дата народження:</label>
                    <div class='input-group date'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input type="text" value="{{ old('date_birth') }}" class="form-control" name="date_birth" id='datetimepicker1'>

                    </div>
                    @if($errors->has('date_birth'))
                    <span class="control-label"> {{ $errors->first('date_birth') }}</span>
                    @endif


                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('experience')?'has-error':'' }}">
                    <label class="control-label" for="experience">Досвід роботи:</label>


                    <textarea rows="3" type="text" name="experience" class="form-control" id="text">{{ old('experience') }}</textarea>
                    @if($errors->has('experience'))
                    <span class="control-label"> {{ $errors->first('experience') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('education')?'has-error':'' }}">
                    <label class="control-label" for="education">Освіта:</label>


                    <textarea rows="3" type="text" name="education" class="form-control" id="text">{{ old('education') }}</textarea>
                    @if($errors->has('education'))
                    <span class="control-label"> {{ $errors->first('education') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('internship')?'has-error':'' }}">
                    <label class="control-label" for="internship">Стажування та практика:</label>


                    <textarea rows="3" type="text" name="internship" class="form-control" id="text">{{ old('internship') }}</textarea>
                    @if($errors->has('internship'))
                    <span class="control-label"> {{ $errors->first('internship') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('participation_projects')?'has-error':'' }}">
                    <label class="control-label" for="participation_projects">Участь у проектах:</label>
                    <textarea rows="3" type="text" name="participation_projects" class="form-control" id="text">{{ old('participation_projects') }}</textarea>
                    @if($errors->has('participation_projects'))
                    <span class="control-label"> {{ $errors->first('participation_projects') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="description">Опис професійних якостей:</label>
                    <textarea rows="6" type="text" name="description" class="form-control" id="text">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('adress')?'has-error':'' }}">

                    <label class="control-label" for="adress">Адреса:</label>

                    <input type="text" value="{{ old('adress') }}" name="adress" class="form-control" id="text">
                    @if($errors->has('org_name'))
                    <span class="control-label"> {{ $errors->first('adress') }}</span>
                    @endif
                </div>
            </div>
        </div> 

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">

                    <label class="control-label" for="phone">Телефон:</label>

                    <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="text">
                    @if($errors->has('phone'))
                    <span class="control-label"> {{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
        </div> 


        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('contacts')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Інші контактні дані:</label>
                    <textarea rows="3" type="text" name="contacts" class="form-control" id="text">{{ old('contacts') }}</textarea>

                    @if($errors->has('contacts'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
                    @endif
                </div>
                <div class="help-block"></div>
            </div>
        </div>


        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="doc_file">Резюме(в ел. варіанті):</label>
                    <input type="text" value="{{ old('doc_file') }}" name="doc_file" class="form-control" id="text">
                </div>
            </div> 
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Логотип:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-photo">
                            </i>
                        </div>
                        <input type="file" name="logo_img_file" class="form-control" id="file_up">
                    </div>
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
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'YYYY-MM-DD',
        });
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
