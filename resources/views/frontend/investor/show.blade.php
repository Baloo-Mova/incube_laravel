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
                    url: '{{ url('/create/offer') }}',
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
