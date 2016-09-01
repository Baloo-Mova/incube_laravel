@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Подача проекту</h2>
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

        <div class="form-group {{ $errors->has('project_name')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="project_name">Назва проекту:</label>
            <div class="col-md-10">

                <input type="text" value="{{ old('project_name') }}" name="project_name" class="form-control" id="text">

                @if($errors->has('project_name'))
                <span class="control-label"> {{ $errors->first('project_name') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('project_manager')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="project_manager">Керівник проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user">
                        </i>
                    </div>
                    <textarea rows="4" type="text" name="project_manager" class="form-control" id="text" placeholder="Введіть дані про керівника проекту. Наприклад: Шевченко А.Р., нач. РННВЦ «Фірма».">{{ old('project_manager') }}</textarea>
                </div>
                @if($errors->has('project_manager'))
                <span class="control-label"> {{ $errors->first('project_manager') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('project_contacts')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="Contacts">Контактні дані:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-book ">
                        </i>
                    </div>
                    <textarea rows="4" type="text" name="project_contacts" class="form-control" id="text">{{ old('investor_contacts') }}</textarea>
                </div>
                @if($errors->has('project_contacts'))
                <span class="control-label"> {{ $errors->first('project_contacts') }}</span>
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

        <div class="form-group {{ $errors->has('project_goal')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="project_goal">Мета проекту:</label>
            <div class="col-md-10">

                <textarea rows="4" type="text" name="project_goal" class="form-control" id="text">{{ old('project_goal') }}</textarea>
                @if($errors->has('project_goal'))
                <span class="control-label"> {{ $errors->first('project_goal') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('project_aspects')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="project_aspects">Іноваційні аспекти та переваги проекту:</label>
            <div class="col-md-10">


                <textarea rows="4" type="text" name="project_aspects" class="form-control" id="text">{{ old('project_aspects') }}</textarea>
                @if($errors->has('project_aspects'))
                <span class="control-label"> {{ $errors->first('project_aspects') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('project_beneficaries')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="project_beneficaries">Отримувачі вигоди:</label>
            <div class="col-md-10">

                <textarea rows="4" type="text" name="project_beneficaries" class="form-control" id="text">{{ old('project_beneficaries') }}</textarea>
                @if($errors->has('project_beneficaries'))
                <span class="control-label"> {{ $errors->first('project_beneficaries') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="description">Стислий опис проекту:</label>
            <div class="col-md-10">


                <textarea rows="4" type="text" name="description" class="form-control" id="text">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                <span class="control-label"> {{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('project_cost')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="project_cost">Вартість проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-usd">
                        </i>
                    </div>
                    <input type="number" value="{{ old('project_cost') }}" name="project_cost" class="form-control" id="text">
                </div>
                @if($errors->has('project_cost'))
                <span class="control-label"> {{ $errors->first('project_cost') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('project_duration')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="project_duration">Період реалізації проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar-o">
                        </i>
                    </div>
                    <input type="text" value="{{ old('project_duration') }}" name="project_duration" class="form-control" id="text">
                </div>
                @if($errors->has('project_duration'))
                <span class="control-label"> {{ $errors->first('project_duration') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="region">Географія проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-crosshairs">
                        </i>
                    </div>
                    <input type="text" value="{{ old('region') }}" name="region" class="form-control" id="text">
                </div>
                @if($errors->has('region'))
                <span class="control-label"> {{ $errors->first('region') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('project_stage')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="project_stage">Етап проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-flag">
                        </i>
                    </div>
                    <input type="text" value="{{ old('project_stage') }}" name="project_stage" class="form-control" id="text">
                </div>
                @if($errors->has('project_stage'))
                <span class="control-label"> {{ $errors->first('project_stage') }}</span>
                @endif
            </div>
        </div>



        <div class="form-group {{ $errors->has('economic_activities')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="Галузь">Галузь:</label>
            <div class="col-md-10">
                <select class="form-control" name="economic_activities_id">
                    @foreach($economicActivities as $i => $item)
                    <option value="{{ $i }}" {{ ( old("economic_activities_id") == $i ? "selected":"") }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="form-group {{ $errors->has('available_funding')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Джерела фінансування:</label>
            <div class="col-md-10">

                <input type="text" value="{{ old('available_funding') }}" name="available_funding" class="form-control" id="text">
                @if($errors->has('available_funding'))
                <span class="control-label"> {{ $errors->first('available_funding') }}</span>
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
        <div class="form-group">
            <label class="col-md-2 control-label" for="email">Інші файли:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-upload">
                        </i>
                    </div>
                    <input type="file" name="project_files" class="form-control" id="file_up">
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
@stop
