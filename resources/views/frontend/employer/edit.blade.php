@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оноволення вакансій. Ідентифікаційний номер:{{$employer->id}}</h2>
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
        <div class="form-group {{ $errors->has('org_name')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="org_name">Назва організації:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user">
                        </i>
                    </div>
                    <input type="text" value="{{ $employer->org_name }}" name="org_name" class="form-control" id="text">
                    @if($errors->has('org_name'))
                    <span class="control-label"> {{ $errors->first('org_name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2  control-label" for="Contacts">Адресса:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-book ">
                        </i>
                    </div>
                    <textarea rows="2" type="text" name="adress" class="form-control" id="text">{{ $employer->adress }}</textarea>
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
                    <input type="text" value="{{ $employer->phone }}" name="phone" class="form-control" id="text">
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
                    <input type="email" value="{{ $employer->email }}" name="email" class="form-control" id="text">
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
                    <input type="text" value="{{ $employer->web_site }}" name="web_site" class="form-control" id="text">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2  control-label" for="org_info">Коротка характеристика діяльності організації:</label>
            <div class="col-md-10">

                <textarea rows="4" type="text" name="org_info" class="form-control" id="text">{{ $employer->org_info }}</textarea>

            </div>
        </div>

        <div class="form-group">
            <label class="col-md-2  control-label" for="description">Загальна інформація (звернення організації):</label>
            <div class="col-md-10">


                <textarea rows="6" type="text" name="description" class="form-control" id="text" placeholder="Укажіть точні назви відкритих вакансій у вигляді списку">{{ $employer->description }}</textarea>

            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label" for="short_name">Короткий перелік вакансій:</label>
            <div class="col-md-10">

                <input type="text" value="{{ $employer->short_name }}" name="short_name" class="form-control" id="text">

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-2 control-label" for="Галузь">Галузь:</label>
            <div class="col-md-10">
                <select class="form-control" name="economic_activities_id">
                    @foreach($economicActivities as $i => $item)
                    <option value="{{ $i }}" {{ ( $employer->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="form-group">
        
            <label class="col-md-2 control-label" for="email">Тип організації:</label>
            <div class="col-md-10">

                <input type="text" value="{{ $employer->org_type }}" name="org_type" class="form-control" id="text">

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
                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $employer->other }}</textarea>
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
               @if(!empty($employer->logo)) '{{url('/employer/image/'.$employer->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
        });
    </script>
@stop
