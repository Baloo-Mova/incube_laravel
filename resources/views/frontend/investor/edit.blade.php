@extends('frontend.layouts.template')

@section('content')
    <div class="page-title text-center">
        <h2>Редагування заявки ІНВЕСТора. Ідентифікаційний номер:{{$investor->id}}</h2>
    </div>
    <hr/>
    <div class="container">
        @if(Session::has('message'))
            <div class="col-md-offset-2">
                <div class="col-md-10 text-center">
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                    <a href="{{ route('project_viewer.show',['material'=>$investor->id]) }}" class="btn-primary btn">Продивитись</a>
                </div>
            </div>
        @endif
        <form method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                        <label class="control-label">Назва інвестування</label>
                        <input type="text" value="{{ $investor->name  }}" name="name" class="form-control" id="text">
                        @if($errors->has('name'))
                            <span class="control-label"> {{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                        <label class="control-label" for="Contacts">Опис</label>
                        <textarea rows="6" type="text" name="description" class="form-control"
                                  id="text">{{ $investor->description }}</textarea>
                        @if($errors->has('description'))
                            <span class="control-label"> {{ $errors->first('description') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('contacts')?'has-error':'' }}">
                        <label class="control-label" for="Contacts">Контакти</label>
                        <textarea rows="6" type="text" name="contacts" class="form-control"
                                  id="text">{{ $investor->contacts }}</textarea>
                        @if($errors->has('contacts'))
                            <span class="control-label"> {{ $errors->first('contacts') }}</span>
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
                             'economicActivitiesAttributeValueNow' => $investor->economic_activities_id
                            ])
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('country_id')?'has-error':'' }}">
                        <label class="control-label" for="region">Країна інвестування</label>
                        <select id="country_id" class="form-control" name="country_id">
                            @foreach(\App\Models\Country::all() as $country)
                                <option value="{{ $country->id }}" {{ $investor->country_id == $country->id ? "selected" : "" }}>{{ $country->name }}</option>
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
                        <label class="control-label" for="region">Регіон інвестування</label>
                        <select id="city_id" class="form-control" name="city_id">
                            <option value="0"> Усi </option>
                            @foreach(\App\Models\City::where(['country_id'=>$investor->country_id])->get() as $city)
                                <option value="{{ $city->id }}" {{ $investor->city_id == $city->id ? "selected" : "" }}>{{ $city->name }}</option>
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
                    <div class="form-group {{ $errors->has('stage_id')?'has-error':'' }}">
                        <label class="control-label" for="stage_id">Очікуваний етап проекту</label>
                        <select id="stage_id" class="form-control" name="stage_id">
                            @if(old('stage_id')==null)
                                <option disabled selected> Виберіть етап проекту</option>
                            @endif
                            @foreach(\App\Models\Stage::all() as $item)
                                <option value="{{$item->id}}" {{ ( $investor->stage_id == $item->id ? "selected":"") }}> {{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('stage_id'))
                            <span class="control-label"> {{ $errors->first('stage_id') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('money')?'has-error':'' }}">
                        <label class="control-label" for="investor_cost">Сума, яку готові інвестувати:</label>
                        <input type="number" value="{{ $investor->money }}" name="money"
                               class="form-control" id="text">
                        @if($errors->has('money'))
                            <span class="control-label"> {{ $errors->first('money') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('duration_project')?'has-error':'' }}">
                        <label class="control-label" for="email">Період реалізації інвестиційного проекту:</label>
                        <input type="text" value="{{ $investor->duration_project }}" name="duration_project"
                               class="form-control" id="text">
                        @if($errors->has('duration_project'))
                            <span class="control-label"> {{ $errors->first('duration_project') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('term_refund')?'has-error':'' }}">
                        <label class="control-label" for="email">Термін повернення вкладених коштів:</label>
                        <input type="text" value="{{ $investor->term_refund }}" name="term_refund" class="form-control"
                               id="text">
                        @if($errors->has('term_refund'))
                            <span class="control-label"> {{ $errors->first('term_refund') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group {{ $errors->has('plan_rent')?'has-error':'' }}">
                        <label class="control-label" for="email">Планована рентабельність проекту:</label>
                        <input type="text" value="{{ $investor->plan_rent }}" name="plan_rent" class="form-control"
                               id="text">
                        @if($errors->has('plan_rent'))
                            <span class="control-label"> {{ $errors->first('plan_rent') }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-offset-2">
                <div class="col-md-10">
                    <div class="form-group">
                        <input value="Зберегти" type="submit" class="btn btn-success">
                        <input type="button" class="btn btn-default" value="Назад" onclick="history.back()">
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        {{--$("#file_up").fileinput({--}}
            {{--'showUpload': false,--}}
            {{--'previewFileType': 'image',--}}
            {{--'allowedFileTypes': ['image'],--}}
            {{--'initialPreview': [--}}
                {{--@if (!empty($investor->logo)) '{{route('images.show',['name'=>'investor','id'=>$investor->logo, 'width'=>'max', 'height'=>'max'])}}' @endif,--}}
            {{--],--}}
            {{--'initialPreviewAsData': true,--}}
        {{--});--}}

        $('#country_id').on('change', function () {
            var id = $(this).val();

            $.ajax({
                url: "{{ url('/get/cities/') }}/" + id,
                success: function (data) {
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

    </script>
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
