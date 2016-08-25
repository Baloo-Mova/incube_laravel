@extends('frontend.layouts.template')

@section('content')
    <div class="page-title text-center">
        <h2>Подача питання(проблеми)</h2>
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
                    <label class="col-md-3 control-label" for="ел пошта">Email:</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-envelope-o">
                                </i>
                            </div>
                            <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="text">
                        </div>
                    </div>
                </div>
            @endif

            <div class="form-group">
                <label class="col-md-3 control-label" for="Назва питання">Назва питання(проблеми):</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user">
                            </i>
                        </div>
                        <input type="text" value="{{ old('problem_name') }}" name="problem_name" class="form-control" id="text">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3  control-label" for="discription">Опис питання(проблеми):</label>
                <div class="col-md-9">
                    
                        <textarea rows="6" type="text" name="problem_description" class="form-control" id="text">{{ old('problem_description') }}</textarea>
                   
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="Галузь">Галузь:</label>
                <div class="col-md-9">
                    <select class="form-control" name="economic_activities_id">
                        @foreach($economicActivities as $i => $item)
                            <option value="{{ $i }}" {{ ( old("economic_activities_id") == $i ? "selected":"") }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label" for="region">Регіон:</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-crosshairs">
                            </i>
                        </div>
                        <input type="text" value="{{ old('region') }}" name="region" class="form-control" id="text">
                    </div>
                </div>
            </div>
                        
            <div class="form-group">
                <label class="col-md-3 control-label" for="email">Інше:</label>
                <div class="col-md-9">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-info">
                            </i>
                        </div>
                        <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ old('other') }}</textarea>
                    </div>
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


            <input value="Подати" type="submit" class="btn btn-success col-md-offset-3">

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
            'showUpload'      : false,
            'previewFileType' : 'any',
            'allowedFileTypes': ['image']

        });
    </script>
@stop
