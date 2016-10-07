@extends('frontend.layouts.template')

@section('content')

    {{--<div class="row page-title text-center">--}}
    {{--<h2>Заявка інвестора. Ідентифікаційний номер: {{ $investor->id }}</h2>--}}
    {{--</div>--}}


    <div class="container-fluid">
        <div class="row">
            <div class="text-center">
                <h1>{{ $investor->name }}</h1>
            </div>
            <hr/>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="btn-toolbar">
                <div class="btn-group pull-left">
                    @if(Auth::check() && Auth::user()->can('edit', $investor))
                        <a href="{{ route('investor.edit', ['id'=>$investor->id]) }}"
                           class="btn-primary btn">Оновити</a>
                        <a href="{{ route('investor.delete', ['id'=>$investor->id]) }}"
                           onclick="return confirm('Вы точно хочете видалити проект?')"
                           class="btn-danger btn">Видалити</a>
                    @endif
                    @if(Auth::check() && Auth::user()->can('offer', $investor))
                        <a href="#" id="offer-project" data-toggle="modal" data-target="#myModal"
                           class="btn btn-primary"> <span><i class="fa fa-check"></i> Запропонувати проект</span>
                        </a>
                    @endif
                </div>
            </div>
            <hr/>
            <input type="hidden" value="{{ $investor->id }}" id="id">
            <div class="description">
                {!! $investor->description !!}
            </div>
            <hr/>
            <label> Дата подачі заявки</label>
            <div class="clearfix"></div>
            {{ $investor->created_at->format("d.m.Y") }}
            <hr/>
            <label> Сума інвестування</label>
            <div class="clearfix"></div>
            {{ $investor->money }} $
            <hr/>
            <label>Галузь</label>
            <div class="clearfix"></div>
            @if(!$investor->economicActivities->isChildren())
                {{ $investor->economicActivities->name }}
            @else
                {{ $investor->economicActivities->parent->name }}:
                <div class="clearfix"></div>  <span
                        style="margin-left: 20px">{{ $investor->economicActivities->name }}</span>
            @endif
            <hr/>
            <label> Країна</label>
            <div class="clearfix"></div>
            {{ $investor->country->name }}
            <hr/>
            @if(isset($investor->city))
                <label> Область інвестування</label>
                <div class="clearfix"></div>
                {{ $investor->city->name }}
                <hr/>
            @endif
            <label> Період реалізації інвестиційного проекту</label>
            <div class="clearfix"></div>
            {{ $investor->duration_project }}
            <hr/>
            <label> Термін повернення вкладених коштів</label>
            <div class="clearfix"></div>
            {{ $investor->term_refund }}
            <hr/>
            <label> Планована рентабельність проекту</label>
            <div class="clearfix"></div>
            {{ $investor->plan_rent }} %
            <hr/>
        </div>
        @if(Auth::check() && Auth::user()->can('edit', $investor))
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
        @endif
    </div>
    @if(Auth::check() && Auth::user()->can('offer', $investor))

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div id="overlay">
                        <img class="spinner" src="{{ asset('img/spinner.gif') }}">
                    </div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="row-fluid user-row">
                            <img src="{{url('/img/'.'logo.png')}}" class="img-responsive" alt="log">
                        </div>
                        <h4 class="modal-title text-center title-border">Оберіть свій проект</h4>
                    </div>
                    <div class="modal-body">
                        <h2 class="text-center">
                            Ваші проекти
                        </h2>
                        <div class="information alert" style="display: none"></div>

                        <table class="table table-hover" id="designer-offer">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Назва</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse(Auth::user()->getAllDesigner() as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center"> У вас немае опублiкованих проэктiв</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('designer.create') }}" class="btn btn-success pull-left">Новий проект</a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop
@section('js')
    <script>
        $(document).ready(function () {

            $('#designer-offer tbody tr').on('click', function () {
                var td = $(this).find('td');
                var id = td[0].innerText;
                var name = td[1].innerText;
                if (confirm("Ви точно хотите подать проэкт с названием \"" + name + "\" ?")) {
                    $("#overlay").show();
                    $.ajax({
                        url: '{{ route('create.offer') }}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'receiver_id': $('#id').val(),
                            'sender_id': id,
                        },
                        success: function (response, code) {
                            var info = $('#myModal .information');
                            info.text(response.text);
                            info.removeClass('alert-success').removeClass('alert-danger');
                            info.addClass('alert-' + response.status);
                            info.show();
                            $('#overlay').hide();
                        }
                    })
                }
            });
        });
    </script>
@stop

@section('css')
    <style>
        #overlay {
            background-color: rgba(0, 0, 0, 0.2);
            z-index: 999;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: none;
        }
        .spinner {
            width: 120px;
            height: 120px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -60px 0 0 -60px;
        }
    </style>
@endsection
