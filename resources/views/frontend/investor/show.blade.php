@extends('frontend.layouts.template')

@section('content')

    {{--<div class="row page-title text-center">--}}
    {{--<h2>Заявка інвестора. Ідентифікаційний номер: {{ $investor->id }}</h2>--}}
    {{--</div>--}}


    <div class="container-fluid">
        <div class="row text-center">
            <h1>{{ $investor->name }}</h1>
        </div>
        <hr/>
    </div>

    <div class="container">
        <div class="row">
            <div class="description">
                {!! $investor->description !!}
            </div>
        </div>
        <div class="btn-toolbar">
            @if(Auth::check())
                @if(Auth::user()->can('edit', $investor) && $investor->status_id != \App\Models\Status::PUBLISHED)
                    <div class="btn-group pull-left">
                        <a href="{{ route('investor.edit', ['id'=>$investor->id]) }}"
                           class="btn-primary btn">Оновити</a>
                    </div>
                    <div class="btn-group pull-left">
                        <a href="{{ route('investor.delete', ['id'=>$investor->id]) }}"
                           onclick="return confirm('Вы точно хотите удалить проэкт?')"
                           class="btn-danger btn">Видалити</a>
                    </div>
                @endif
                @if(Auth::user()->can('offer', $investor))
                    <div class="btn-group pull-right">
                        <a href="#" id="offer-project" data-toggle="modal" data-target="#myModal"
                           class="btn btn-primary"> <span><i class="fa fa-check"></i> Запропонувати проект</span>
                        </a>
                    </div>
                @endif
            @endif
        </div>

        <div class="row">

            <div class="col-md-10">
                <hr/>
                <label> Дата подачи заявки</label>
                <div class="clearfix"></div>
                {{ $investor->created_at->format("d.m.Y") }}
                <hr/>
            </div>
            <div class="col-md-10">
                <label> Сумма инвестирования</label>
                <div class="clearfix"></div>
                {{ $investor->money_count }}$
                <hr/>
            </div>
            <div class="col-md-10">
                <label>Отрасль</label>
                <div class="clearfix"></div>
                @if(!$investor->economicActivities->gotParent())
                    {{ $investor->economicActivities->name }}
                @else
                    {{ $investor->economicActivities->getParent()->name }}: <div class="clearfix"></div>  <span style="margin-left: 20px">{{ $investor->economicActivities->name }}</span>
                    @endif
                <hr/>
            </div>
            <div class="col-md-10">
                <label> Страна</label>
                <div class="clearfix"></div>
                {{ $investor->country->name }}
                <hr/>
            </div>
            @if(isset($investor->city))
            <div class="col-md-10">
                <label> Область инвестирования</label>
                <div class="clearfix"></div>
                {{ $investor->city->name }}
                <hr/>
            </div>
            @endif
            <div class="col-md-10">
                <label> Період реалізації інвестиційного проекту</label>
                <div class="clearfix"></div>
                {{ $investor->duration_project }}
                <hr/>
            </div>
            <div class="col-md-10">
                <label> Термін повернення вкладених коштів</label>
                <div class="clearfix"></div>
                {{ $investor->term_refund }}
                <hr/>
            </div>
            <div class="col-md-10">
                <label> Планована рентабельність проекту</label>
                <div class="clearfix"></div>
                {{ $investor->plan_rent }} %
                <hr/>
            </div>
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

//        $("#owl-demo").owlCarousel({
//            autoPlay: 3000, //Set AutoPlay to 3 seconds
//
//            items: 1,
//            itemsDesktop: [1199, 3],
//            itemsDesktopSmall: [979, 3]
//
//        });

        });
    </script>
@stop
