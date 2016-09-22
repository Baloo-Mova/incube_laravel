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
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="Реєєстраційна пошта">Ел. пошта для реєстрації:</label>
                    <input type="email" value="{{ old('reg_email') }}" name="reg_email" class="form-control" id="text">
                </div>
            </div>
        </div>
        @endif

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label class="control-label" for="name">Назва проекту:</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="text">

                    @if($errors->has('name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('idea')?'has-error':'' }}">
                    <label class="control-label" for="idea">Мета проекту:</label>
                    <textarea rows="4" type="text" name="idea" class="form-control" id="text">{{ old('idea') }}</textarea>
                    @if($errors->has('idea'))
                    <span class="control-label"> {{ $errors->first('idea') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('current_situation')?'has-error':'' }}">
                    <label class="control-label" for="current_situation">Дійсна ситуація:</label>
                    <textarea rows="4" type="text" name="current_situation" class="form-control" id="text">{{ old('current_situation') }}</textarea>
                    <span class="control-label">Введіть дані про готовність проекту.</span>
                    @if($errors->has('current_situation'))
                    <span class="control-label"> {{ $errors->first('current_situation') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('stage_id')?'has-error':'' }}">
                    <label class="control-label" for="stage_id">Етап проекту <span class="form-required">*</span></label>
                    <select id="stage_id" class="form-control" name="stage_id">
                        @if(old('stage_id')==null)
                        <option disabled selected> Виберіть етап проекту</option>
                        @endif
                        @foreach(\App\Models\Stage::all() as $item)
                        <option value="{{$item->id}}" {{ ( old('stage_id') == $item->id ? "selected":"") }}> {{ $item->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('stage_id'))
                    <span class="control-label"> {{ $errors->first('stage_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="Галузь">Галузь <span class="form-required">*</span></label>
                    @include('admin.partials.economic_activities_select',
                    ['economicActivities'=> $economicActivities,
                    'economicActivitiesAttributeName'=>'economic_activities_id',
                    'economicActivitiesAttributeValueNow' => old('economic_activities_id')
                    ])
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                    <label class="control-label" for="region">Країна інвестування <span class="form-required">*</span></label>
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
                <div class="form-group {{ $errors->has('city_id')?'has-error':'' }}">
                    <label class="control-label" for="region">Регіон інвестування</label>
                    <select id="city_id" class="form-control" name="city_id">

                    </select>
                    @if($errors->has('city_id'))
                    <span class="control-label"> {{ $errors->first('city_id') }}</span>
                    @endif
                </div>
            </div>
        </div>  

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="description">Стислий опис проекту:</label>
                    <textarea rows="4" type="text" name="description" class="form-control" id="text">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('money')?'has-error':'' }}">
                    <label class="control-label" for="money">Вартість проекту ($)<span class="form-required">*</span></label>
                    <input type="number" value="{{ old('money') }}" name="money" class="form-control" id="money">
                    @if($errors->has('money'))
                    <span class="control-label"> {{ $errors->first('money') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('problem')?'has-error':'' }}">
                    <label class="control-label" for="problem">Проблема чи можливість:</label>
                    <textarea rows="4" type="text" name="problem" class="form-control" id="text">{{ old('problem') }}</textarea>
                    @if($errors->has('problem'))
                    <span class="control-label"> {{ $errors->first('problem') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('solution')?'has-error':'' }}">
                    <label class="control-label" for="solution">Рішення(продукт чи послуга):</label>
                    <textarea rows="4" type="text" name="solution" class="form-control" id="text">{{ old('solution') }}</textarea>
                    @if($errors->has('solution'))
                    <span class="control-label"> {{ $errors->first('solution') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('competition')?'has-error':'' }}">
                    <label class="control-label" for="competition">Конкуренція:</label>
                    <textarea rows="4" type="text" name="competition" class="form-control" id="text">{{ old('competition') }}</textarea>
                    @if($errors->has('competition'))
                    <span class="control-label"> {{ $errors->first('competition') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('benefits')?'has-error':'' }}">
                    <label class="control-label" for="benefits">Іноваційні аспекти та переваги проекту:</label>
                    <textarea rows="4" type="text" name="benefits" class="form-control" id="text">{{ old('benefits') }}</textarea>
                    @if($errors->has('benefits'))
                    <span class="control-label"> {{ $errors->first('benefits') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('buisness_model')?'has-error':'' }}">
                    <label class="control-label" for="buisness_model">Фінансова частина / Бізнес-модель:</label>
                    <textarea rows="4" type="text" name="buisness_model" class="form-control" id="text">{{ old('buisness_model') }}</textarea>
                    @if($errors->has('buisness_model'))
                    <span class="control-label"> {{ $errors->first('buisness_model') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('money_target')?'has-error':'' }}">
                    <label class="control-label" for="money_target">Цільове призначення інвестицій:</label>
                    <textarea rows="4" type="text" name="money_target" class="form-control" id="text">{{ old('money_target') }}</textarea>
                    @if($errors->has('money_target'))
                    <span class="control-label"> {{ $errors->first('money_target') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('investor_interest')?'has-error':'' }}">
                    <label class="control-label" for="investor_interest">Пропозиції інвестору:</label>
                    <textarea rows="4" type="text" name="investor_interest" class="form-control" id="text">{{ old('investor_interest') }}</textarea>
                    @if($errors->has('investor_interest'))
                    <span class="control-label"> {{ $errors->first('investor_interest') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('risks')?'has-error':'' }}">
                    <label class="control-label" for="risks">Опис ризиків:</label>
                    <textarea rows="4" type="text" name="risks" class="form-control" id="text">{{ old('risks') }}</textarea>
                    @if($errors->has('risks'))
                    <span class="control-label"> {{ $errors->first('risks') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('contacts')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Контактні дані:</label>
                    <textarea rows="4" type="text" name="contacts" class="form-control" id="text">{{ old('contacts') }}</textarea>

                    @if($errors->has('contacts'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('site')?'has-error':'' }}">
                    <label class="control-label" for="site">Веб-сайт:</label>
                    <input type="text" value="{{ old('site') }}" name="site" class="form-control" id="text">
                    @if($errors->has('site'))
                    <span class="control-label"> {{ $errors->first('site') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('youtube_link')?'has-error':'' }}">
                    <label class="control-label" for="youtube_link">YouTube посилання:</label>
                    <input type="text" value="{{ old('youtube_link') }}" name="youtube_link" class="form-control" id="text">
                    @if($errors->has('youtube_link'))
                    <span class="control-label"> {{ $errors->first('youtube_link') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
                    <label class="control-label" for="other">Інше:</label>

                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ old('other') }}</textarea>

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
                    <input type="file" name="logo_img_file" class="form-control" id="file_up">
                </div>
            </div>

        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="email">Інші файли:</label>

                    <input type="file" name="project_files" class="form-control" id="file_up">
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
    $('#country_id').on('change', function () {
        var id = $(this).val();

        $.ajax({
            url: "{{ url('/get/cities/') }}/" + id,
            success: function (data) {
                var select = $('#city_id');
                select.find('option').remove();
                select.append('<option selected value="0">Усi</option>');
                $.each(data, function (i, item) {
                    select.append('<option value="' + i + '"> ' + item + ' </option>');
                });
            },
            dataType: "json"
        });
    });
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
