@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оновлення заявки питання(проблеми). Ідентифікаційний номер:{{$customer->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <p class="alert alert-info col-md-offset-3 col-md-9">{{ Session::get('message') }}</p>
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
        <div class="form-group {{ $errors->has('problem_name')?'has-error':'' }}">
            <label class="col-md-3 control-label" for="Назва питання">Назва питання(проблеми):</label>
            <div class="col-md-9">

                <input type="text" value="{{ $customer->problem_name }}" name="problem_name" class="form-control" id="text">
                @if($errors->has('problem_name'))
                <span class="control-label"> {{ $errors->first('problem_name') }}</span>
                @endif
            </div>
        </div>
        
        <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
            <label class="col-md-3 control-label" for="short_name">Коротка Назва питання(проблеми):</label>
            <div class="col-md-9">

                <input type="text" value="{{ $customer->short_name }}" name="short_name" class="form-control" id="text">
                @if($errors->has('short_name'))
                <span class="control-label"> {{ $errors->first('short_name') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('problem_description')?'has-error':'' }}">
            <label class="col-md-3  control-label" for="discription">Опис питання(проблеми):</label>
            <div class="col-md-9">

                <textarea rows="6" type="text" name="problem_description" class="form-control" id="text">{{ $customer->problem_description') }}</textarea>
                @if($errors->has('problem_description'))
                <span class="control-label"> {{ $errors->first('problem_description }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="Галузь">Галузь:</label>
            <div class="col-md-9">
                <select class="form-control" name="economic_activities_id">
                    @foreach($economicActivities as $i => $item)
                    <option value="{{ $i }}" {{ ( $customer->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
            <label class="col-md-3 control-label" for="region">Регіон:</label>
            <div class="col-md-9">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-crosshairs">
                        </i>
                    </div>
                    <input type="text" value="{{ $customer->region }}" name="region" class="form-control" id="text">
                </div>
                @if($errors->has('region'))
                <span class="control-label"> {{ $errors->first('region') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
            <label class="col-md-3 control-label" for="email">Інше:</label>
            <div class="col-md-9">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-info">
                        </i>
                    </div>
                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $customer->other }}</textarea>
                </div>
                @if($errors->has('other'))
                <span class="control-label"> {{ $errors->first('other') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" for="email">Логотип:</label>
            <div class="col-md-9">
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
                    @if (!empty($customer->logo)) '{{url('/customer/image/'.$customer->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
    });    </script>
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
