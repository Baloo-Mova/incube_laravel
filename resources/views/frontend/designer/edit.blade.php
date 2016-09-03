@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оноволення проекту. Ідентифікаційний номер:{{$designer->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <div class="col-md-offset-2">
        <div class="col-md-10">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
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
                <div class="form-group {{ $errors->has('project_name')?'has-error':'' }}">
                    <label class="control-label" for="project_name">Назва проекту:</label>
                    <input type="text" value="{{ $designer->project_name }}" name="project_name" class="form-control" id="text">

                    @if($errors->has('project_name'))
                    <span class="control-label"> {{ $errors->first('project_name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
                    <label class="control-label" for="short_name">Коротка Назва проекту:</label>
                    <input type="text" value="{{ $designer->short_name }}" name="short_name" class="form-control" id="text">
                    @if($errors->has('short_name'))
                    <span class="control-label"> {{ $errors->first('short_name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_manager')?'has-error':'' }}">
                    <label class="control-label" for="project_manager">Керівник проекту:</label>
                    <textarea rows="4" type="text" name="project_manager" class="form-control" id="text" placeholder="Введіть дані про керівника проекту. Наприклад: Шевченко А.Р., нач. РННВЦ «Фірма».">{{ $designer->project_manager }}</textarea>
                    <span class="control-label">Введіть дані про керівника проекту. Наприклад: Шевченко А.Р., нач. РННВЦ «Фірма».</span>
                    @if($errors->has('project_manager'))
                    <span class="control-label"> {{ $errors->first('project_manager') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_contacts')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Контактні дані:</label>
                    <textarea rows="4" type="text" name="project_contacts" class="form-control" id="text">{{ $designer->project_contacts }}</textarea>

                    @if($errors->has('project_contacts'))
                    <span class="control-label"> {{ $errors->first('project_contacts') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                    <label class="control-label" for="phone">Телефон:</label>
                    <input type="text" value="{{ $designer->phone }}" name="phone" class="form-control" id="text">

                    @if($errors->has('phone'))
                    <span class="control-label"> {{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">   
                <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                    <label class="control-label" for="email">Контактна ел. пошта:</label>


                    <input type="email" value="{{ $designer->email }}" name="email" class="form-control" id="text">

                    @if($errors->has('email'))
                    <span class="control-label"> {{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('web_site')?'has-error':'' }}">
                    <label class="control-label" for="web_site">Веб-сайт:</label>

                    <input type="text" value="{{ $designer->web_site }}" name="web_site" class="form-control" id="text">

                    @if($errors->has('web_site'))
                    <span class="control-label"> {{ $errors->first('web_site') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_goal')?'has-error':'' }}">
                    <label class="control-label" for="project_goal">Мета проекту:</label>
                    <textarea rows="4" type="text" name="project_goal" class="form-control" id="text">{{ $designer->project_goal }}</textarea>
                    @if($errors->has('project_goal'))
                    <span class="control-label"> {{ $errors->first('project_goal') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_aspects')?'has-error':'' }}">
                    <label class="control-label" for="project_aspects">Іноваційні аспекти та переваги проекту:</label>
                    <textarea rows="4" type="text" name="project_aspects" class="form-control" id="text">{{ $designer->project_aspects }}</textarea>
                    @if($errors->has('project_aspects'))
                    <span class="control-label"> {{ $errors->first('project_aspects') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_beneficaries')?'has-error':'' }}">
                    <label class="control-label" for="project_beneficaries">Отримувачі вигоди:</label>
                    <textarea rows="4" type="text" name="project_beneficaries" class="form-control" id="text">{{ $designer->project_beneficaries }}</textarea>
                    @if($errors->has('project_beneficaries'))
                    <span class="control-label"> {{ $errors->first('project_beneficaries') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="description">Стислий опис проекту:</label>
                    <textarea rows="4" type="text" name="description" class="form-control" id="text">{{ $designer->description }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_cost')?'has-error':'' }}">
                    <label class="control-label" for="project_cost">Вартість проекту:</label>

                    <input type="number" value="{{ $designer->project_cost }}" name="project_cost" class="form-control" id="text">

                    @if($errors->has('project_cost'))
                    <span class="control-label"> {{ $errors->first('project_cost') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_duration')?'has-error':'' }}">
                    <label class="control-label" for="project_duration">Період реалізації проекту:</label>

                    <input type="text" value="{{ $designer->project_duration }}" name="project_duration" class="form-control" id="text">

                    @if($errors->has('project_duration'))
                    <span class="control-label"> {{ $errors->first('project_duration') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
                    <label class="control-label" for="region">Географія проекту:</label>

                    <input type="text" value="{{ $designer->region }}" name="region" class="form-control" id="text">

                    @if($errors->has('region'))
                    <span class="control-label"> {{ $errors->first('region') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('project_stage')?'has-error':'' }}">
                    <label class="control-label" for="project_stage">Етап проекту:</label>

                    <input type="text" value="{{ $designer->project_stage }}" name="project_stage" class="form-control" id="text">

                    @if($errors->has('project_stage'))
                    <span class="control-label"> {{ $errors->first('project_stage') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="Галузь">Галузь:</label>

                    <select class="form-control" name="economic_activities_id">
                        @foreach($economicActivities as $i => $item)
                        <option value="{{ $i }}" {{ ( $designer->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('available_funding')?'has-error':'' }}">
                    <label class="control-label" for="email">Джерела фінансування:</label>
                    <input type="text" value="{{ $designer->available_funding }}" name="available_funding" class="form-control" id="text">
                    @if($errors->has('available_funding'))
                    <span class="control-label"> {{ $errors->first('available_funding') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
                    <label class="control-label" for="other">Інше:</label>

                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $designer->other }}</textarea>

                    @if($errors->has('other'))
                    <span class="control-label"> {{ $errors->first('other') }}</span>
                    @endif
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
                    <label class="control-label" for="email">Інші файли:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-upload">
                            </i>
                        </div>
                        <input type="file" name="project_files" class="form-control" id="file_up">
                    </div>
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
                    @if (!empty($designer->logo)) '{{url('/designer/image/'.$designer->logo)}}' @endif,
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
