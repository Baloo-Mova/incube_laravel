@extends('frontend.layouts.template')

@section('content')
    <div class="page-title text-center">
        <h2>Оновлення заявки питання(проблеми). Ідентифікаційний номер:{{$problem->id}}</h2>
    </div>
    <hr/>
    <div class="container">

        @if(Session::has('message'))
            <div class="col-md-offset-2">
                <div class="c col-md-10 text-center">
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                    <a href="{{ route('problem.show',['problem'=>$problem->id]) }}" class="btn-primary btn">Продивитись</a>
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
                    <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                        <label class="control-label" for="Назва питання">Назва питання(проблеми):</label>


                        <input type="text" value="{{ $problem->name }}" name="name" class="form-control" id="text">
                        @if($errors->has('name'))
                            <span class="control-label"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>


            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('problem_description')?'has-error':'' }}">
                        <label class="control-label" for="discription">Опис питання(проблеми):</label>
                        <textarea rows="6" type="text" name="description" class="form-control" id="text">{{ $problem->description }}</textarea>
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
                             'economicActivitiesAttributeValueNow' => $problem->economic_activities_id
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
                                <option value="{{ $country->id }}" {{ $problem->country_id == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
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
                            <option value="0"> Усi</option>
                            @foreach(\App\Models\City::where(['country_id'=>$problem->country_id])->get() as $city)
                                <option value="{{ $city->id }}" {{ $problem->city_id == $city->id ? "selected" : "" }}>{{ $city->name }}</option>
                            @endforeach
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

                            <input type="file" name="logo_img_file" class="form-control" id="file_up">

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
        $("#file_up").fileinput({
            'showUpload': false,
            'previewFileType': 'image',
            'allowedFileTypes': ['image'],
            'initialPreview': [
                @if (!empty($problem->logo)) '{{route('images.show',['name'=>'problem','id'=>$problem->logo, 'width'=>'max', 'height'=>'max'])}}' @endif,
            ],
            'initialPreviewAsData': true,
        });

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
