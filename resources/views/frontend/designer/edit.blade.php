@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оноволення проекту. Ідентифікаційний номер:{{$designer->id}}</h2>
</div>
<hr/>
<div class="container">

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
        <div class="form-group {{ $errors->has('project_name')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="Назва проект">Назва проект:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user">
                        </i>
                    </div>
                    <input type="text" value="{{ $designer->project_name }}" name="project_name" class="form-control" id="text">
                    @if($errors->has('project_name'))
                    <span class="control-label"> {{ $errors->first('project_name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2  control-label" for="project_manager">Керівник проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user">
                        </i>
                    </div>
                    <textarea rows="4" type="text" name="project_manager" class="form-control" id="text" placeholder="Введіть дані про керівника проекту. Наприклад: Шевченко А.Р., нач. РННВЦ «Фірма».">{{ $designer->project_manager }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="Contacts">Контактні дані:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-book ">
                        </i>
                    </div>
                    <textarea rows="4" type="text" name="project_contacts" class="form-control" id="text">{{ $designer->investor_contacts }}</textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="phone">Телефон:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone">
                        </i>
                    </div>
                    <input type="text" value="{{ $designer->phone }}" name="phone" class="form-control" id="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="email">Контактна ел. пошта:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope">
                        </i>
                    </div>
                    <input type="email" value="{{ $designer->email }}" name="email" class="form-control" id="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2 control-label" for="web_site">Веб-сайт:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-wifi">
                        </i>
                    </div>
                    <input type="text" value="{{ $designer->web_site }}" name="web_site" class="form-control" id="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2  control-label" for="project_goal">Мета проекту:</label>
            <div class="col-md-10">

                <textarea rows="4" type="text" name="project_goal" class="form-control" id="text">{{ $designer->project_goal }}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="project_aspects">Іноваційні аспекти та переваги проекту:</label>
            <div class="col-md-10">


                <textarea rows="4" type="text" name="project_aspects" class="form-control" id="text">{{ $designer->project_aspects }}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="project_beneficaries">Отримувачі вигоди:</label>
            <div class="col-md-10">

                <textarea rows="4" type="text" name="project_beneficaries" class="form-control" id="text">{{ $designer->project_beneficaries }}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2  control-label" for="description">Стислий опис проекту:</label>
            <div class="col-md-10">


                <textarea rows="4" type="text" name="description" class="form-control" id="text">{{ $designer->description }}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="project_cost">Вартість проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-usd">
                        </i>
                    </div>
                    <input type="number" value="{{ $designer->project_cost }}" name="project_cost" class="form-control" id="text">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="project_duration">Період реалізації проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar-o">
                        </i>
                    </div>
                    <input type="text" value="{{ $designer->project_duration }}" name="project_duration" class="form-control" id="text">
                </div>
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-2 control-label" for="region">Географія проекту::</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-crosshairs">
                        </i>
                    </div>
                    <input type="text" value="{{ $designer->region }}" name="region" class="form-control" id="text">
                </div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 control-label" for="project_stage">Етап проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-flag">
                        </i>
                    </div>
                    <input type="text" value="{{ $designer->project_stage }}" name="project_stage" class="form-control" id="text">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label class="col-md-2 control-label" for="Галузь">Галузь:</label>
            <div class="col-md-10">
                <select class="form-control" name="economic_activities_id">
                    @foreach($economicActivities as $i => $item)
                    <option value="{{ $i }}" {{ ( $designer->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="form-group">
            <label class="col-md-2 control-label" for="email">Джерела фінансування:</label>
            <div class="col-md-10">

                <input type="text" value="{{ $designer->available_funding }}" name="available_funding" class="form-control" id="text">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 control-label" for="email">Інше:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-info">
                        </i>
                    </div>
                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $designer->other }}</textarea>
                </div>
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
        <input value="Зберегти" type="submit" class="btn btn-success col-md-offset-2">

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
            'showUpload'          : false,
            'previewFileType'     : 'image',
            'allowedFileTypes'    : ['image'],
            'initialPreview'      : [
               @if(!empty($designer->logo)) '{{url('/designer/image/'.$designer->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
        });
    </script>
@stop
