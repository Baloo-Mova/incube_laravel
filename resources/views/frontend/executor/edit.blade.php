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
             <a href="{{ route('executor.show',['executor'=>$executor->id]) }}" class="btn-primary btn">Продивитись</a>
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
            <div class='col-xs-4 col-sm-4 col-md-3'>
                <div class="form-group {{ $errors->has('executor_fname')?'has-error':'' }}">
                    <label class="control-label" for="date_birth">Ім'я:</label>
                    
                        <input type="text" value="{{ $executor->executor_fname }}" name="executor_fname" class="form-control" id="text" placeholder="Ім'я">
                    
                    @if($errors->has('executor_fname'))
                    <span class="control-label"> {{ $errors->first('executor_fname') }}</span>
                    @endif
                </div>
            </div> 
            <div class='col-xs-4 col-sm-4 col-md-4'>
                <div class="form-group {{ $errors->has('executor_sname')?'has-error':'' }}">

                    <label class="control-label" for="date_birth">Прізвище:</label>
                    
                    <input type="text" value="{{ $executor->executor_sname }}" name="executor_sname" class="form-control" id="text" placeholder="Прізвище">
                    @if($errors->has('executor_sname'))
                    <span class="control-label"> {{ $errors->first('executor_sname') }}</span>
                    @endif
                </div>
            </div> 
            <div class='col-xs-4 col-sm-4 col-md-3'>
                <div class="form-group {{ $errors->has('executor_thname')?'has-error':'' }}">
                    <label class="control-label" for="date_birth">По-батькові:</label>
                    
                    <input type="text" value="{{ $executor->executor_thname }}" name="executor_thname" class="form-control" id="text" placeholder="По-батькові">
                    
                    @if($errors->has('executor_thname'))
                    <span class="control-label"> {{ $errors->first('executor_thname') }}</span>
                    @endif
                </div> 
            </div> 
        </div>
        <hr/>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('date_birth')?'has-error':'' }}">
                    <label class="control-label" for="date_birth">Дата народження:</label>

                   
                        <div class='input-group date' id='datetimepicker1'>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                            <input type="text" value="{{ $executor->date_birth }}" class="form-control" name="contacts">

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
                    <label class="control-label" for="experience">Досвід роботи:</label>


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
                    <label class="control-label" for="education">Освіта:</label>


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
                    <label class="control-label" for="internship">Стажування та практика:</label>


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
                    <label class="control-label" for="participation_projects">Участь у проектах:</label>
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
                    <label class="control-label" for="description">Опис професійних якостей:</label>
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

                    <label class="control-label" for="adress">Адреса:</label>

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

                    <label class="control-label" for="phone">Телефон:</label>

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
                    @if (!empty($executor->logo)) '{{url('/executor/image/'.$executor->logo)}}' @endif,
            ],
            'initialPreviewAsData': true,
    });</script>
<script type="text/javascript">
            $(function () {
            $('#datetimepicker1').datetimepicker({
            });
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
