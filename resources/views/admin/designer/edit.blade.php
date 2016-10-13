@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оноволення проекту. Ідентифікаційний номер:{{$designer->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <div class="col-md-offset-2">
        <div class="c col-md-10 text-center">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            <a href="{{ route('project_viewer.show',['material'=>$designer->id]) }}" class="btn-primary btn">Продивитись</a>
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
                <div class="form-group {{ $errors->has('author_id')?'has-error':'' }}">
                    <label class="control-label" for="author_id">Автор</label>
                    <select id="country_id" class="form-control" name="author_id">
                        @foreach(\App\User::all() as $user)
                        <option value="{{ $user->id }}" {{ ( $designer->author_id == $user->id ? "selected":"") }}>{{ $user->name }}</option>
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
                        <option value="{{ $status->id }}" {{ $designer->status_id == $status->id ? "selected" : "" }}>{{ $status->name }}</option>
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
                    <label class="control-label" for="name">Назва проекту:</label>
                    <input type="text" value="{{ $designer->name }}" name="name" class="form-control" id="text">

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
                    <textarea rows="4" type="text" name="idea" class="form-control" id="text">{{ $designer->idea }}</textarea>
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
                    <textarea rows="4" type="text" name="current_situation" class="form-control" id="text">{{ $designer->current_situation }}</textarea>
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
                        @if($designer->stage_id==null)
                        <option disabled selected> Виберіть етап проекту</option>
                        @endif
                        @foreach(\App\Models\Stage::all() as $item)
                        <option value="{{$item->id}}" {{ ( $designer->stage_id == $item->id ? "selected":"") }}> {{ $item->name }}</option>
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
                    <label class="control-label" for="Галузь">Галузь:</label>
                    @include('admin.partials.economic_activities_select',
                    ['economicActivities'=> $economicActivities,
                    'economicActivitiesAttributeName'=>'economic_activities_id',
                    'economicActivitiesAttributeValueNow' => $designer->economic_activities_id
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                    <label class="control-label" for="region">Країна</label>
                    <select id="country_id" class="form-control" name="country_id">
                        @foreach(\App\Models\Country::all() as $country)
                        <option value="{{ $country->id }}" {{ $designer->country_id == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
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
                    <label class="control-label" for="region">Регіон</label>
                    <select id="city_id" class="form-control" name="city_id">
                        <option value="0"> Усi</option>
                        @foreach(\App\Models\City::where(['country_id'=>$designer->country_id])->get() as $city)
                        <option value="{{ $city->id }}" {{ $designer->city_id == $city->id ? "selected" : "" }}>{{ $city->name }}</option>
                        @endforeach
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
                    <textarea rows="4" type="text" name="description" class="form-control" id="text">{{ $designer->description }}</textarea>
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
                    <input type="number" value="{{ $designer->money }}" name="money" class="form-control" id="money">
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
                    <textarea rows="4" type="text" name="problem" class="form-control" id="text">{{ $designer->problem }}</textarea>
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
                    <textarea rows="4" type="text" name="solution" class="form-control" id="text">{{ $designer->solution }}</textarea>
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
                    <textarea rows="4" type="text" name="competition" class="form-control" id="text">{{ $designer->competition }}</textarea>
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
                    <textarea rows="4" type="text" name="benefits" class="form-control" id="text">{{ $designer->benefits }}</textarea>
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
                    <textarea rows="4" type="text" name="buisness_model" class="form-control" id="text">{{ $designer->buisness_model }}</textarea>
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
                    <textarea rows="4" type="text" name="money_target" class="form-control" id="text">{{ $designer->money_target }}</textarea>
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
                    <textarea rows="4" type="text" name="investor_interest" class="form-control" id="text">{{ $designer->investor_interest }}</textarea>
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
                    <textarea rows="4" type="text" name="risks" class="form-control" id="text">{{ $designer->risks }}</textarea>
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
                    <textarea rows="4" type="text" name="contacts" class="form-control" id="text">{{ $designer->contacts }}</textarea>

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
                    <input type="text" value="{{ $designer->site }}" name="site" class="form-control" id="text">
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
                    <input type="text" value="{{ $designer->youtube_link }}" name="youtube_link" class="form-control" id="text">
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
                        <input type="file" name="logo_file" class="form-control" id="logo">
                    </div>
                </div>
            </div>

            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group">
                        <label class="control-label" for="email">Інші файли:</label>
                        <input type="file" name="project_files[]" multiple class="form-control" id="documents">
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
    $('#country_id').on('change', function () {
    var id = $(this).val();
            $.ajax({
            url     : "{{ url('/get/cities/') }}/" + id,
                    success : function (data) {
                    var select = $('#city_id');
                            select.find('option').remove();
                            select.append('<option selected disabled>Виберіть регіон</option>');
                            $.each(data, function (i, item) {
                            select.append('<option value="' + i + '"> ' + item + ' </option>');
                            });
                    },
                    dataType: "json"
            });
    });
   $("#logo").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            'allowedFileTypes': ['image'],
            'multiple': false,
            initialPreview: [
                "{{route('images.show',['id'=>$designer->logo,'width'=>'max','height'=>'max'])}}"
            ],
            initialPreviewAsData: true,
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {upload} {zoom} {other}' +
                '    </div>\n' +
                '    {drag}\n' +
                '    <div class="clearfix"></div>\n' +
                '</div>',
            }
        });
        $("#documents").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            initialPreview: [
                @foreach($designer->documents as $i=>$file)
                        "{{route('images.show',['id'=>$file->name,'width'=>'max','height'=>'max'])}}",
                @endforeach
            ],
            initialPreviewAsData: true,
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {upload} {zoom} {other}' +
                '    </div>\n' +
                '    {drag}\n' +
                '    <div class="clearfix"></div>\n' +
                '</div>',
            }

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
