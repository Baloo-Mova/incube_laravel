@extends('admin.layouts.template')

@section('content')

{{--<div class="row page-title text-center">--}}
{{--<h2>Заявка інвестора. Ідентифікаційний номер: {{ $investor->id }}</h2>--}}
{{--</div>--}}


<div class="container-fluid">
    <div class="row text-center">
        <h1>{{ $investor->name }}</h1>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="description">

        </div>
    </div>


    <div class="row">
        <div class="col-md-10">

            <label> Автор</label>
            <div class="clearfix"></div>
            <a href="#">{{$investor->author->name }}</a>

        </div>
        <div class="col-md-10">

            <label> Редактор</label>
            <div class="clearfix"></div>
            <a hreff="#">{{ $investor->publisher_id }}</a>

        </div>
        <div class="col-md-10">

            <label> Опис</label>
            <div class="clearfix"></div>
            {!! $investor->description !!}

        </div>
        <div class="col-md-10">

            <label> Дата подачі заявки</label>
            <div class="clearfix"></div>
            {{ $investor->created_at->format("d.m.Y") }}

        </div>
        <div class="col-md-10">

            <label> Дата оновлення заявки</label>
            <div class="clearfix"></div>
            {{ $investor->created_at->format("d.m.Y") }}

        </div>
        <div class="col-md-10">
            <label> Сума інвестування</label>
            <div class="clearfix"></div>
            {{ $investor->money }} $

        </div>
        <div class="col-md-10">
            <label>Галузь</label>
            <div class="clearfix"></div>
            @if(!$investor->economicActivities->isChildren())
            {{ $investor->economicActivities->name }}
            @else
            {{ $investor->economicActivities->parent->name }}: <div class="clearfix"></div>  <span style="margin-left: 20px">{{ $investor->economicActivities->name }}</span>
            @endif

        </div>
        <div class="col-md-10">
            <label> Країна</label>
            <div class="clearfix"></div>
            {{ $investor->country->name }}

        </div>
        @if(isset($investor->city))
        <div class="col-md-10">
            <label> Область інвестування</label>
            <div class="clearfix"></div>
            {{ $investor->city->name }}

        </div>
        @endif
        <div class="col-md-10">
            <label> Період реалізації інвестиційного проекту</label>
            <div class="clearfix"></div>
            {{ $investor->duration_project }}

        </div>
        <div class="col-md-10">
            <label> Термін повернення вкладених коштів</label>
            <div class="clearfix"></div>
            {{ $investor->term_refund }}

        </div>
        <div class="col-md-10">
            <label> Планована рентабельність проекту</label>
            <div class="clearfix"></div>
            {{ $investor->plan_rent }} %

        </div>
        <div class="col-md-10">
            <label> Контакти</label>
            <div class="clearfix"></div>
            <a href="">{!!$investor->contacts !!}</a>
        </div>
        <div class="col-md-10">
            <label>Запропоновані проекти: </label>
            <ul> 
                <li><a href="#">d</a></li>
                <li><a href="#">d</a></li>
            </ul>
        </div>
    </div>
    <div class="btn-toolbar">

            <div class="btn-group">
                <a href="{{ route('admin.investor.edit', ['id'=>$investor->id]) }}"
                   class="btn-primary btn">Оновити</a>
            </div>
            <div class="btn-group">
                <a href="{{ route('admin.investor.delete', ['id'=>$investor->id]) }}"
                   onclick="return confirm('Вы точно хотите удалить проэкт?')"
                   class="btn-danger btn">Видалити</a>
            </div>
            <div class="btn-group pull-left">
                <a href="{{ route('project_viewer.show',['material'=>$investor->id]) }}"
                   class="btn-default btn">Продивитись на стороні клієнта</a>
            </div>
        

        <div class="btn-group pull-right">
            <a href="#" id="offer-project" data-toggle="modal" data-target="#myModal"
               class="btn btn-primary"> <span><i class="fa fa-check"></i> Запропонувати проект</span>
            </a>
        </div>

    </div>
    <div class="row">
                <h2 class="text-center">Пропозицii</h2>
                <table class="table table-hover" id="offers">
                    <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Назва проекту</th>
                        <th class="text-center">Дата</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($investor->offers as $item)
                        <tr>
                            <td class="text-center">
                                {{$item->id}}
                            </td>
                            <td class="text-center">
                                {{ $item->name }}
                            </td>
                            <td class="text-center">
                                {{ $item->pivot->created_at }}
                            </td>
                            <td>
                                <a href="{{route('project_viewer.show',['material'=>$item->id])}}" title="View"
                                   aria-label="View"
                                   data-pjax="0">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                </a>
                                <a href="{{route('delete.offer',['rec'=>$item->id, 'send'=>$investor->id])}}" title="receiver_table_id"
                                       aria-label="Receiver_table_id{{$item->id}}-{{$investor->id}}"
                                       data-pjax="0">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">
                                Пропозицiй нема
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="row-fluid user-row">
                    <img src="{{url('/img/'.'logo.png')}}" class="img-responsive" alt="log">
                </div>

                <h4 class="modal-title text-center title-border">Оберіть свій проект</h4>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr>
                            <th colspan="2">Ваші проекти</th>
                        </tr>
                    </thead>
                </table>
                {{-- TODO: delete this button --}}
                <button type="button" class="btn btn-danger btn-block" id="send-project">Send test project</button>
            </div>
            <div class="modal-footer">
                <a href="{{ route('designer.create') }}" class="btn btn-success pull-left">Подати проект</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
            </div>
        </div>
    </div>
</div>

@stop
@section('js')
<script>
    $(document).ready(function () {
        $('#send-project').click(function () {

            $.ajax({
                url: '{{ url(' / create / offer') }}',
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'receiver_id': '{{ $investor->id }}',
                    'receiver_type': '1', //investor table id
                    'sender_id': '1', //random id
                    'sender_type': '3' // project table id
                },
                success: function (response) {
                    console.log(response);
                }
            })
        });

    });
</script>
@stop
