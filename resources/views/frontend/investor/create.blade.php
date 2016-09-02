@extends('frontend.layouts.template')

@section('content')
    <div class="page-title text-center">
        <h2>ПОДАЧА ЗАЯВКИ НА ІНВЕСТУВАННЯ</h2>
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
                    <label class="col-md-2 control-label" for="Назва інвестування">Email:</label>
                    <div class="col-md-10">
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

            <div class="form-group {{ $errors->has('investor_name')?'has-error':'' }}">
                <label class="col-md-2 control-label" for="Назва інвестування">Назва інвестування:</label>
                <div class="col-md-10">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-user">
                            </i>
                        </div>
                        <input type="text" value="{{ old('investor_name') }}" name="investor_name" class="form-control" id="text">
                    </div>
                    @if($errors->has('investor_name'))
                        <span class="control-label"> {{ $errors->first('investor_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group {{ $errors->has('short_name')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="short_name">Коротка Назва інвестування:</label>
            <div class="col-md-10">

                <input type="text" value="{{ old('short_name') }}" name="short_name" class="form-control" id="text">
                @if($errors->has('short_name'))
                <span class="control-label"> {{ $errors->first('short_name') }}</span>
                @endif
            </div>
            </div>
            <div class="form-group {{ $errors->has('investor_contacts')?'has-error':'' }}">
            <label class="col-md-2  control-label" for="Contacts">Контактні дані:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-book ">
                        </i>
                    </div>
                    <textarea rows="6" type="text" name="investor_contacts" class="form-control" id="text">{{ old('investor_contacts') }}</textarea>
                </div>
                @if($errors->has('investor_contacts'))
                <span class="control-label"> {{ $errors->first('investor_contacts') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('stage_project')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Етап проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-flag">
                        </i>
                    </div>
                    <input type="text" value="{{ old('stage_project') }}" name="stage_project" class="form-control" id="text">
                </div>
                 @if($errors->has('stage_project'))
                <span class="control-label"> {{ $errors->first('stage_project') }}</span>
                @endif
            </div>
        </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="Галузь">Галузь:</label>
                <div class="col-md-10">
                    <select class="form-control" name="economic_activities_id">
                        @foreach($economicActivities as $i => $item)
                            <option value="{{ $i }}" {{ ( old("economic_activities_id") == $i ? "selected":"") }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <div class="form-group {{ $errors->has('region')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="region">Регіон інвестування:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-crosshairs">
                        </i>
                    </div>
                    <input type="text" value="{{ old('region') }}" name="region" class="form-control" id="text">
                </div>
                 @if($errors->has('region'))
                <span class="control-label"> {{ $errors->first('region') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('investor_cost')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="investor_cost">Сума, яку готові інвестувати:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-usd">
                        </i>
                    </div>
                    <input type="number" value="{{ old('investor_cost') }}" name="investor_cost" class="form-control" id="text">
                </div>
                 @if($errors->has('investor_cost'))
                <span class="control-label"> {{ $errors->first('investor_cost') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('duration_project')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Період реалізації інвестиційного проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar">
                        </i>
                    </div>
                    <input type="text" value="{{ old('duration_project') }}" name="duration_project" class="form-control" id="text">

                </div>
                 @if($errors->has('duration_project'))
                <span class="control-label"> {{ $errors->first('duration_project') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('term_refund')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Термін повернення вкладених коштів:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar-o">
                        </i>
                    </div>
                    <input type="text" value="{{ old('term_refund') }}" name="term_refund" class="form-control" id="text">
                </div>
                 @if($errors->has('term_refund'))
                <span class="control-label"> {{ $errors->first('term_refund') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group {{ $errors->has('plan_rent')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Планована рентабельність проекту:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-edit">
                        </i>
                    </div>
                    <input type="text" value="{{ old('plan_rent') }}" name="plan_rent" class="form-control" id="text">
                </div>
                 @if($errors->has('plan_rent'))
                <span class="control-label"> {{ $errors->first('plan_rent') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('other')?'has-error':'' }}">
            <label class="col-md-2 control-label" for="email">Інше:</label>
            <div class="col-md-10">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-info">
                        </i>
                    </div>
                    <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ old('other') }}</textarea>
                </div>
                 @if($errors->has('other'))
                <span class="control-label"> {{ $errors->first('other') }}</span>
                @endif
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


            <input value="Подати" type="submit" class="btn btn-success col-md-offset-2">

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
