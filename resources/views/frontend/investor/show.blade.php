@extends('frontend.layouts.template')

@section('content')

    {{--<div class="row page-title text-center">--}}
    {{--<h2>Заявка інвестора. Ідентифікаційний номер: {{ $investor->id }}</h2>--}}
    {{--</div>--}}


    <div class="container-fluid">
        <div class="row">
            <div class="head-show-info">
                <div class="col-md-6">
                    <img class="img-responsive"
                         src="{{ route('images.show',['name'=>'investor', 'id'=>$investor->logo, 'width'=>'max', 'height'=>'max']) }}"
                         alt="{{ $investor->short_name }}">
                </div>
                <div class="col-md-6">
                            <h2>{{ $investor["investor_name"]}}</h2>
                            <p> {{ $investor->other}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <img class="img-responsive"
                         src=""
                         alt="">

                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="text-center">
                        <h4 class="title-border">Галузь</h4>
                        <p>{{ $investor->economicActivities->name }}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="title-border">Регіон інвестування</h4>
                        <p>{{ $investor->region }}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="title-border">Період реалізації інвестиційного проекту</h4>
                        <p>{!!$investor->duration_project!!}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="title-border">Термін повернення вкладених коштів</h4>
                        <p>{!! $investor->term_refund !!}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="title-border">Етап проекту</h4>
                        <p>{!!$investor->stage_project!!}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="title-border">Планова рентабельність проекту</h4>
                        <p>{!!$investor->plan_rent!!}</p>
                    </div>
                    <div class="text-center">
                        <h4 class="title-border">Сума, яку готові інвестувати</h4>
                        <p> <?= number_format($investor["investor_cost"], 0, '.', ' ') ?> $ </p>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class="btn-toolbar">
                    @if(Auth::check() && Auth::user()->id == $investor->author_id)
                        @if($investor->status_id != 6)
                            <div class="btn-group pull-left">
                                <a href="{{ route('investor.edit', ['id'=>$investor->id]) }}" class="btn-primary btn">Оновити</a>
                            </div>
                            <div class="btn-group pull-left">
                                <a href="{{ route('investor.delete', ['id'=>$investor->id]) }}"
                                   onclick="return confirm('Вы точно хотите удалить проэкт?')" class="btn-danger btn">Видалити</a>
                            </div>
                        @endif
                    @else
                        <div class="btn-group pull-right">
                            <a href="#" id="offer-project" data-toggle="modal" data-target="#myModal"
                               class="btn btn-primary"> <span><i class="fa fa-check"></i> Запропонувати проект</span>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <hr/>
        <div class="product-info">
            <div class="tab-pane fade in active" id="service-one">
                <section class="product-info">
                    <h4>Інше</h4>
                    <blockquote>
                        <p><em> {!! $investor["other"] !!}</em></p>
                    </blockquote>
                </section>
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
                        @forelse($avaibleProjects as $item)
                        @empty
                            <tr>
                                <td colspan="2"> У вас не має поданих проектів. Для подачі нового проекту скористайтеся
                                    кнопкою "Подати проект".
                                </td>
                            </tr>
                        @endforelse
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
