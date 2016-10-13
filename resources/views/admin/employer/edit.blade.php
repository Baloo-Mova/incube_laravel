@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оноволення вакансій. Ідентифікаційний номер:{{$employer->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <div class="col-md-offset-2">
        <div class="col-md-10 text-center">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
             <a href="{{ route('project_viewer.show',['material'=>$employer->id]) }}" class="btn-primary btn">Продивитись</a>
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
                        <option value="{{ $user->id }}" {{ ( $employer->author_id == $user->id ? "selected":"") }}>{{ $user->name }}</option>
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
                        <option value="{{ $status->id }}" {{ $employer->status_id == $status->id ? "selected" : "" }}>{{ $status->name }}</option>
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
                    <label class="control-label" for="name">Назва / короткий перелік вакансій:</label>


                    <input type="text" value="{{ $employer->name }}" name="name" class="form-control" id="text">
                    @if($errors->has('name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('company_name')?'has-error':'' }}">
                    <label class="control-label" for="company_name">Назва організації:</label>
                    <input type="text" value="{{ $employer->company_name }}" name="company_name" class="form-control" id="text">
                    @if($errors->has('company_name'))
                    <span class="control-label"> {{ $errors->first('company_name') }}</span>
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
                    'economicActivitiesAttributeValueNow' => $employer->economic_activities_id
                    ])
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                    <label class="control-label" for="region">Країна проблеми</label>
                    <select id="country_id" class="form-control" name="country_id">
                        @foreach(\App\Models\Country::all() as $country)
                        <option value="{{ $country->id }}" {{ $employer->country_id == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
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
                <div class="form-group {{ $errors->has('company_info')?'has-error':'' }}">
                    <label class="control-label" for="company_info">Коротка характеристика діяльності організації:</label>
                    <textarea rows="4" type="text" name="company_info" class="form-control" id="text">{{ $employer->company_info }}</textarea>
                    @if($errors->has('company_info'))
                    <span class="control-label"> {{ $errors->first('company_info') }}</span>
                    @endif
                </div>
            </div>
        </div>
       
        
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="description">Вакансії (звернення організації):</label>
                    <textarea rows="6" type="text" name="description" class="form-control" id="text" placeholder="Укажіть точні назви відкритих вакансій у вигляді списку">{{ $employer->description }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('requirements')?'has-error':'' }}">
                    <label class="control-label" for="requirements">Вимоги:</label>
                    <textarea rows="6" type="text" name="requirements" class="form-control" id="text">{{ $employer->requirements }}</textarea>
                    @if($errors->has('requirements'))
                    <span class="control-label"> {{ $errors->first('requirements') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('working_conditions')?'has-error':'' }}">
                    <label class="control-label" for="working_conditions">Умови праці:</label>
                    <textarea rows="6" type="text" name="working_conditions" class="form-control" id="text">{{ $employer->working_conditions }}</textarea>
                    @if($errors->has('working_conditions'))
                    <span class="control-label"> {{ $errors->first('working_conditions') }}</span>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('adress')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Адресса:</label>

                    <textarea rows="2" type="text" name="adress" class="form-control" id="text">{{ $employer->adress }}</textarea>

                    @if($errors->has('adress'))
                    <span class="control-label"> {{ $errors->first('adress') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">
                    <label class="control-label" for="phone">Телефон:</label>
                    <input type="text" value="{{ $employer->phone }}" name="phone" class="form-control" id="text">
                    @if($errors->has('phone'))
                    <span class="control-label"> {{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
        </div>

        
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('site')?'has-error':'' }}">
                    <label class="control-label" for="site">Веб-сайт:</label>


                    <input type="text" value="{{ $employer->site }}" name="site" class="form-control" id="text">

                    @if($errors->has('site'))
                    <span class="control-label"> {{ $errors->first('site') }}</span>
                    @endif
                </div>
            </div>
        </div>
 
        

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
                    <label class="control-label" for="other">Інше:</label>

                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $employer->other }}</textarea>

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
    $("#file_up").fileinput({
    'showUpload'          : false,
            'previewFileType'     : 'image',
            'allowedFileTypes'    : ['image'],
            'initialPreview'      : [
                    @if (!empty($employer->logo)) '{{url('/employer/image/'.$employer->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
    });</script>
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
