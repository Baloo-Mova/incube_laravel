@extends('admin.layouts.template')

@section('content')
<div class="container">
    <div class="row page-title text-center">
        <h2>Резюме. Ідентифікаційний номер: {{ $executor->id }}</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div align="center">
                {{--<img alt="User Pic" src="{{ route('images.show', ['id'=> (empty($executor->logo)? 'empty' : $executor->logo),'height'=>'max','width'=>'max']) }}" class="img-circle img-responsive">
            --}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="email">Інші файли:</label>
                        <input type="file" name="executer_files[]" multiple class="form-control" id="documents">
                    </div>
                </div>
           

            
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="email">Логотип:</label>
                        <input type="file" name="logo_file" class="form-control" id="logo" disabled>
                    </div>
                </div>
            
            </div>
            <label>Дата створення</label>
            <p>{{ $executor->created_at }} </p>

            <label>Дата оновлення</label>
            <p>{{ $executor->updated_at }} </p>
            <label>Автор</label>
            <p> {{$executor->author->name }}</p>

            @if(isset($employer->publisher_id))
            <label>Редактор</label>
            <p> {{  $executor->publisher->name }}</p>
            @endif

            <label>Прізвище, Ім'я, По-Батькові</label>
            <p>{{ $executor->name }} </p>
            <label>День народження</label>
            <p>{{$executor->date_birth }}</p>   
            <label>Досвід роботи</label>
            {!!$executor->experience!!}
            <label>Освіта</label>
            {!!$executor->education!!}
            <label>Практики та стажування</label>
            {!!$executor->internship!!}                     

            <label>Участь у проектах</label>
            {!! $executor->participation_projects!!}

            <label>Здібності та уміння</label>
            <p>{!! $executor->description !!}</p>
            <label>Контактні дані(адреса, телефон,ел.пошта)</label>
            {!!$executor->contacts!!}   

            <!--<a href="#" class="btn btn-primary">My Sales Performance</a>
            <a href="#" class="btn btn-primary">Team Sales Performance</a>-->
        </div>
    </div>
</div>
<div class="panel-footer">
    <a data-original-title="Надіслати повідомлення" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
    <span class="pull-right">

        <div class="btn-group pull-lef">
            <a href="{{route('admin.executor.edit',['executor'=>$executor->id])}}" class="btn-primary btn">Оновити</a>
        </div>
        <div class="btn-group pull-lef">
            <a href="{{ route('admin.executor.delete', ['id'=>$executor->id]) }}" class="btn-danger btn" onclick="return confirm('Вы точно хотите удалить проэкт?')">Видалити</a>
        </div>

        <div class="btn-group pull-lef">
            <a href="{{route('executor.show',['executor'=>$executor->id])}}" class="btn-default btn">Продивитись на стороні клієнта</a>
        </div>
    </span>
</div>


</div>
</div>

</div>

@stop
@section('js')
<script type="text/javascript">
$("#logo").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            'allowedFileTypes': ['image'],
            'multiple': false,
            initialPreview: [
                "{{route('images.show',['id'=>$executor->logo,'width'=>'max','height'=>'max'])}}"
            ],
            initialPreviewAsData: true,
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {upload} {zoom} {other}' +
                '    </div>\n' +
                '    {drag}\n' +
                '    <div class="clearfix"></div>\n' +
                '</div>',
            }
        });
        $("#documents").fileinput({
            'showUpload': false,
            'previewFileType': 'any',
            initialPreview: [
                @foreach($executor->documents as $i=>$file)
                        "{{route('images.show',['id'=>$file->name,'width'=>'max','height'=>'max'])}}",
                @endforeach
            ],
            initialPreviewAsData: true,
            layoutTemplates: {
                actions: '<div class="file-actions">\n' +
                '    <div class="file-footer-buttons">\n' +
                '        {upload} {zoom} {other}' +
                '    </div>\n' +
                '    {drag}\n' +
                '    <div class="clearfix"></div>\n' +
                '</div>',
            }

        });
</script>
@stop