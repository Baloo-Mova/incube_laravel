@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оновлення заявки питання(проблеми). Ідентифікаційний номер:{{$customer->id}}</h2>
</div>
<hr/>
<div class="container">

    @if(Session::has('message'))
    <div class="col-md-offset-2">
        <div class="c col-md-10 text-center">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            <a href="{{ route('customer.show',['problem'=>$customer->id]) }}" class="btn-primary btn">Продивитись</a>
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
                <div class="form-group {{ $errors->has('problem_name')?'has-error':'' }}">
                    <label class="control-label" for="Назва питання">Назва питання(проблеми):</label>


                    <input type="text" value="{{ $customer->problem_name }}" name="problem_name" class="form-control" id="text">
                    @if($errors->has('problem_name'))
                    <span class="control-label"> {{ $errors->first('problem_name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
                    <label class="control-label" for="short_name">Коротка Назва питання(проблеми):</label>


                    <input type="text" value="{{ $customer->short_name }}" name="short_name" class="form-control" id="text">
                    @if($errors->has('short_name'))
                    <span class="control-label"> {{ $errors->first('short_name') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('problem_description')?'has-error':'' }}">
                    <label class="control-label" for="discription">Опис питання(проблеми):</label>
                    <textarea rows="6" type="text" name="problem_description" class="form-control" id="text">{{ $customer->problem_description }}</textarea>
                    @if($errors->has('problem_description'))
                    <span class="control-label"> {{ $errors->first('problem_description') }}</span>
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
                        <option value="{{ $i }}" {{ ( $customer->economic_activities_id == $i ? "selected":"") }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
                    <label class="control-label" for="region">Регіон:</label>
                    <input type="text" value="{{ $customer->region }}" name="region" class="form-control" id="text">
                    @if($errors->has('region'))
                    <span class="control-label"> {{ $errors->first('region') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
                    <label class="control-label" for="email">Інше:</label>
                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ $customer->other }}</textarea>

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
                    @if (!empty($customer->logo)) '{{url('/customer/image/'.$customer->logo)}}' @endif,
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
