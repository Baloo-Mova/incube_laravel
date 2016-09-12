@extends('frontend.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>Подача питання(проблеми)</h2>
</div>
<hr/>
<div class="container">
   
    <form method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        @if(!Auth::check())
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="ел пошта">Реєстраційна Електрона пошта:</label>
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="text">

                    @if($errors->has('email'))
                    <span class="control-label"> {{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
        </div>
        @endif

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label class="control-label" for="Назва питання">Назва питання(проблеми)<span class="form-required">*</span></label>


                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="text">
                    @if($errors->has('name'))
                    <span class="control-label"> {{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                    <label class="control-label" for="discription">Опис питання(проблеми)<span class="form-required">*</span></label>
                    <textarea rows="6" type="text" name="description" class="form-control" id="text">{{ old('description') }}</textarea>
                        @if($errors->has('description'))
                            <span class="control-label"> {{ $errors->first('description') }}</span>
                        @endif
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="Галузь">Галузь:</label>
                    @include('frontend.partials.economic_activities_select',
                       ['economicActivities'=> $economicActivities,
                        'economicActivitiesAttributeName'=>'economic_activities_id',
                        'economicActivitiesAttributeValueNow' => old('economic_activities_id')
                       ])
                </div>
            </div>
        </div>

        <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                        <label class="control-label" for="region">Країна проблеми <span class="form-required">*</span></label>
                        <select id="country_id" class="form-control" name="country_id">
                            @if(old('country_id')==null)
                            <option value="" selected disabled>Оберіть країну</option>
                            @endif
                            @foreach(\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ ( old('country_id') == $country->id ? "selected":"") }}>{{ $country->name }}</option>
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
                        <label class="control-label" for="region">Регіон проблеми</label>
                        <select id="city_id" class="form-control" name="city_id">

                        </select>
                        @if($errors->has('city_id'))
                            <span class="control-label"> {{ $errors->first('city_id') }}</span>
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
                    <input value="Подати" type="submit" class="btn btn-success">
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
        'showUpload': false,
        'previewFileType': 'any',
        'allowedFileTypes': ['image'],
        'multiple':false,
    });
</script>
<script type="text/javascript">

        $('#country_id').on('change', function(){
            var id = $(this).val();

            $.ajax({
                url: "{{ url('/get/cities/') }}/"+id,
                success: function(data){
                    var select = $('#city_id');
                    select.find('option').remove();
                    select.append('<option selected value="0">Усi</option>');
                    $.each(data, function(i, item){
                        select.append('<option value="'+i+'"> '+item+' </option>');
                    });
                },
                dataType: "json"
            });
        });

        tinymce.init({
            selector: "textarea",
            language: 'uk_UA',
            plugins : [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>
@stop
