@extends('frontend.layouts.template')

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

        @if(!Auth::check())
        <div class="form-group">
            <label class="col-md-2 control-label" for="пошта">Email:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope-o">
                        </i>
                    </div>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="text">
                </div>
            </div>
        </div>
        @endif

        <div class="">
            <div class='col-xs-4 col-sm-4 col-md-4'>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user">
                            </i>
                        </div>
                        <input type="text" value="{{ old('executor_fname') }}" name="executor_fname" class="form-control" id="text" placeholder="Ім'я">
                    </div>
                </div>
            </div> 
            <div class='col-xs-4 col-sm-4 col-md-4'>
                <div class="form-group">


                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user">
                            </i>
                        </div>
                        <input type="text" value="{{ old('executor_sname') }}" name="executor_sname" class="form-control" id="text" placeholder="Прізвище">
                    </div>

                </div>
            </div> 
            <div class='col-xs-4 col-sm-4 col-md-4'>
                <div class="form-group">

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user">
                            </i>
                        </div>
                        <input type="text" value="{{ old('executor_thname') }}" name="executor_thname" class="form-control" id="text" placeholder="По-батькові">
                    </div>

                </div> 
            </div> 
        </div>
        <hr/>
        <div class="form-group">
            <label class="col-md-2  control-label" for="date_birth">Дата народження:</label>
            <div class="col-md-6">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker1'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input type="text" value="{{ old('date_birth') }}" class="form-control" name="contacts">

                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="experience">Досвід роботи:</label>
            <div class="col-md-10">

                <textarea rows="3" type="text" name="experience" class="form-control" id="text">{{ old('experience') }}</textarea>

            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="education">Освіта:</label>
            <div class="col-md-10">

                <textarea rows="3" type="text" name="education" class="form-control" id="text">{{ old('education') }}</textarea>

            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="internship">Стажування та практика:</label>
            <div class="col-md-10">

                <textarea rows="3" type="text" name="internship" class="form-control" id="text">{{ old('internship') }}</textarea>

            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="participation_projects">Участь у проектах:</label>
            <div class="col-md-10">

                <textarea rows="3" type="text" name="participation_projects" class="form-control" id="text">{{ old('participation_projects') }}</textarea>

            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="description">Опис професійних якостей:</label>
            <div class="col-md-10">

                <textarea rows="6" type="text" name="description" class="form-control" id="text">{{ old('description') }}</textarea>

            </div>

        </div>
        <div class="form-group">

            <label class="col-md-2  control-label" for="education">Адреса:</label>
            <div class="col-md-10">
                <input type="text" value="{{ old('adress') }}" name="adress" class="form-control" id="text">

            </div>
        </div> 
        <div class="form-group">

            <label class="col-md-2  control-label" for="phone">Телефон:</label>
            <div class="col-md-10">
                <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" id="text">

            </div>
        </div> 



        <div class="form-group">
            <label class="col-md-2  control-label" for="Contacts">Інші контактні дані:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-book ">
                        </i>
                    </div>
                    <textarea rows="3" type="text" name="contacts" class="form-control" id="text">{{ old('contacts') }}</textarea>
                </div>
            </div>
            <div class="help-block"></div>
        </div>


        <div class="form-group">

            <label class="col-md-2  control-label" for="doc_file">Резюме(в ел. варіанті):</label>
            <div class="col-md-10">
                <input type="text" value="{{ old('doc_file') }}" name="doc_file" class="form-control" id="text">

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
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
        });
    });
</script>
@stop
