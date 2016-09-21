@extends('admin.layouts.template')

@section('content')
<div class="page-title text-center">
    <h2>ПОДАЧА ЗАЯВКИ ІНВЕСТОРА</h2>
</div>
<hr/>
<div class="container">
    <form method="POST"  class="form-horizontal">
        {{ csrf_field() }}

        @if(!Auth::check())
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('email')?'has-error':'' }}">
                    <label class="control-label">Email <span class="form-required">*</span></label>
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
                <div class="form-group {{ $errors->has('status_id')?'has-error':'' }}">
                    <label class="control-label" for="status_id">Статус</label>
                    <select id="country_id" class="form-control" name="status_id">
                        @foreach(\App\Models\Status::all() as $status)
                        <option value="{{ $status->id }}" {{ ( old('status_id') == $status->id ? "selected":"") }}>{{ $status->name }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('status_id'))
                    <span class="control-label"> {{ $errors->first('status_id') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                    <label class="control-label">Назва інвестування <span class="form-required">*</span></label>
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
                    <label class="control-label" for="Contacts">Опис</label>
                    <textarea rows="6" type="text" name="description" class="form-control" id="text">{{ old('description') }}</textarea>
                    @if($errors->has('description'))
                    <span class="control-label"> {{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('contacts')?'has-error':'' }}">
                    <label class="control-label" for="Contacts">Контакти <span class="form-required">*</span></label>
                    <textarea rows="6" type="text" name="contacts" class="form-control" id="text">{{ old('contacts') }}</textarea>
                    @if($errors->has('contacts'))
                    <span class="control-label"> {{ $errors->first('contacts') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group">
                    <label class="control-label" for="Галузь">Галузь <span class="form-required">*</span></label>
                    @include('admin.partials.economic_activities_select',
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
                    <label class="control-label" for="region">Країна інвестування <span class="form-required">*</span></label>
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
                    <label class="control-label" for="region">Регіон інвестування</label>
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
                <div class="form-group {{ $errors->has('stage_id')?'has-error':'' }}">
                    <label class="control-label" for="stage_id">Очікуваний етап проекту <span class="form-required">*</span></label>
                    <select id="stage_id" class="form-control" name="stage_id">
                        @if(old('stage_id')==null)
                        <option disabled selected> Виберіть етап проекту</option>
                        @endif
                        @foreach(\App\Models\Stage::all() as $item)
                        <option value="{{$item->id}}" {{ ( old('stage_id') == $item->id ? "selected":"") }}> {{ $item->name }}</option>
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
                    <label class="control-label" for="money">Сума, яку готові інвестувати ($)<span class="form-required">*</span></label>
                    <input type="number" value="{{ old('money') }}" name="money" class="form-control" id="money">
                    @if($errors->has('money'))
                    <span class="control-label"> {{ $errors->first('money') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('duration_project')?'has-error':'' }}">
                    <label class="control-label" for="email">Період реалізації інвестиційного проекту</label>
                    <input type="text" placeholder="Наприклад: 3 місяця" value="{{ old('duration_project') }}" name="duration_project" class="form-control" id="text">
                    @if($errors->has('duration_project'))
                    <span class="control-label"> {{ $errors->first('duration_project') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('term_refund')?'has-error':'' }}">
                    <label class="control-label" for="email">Термін повернення вкладених коштів</label>
                    <input type="text" placeholder="Наприклад: 1 рік" value="{{ old('term_refund') }}" name="term_refund" class="form-control" id="text">
                    @if($errors->has('term_refund'))
                    <span class="control-label"> {{ $errors->first('term_refund') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-offset-2">
            <div class="col-md-10">
                <div class="form-group {{ $errors->has('plan_rent')?'has-error':'' }}">
                    <label class="control-label" for="email">Планована рентабельність проекту (%)</label>
                    <input type="number" value="{{ old('plan_rent') }}" name="plan_rent" class="form-control" id="text">
                    @if($errors->has('plan_rent'))
                    <span class="control-label"> {{ $errors->first('plan_rent') }}</span>
                    @endif
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

    $('#country_id').on('change', function () {
        var id = $(this).val();

        $.ajax({
            url: "{{ url('/get/cities/') }}/" + id,
            success: function (data) {
                var select = $('#city_id');
                select.find('option').remove();
                select.append('<option selected value="0">Усi</option>');
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
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
@stop
