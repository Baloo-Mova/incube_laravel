@extends('frontend.layouts.template')

@section('content')
    <div class="row page-title text-center">
        <h2>ПОДАЧА ЗАЯВКИ НА ІНВЕСТУВАННЯ</h2>
    </div>
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
        <form method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label" for="text">Інвестор:</label>
                <input type="text" value="{{ old('investor_name') }}" name="investor_name" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="email">Контактні дані:</label>
                <textarea rows="6" type="text" name="investor_contacts" class="form-control" id="text">{{ old('investor_contacts') }}</textarea>
            </div>
            <div class="form-group">
                <label for="email">Етап проекту:</label>
                <input type="text" value="{{ old('stage_project') }}" name="stage_project" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="email">Регіон інвестування:</label>
                <select class="js-example-basic-single form-control"  name="economic_activities_id">
                    @foreach($economicActivities as $i => $item)
                        <option value="{{ $i }}" {{ ( old("economic_activities_id") == $i ? "selected":"") }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="email">Сума, яку готові інвестувати:</label>
                <input type="number" value="{{ old('investor_cost') }}" name="investor_cost" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="email">Період реалізації інвестиційного проекту:</label>
                <input type="text" value="{{ old('duration_project') }}" name="duration_project" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="email">Термін повернення вкладених коштів:</label>
                <input type="text" value="{{ old('term_refund') }}" name="term_refund" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="email">Планована рентабельність проекту:</label>
                <input type="text" value="{{ old('plan_rent') }}" name="plan_rent" class="form-control" id="text">
            </div>
            <div class="form-group">
                <label for="email">Інше:</label>
                <textarea type="text" name="other" class="form-control" id="text" rows="6">{{ old('other') }}</textarea>
            </div>
            <div class="form-group">
                <label for="email">Логотип:</label>
                <input type="file" name="logo_img_file" class="form-control" id="file_up">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Подати</button>
            </div>
        </form>
    </div>
@stop
@section('js')
    <script type="text/javascript">
        $('select').select2({
            placeholder: "Выберите регион",
            allowClear : true
        });
        $("#file_up").fileinput({
            'showUpload'     : false,
            'previewFileType': 'any',
            'allowedFileTypes' : ['image']

        });
    </script>
@stop