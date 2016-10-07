@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Оновлення резюме. Ідентифікаційний номер:{{$executor->id}}</h2>
</div>
<hr/>
<div class="container">
    @if(Session::has('message'))
   <div class="col-md-offset-2">
        <div class="col-md-10 text-center">
            <p class="alert alert-info">{{ Session::get('message') }}</p>
             <a href="{{ route('project_viewer.show',['material'=>$executor->id]) }}" class="btn-primary btn">Продивитись</a>
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
                <div class="form-group {{ $errors->has('second_name')?'has-error':'' }}">
                    <label class="control-label" for="second_name">Прізвище: <span class="form-required">*</span></label>

                    <input type="text" value="{{ $executor->second_name }}" class="form-control" name="second_name">


                    @if($errors->has('second_name'))
                        <span class="control-label"> {{ $errors->first('second_name') }}</span>
                    @endif


                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('first_name')?'has-error':'' }}">
                    <label class="control-label" for="first_name">Ім'я: <span class="form-required">*</span></label>
                    <input type="text" value="{{ $executor->first_name }}" class="form-control" name="first_name">
                    @if($errors->has('first_name'))
                        <span class="control-label"> {{ $errors->first('first_name') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('last_name')?'has-error':'' }}">
                    <label class="control-label" for="last_name">По-батькові: <span class="form-required">*</span></label>

                    <input type="text" value="{{ $executor->last_name }}" class="form-control" name="last_name">


                    @if($errors->has('last_name'))
                        <span class="control-label"> {{ $errors->first('last_name') }}</span>
                    @endif


                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('date_birth')?'has-error':'' }}">
                    <label class="control-label" for="date_birth">Дата народження: <span class="form-required">*</span></label>

                   
                        <div class='input-group date'>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input type="text" value="{{ $executor->date_birth }}" class="form-control" name="date_birth" id='datetimepicker1'>

                        </div>
                        @if($errors->has('date_birth'))
                        <span class="control-label"> {{ $errors->first('date_birth') }}</span>
                        @endif
                    

                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('experience')?'has-error':'' }}">
                    <label class="control-label" for="experience">Досвід роботи: <span class="form-required">*</span></label>


                    <textarea rows="3" type="text" name="experience" class="form-control" id="text">{{ $executor->experience }}</textarea>
                    @if($errors->has('experience'))
                    <span class="control-label"> {{ $errors->first('experience') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('education')?'has-error':'' }}">
                    <label class="control-label" for="education">Освіта: <span class="form-required">*</span></label>


                    <textarea rows="3" type="text" name="education" class="form-control" id="text">{{ $executor->education }}</textarea>
                    @if($errors->has('education'))
                    <span class="control-label"> {{ $errors->first('education') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('internship')?'has-error':'' }}">
                    <label class="control-label" for="internship">Стажування та практика: <span class="form-required">*</span></label>


                    <textarea rows="3" type="text" name="internship" class="form-control" id="text">{{ $executor->internship }}</textarea>
                    @if($errors->has('internship'))
                    <span class="control-label"> {{ $errors->first('internship') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('participation_projects')?'has-error':'' }}">
                    <label class="control-label" for="participation_projects">Участь у проектах: <span class="form-required">*</span></label>
                    <textarea rows="3" type="text" name="participation_projects" class="form-control" id="text">{{ $executor->participation_projects }}</textarea>
                    @if($errors->has('participation_projects'))
                    <span class="control-label"> {{ $errors->first('participation_projects') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="description">Опис професійних якостей: <span class="form-required">*</span></label>
                    <textarea rows="6" type="text" name="description" class="form-control" id="text">{{ $executor->description }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('adress')?'has-error':'' }}">

                    <label class="control-label" for="adress">Адреса: <span class="form-required">*</span></label>

                    <input type="text" value="{{ $executor->adress }}" name="adress" class="form-control" id="text">
                    @if($errors->has('org_name'))
                    <span class="control-label"> {{ $errors->first('adress') }}</span>
                    @endif
                </div>
            </div>
        </div> 

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('phone')?'has-error':'' }}">

                    <label class="control-label" for="phone">Телефон: <span class="form-required">*</span></label>

                    <input type="text" value="{{ $executor->phone }}" name="phone" class="form-control" id="text">
                    @if($errors->has('phone'))
                    <span class="control-label"> {{ $errors->first('phone') }}</span>
                    @endif
                </div>
            </div>
        </div> 


        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('contacts')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Інші контактні дані:</label>
                    <textarea rows="3" type="text" name="contacts" class="form-control" id="text">{{ $executor->contacts }}</textarea>
                    @if($errors->has('contacts'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
                    @endif
                </div>
                <div class="help-block"></div>
            </div>
        </div>


        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="doc_file">Резюме(в ел. варіанті):</label>
                    <input type="text" value="{{ $executor->doc_file }}" name="doc_file" class="form-control" id="text">
                </div>
            </div> 
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="photo">Фото:</label>
                    <input type="file" name="logo_img_file" class="form-control" id="photo">
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

    $("#photo").fileinput({
    'showUpload'          : false,
            'previewFileType'     : 'image',
            'allowedFileTypes'    : ['image'],
            'initialPreview'      : [
                    @if (!empty($executor->logo)) '{{url('/img/'.$executor->logo.'/maxmax')}}' @endif,
            ],
            'initialPreviewAsData': true,
    });

            $('#datetimepicker1').datetimepicker({
                 format: 'YYYY-MM-DD',
                  
            });

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
