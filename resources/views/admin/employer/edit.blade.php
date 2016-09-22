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
             <a href="{{ route('employer.show',['employer'=>$employer->id]) }}" class="btn-primary btn">Продивитись</a>
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
                <div class="form-group {{ $errors->has('publisher_id')?'has-error':'' }}">
                    <label class="control-label" for="publisher_id">Редактор</label>
                    <select id="country_id" class="form-control" name="publisher_id">
                        @foreach(\App\User::all() as $user)
                        <option value="{{ $user->id }}" {{ ( $employer->publisher_id == $user->id ? "selected":"") }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('publisher_id'))
                    <span class="control-label"> {{ $errors->first('publisher_id') }}</span>
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
                <div class="form-group {{ $errors->has('org_name')?'has-error':'' }}">
                    <label class="control-label" for="org_name">Назва організації:</label>
                    <input type="text" value="{{ $employer->org_name }}" name="org_name" class="form-control" id="text">
                    @if($errors->has('org_name'))
                    <span class="control-label"> {{ $errors->first('org_name') }}</span>
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
                <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                    <label class="control-label" for="email">Контактна ел. пошта:</label>
                    <input type="email" value="{{ $employer->email }}" name="email" class="form-control" id="text">
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


                    <input type="text" value="{{ $employer->web_site }}" name="web_site" class="form-control" id="text">

                    @if($errors->has('web_site'))
                    <span class="control-label"> {{ $errors->first('web_site') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('org_info')?'has-error':'' }}">
                    <label class="control-label" for="org_info">Коротка характеристика діяльності організації:</label>
                    <textarea rows="4" type="text" name="org_info" class="form-control" id="text">{{ $employer->org_info }}</textarea>
                    @if($errors->has('org_info'))
                    <span class="control-label"> {{ $errors->first('org_info') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="description">Загальна інформація (звернення організації):</label>
                    <textarea rows="6" type="text" name="description" class="form-control" id="text" placeholder="Укажіть точні назви відкритих вакансій у вигляді списку">{{ $employer->description }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
                    <label class="control-label" for="short_name">Короткий перелік вакансій:</label>


                    <input type="text" value="{{ $employer->short_name }}" name="short_name" class="form-control" id="text">
                    @if($errors->has('short_name'))
                    <span class="control-label"> {{ $errors->first('short_name') }}</span>
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
                        <option value="{{ $i }}" {{ ( $employer->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('org_type')?'has-error':'' }}">
                    <label class="control-label" for="org_type">Тип організації:</label>
                    <input type="text" value="{{ $employer->org_type }}" name="org_type" class="form-control" id="text">
                    @if($errors->has('org_type'))
                    <span class="control-label"> {{ $errors->first('org_type') }}</span>
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
