@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Заявка інвестора. Ідентифікаційний номер: {{ $investor->id }}</h2>
        </div>

        <div class="project-viewer-content">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <h3 class="text-center" style="color: #00aeef">{{ $investor["investor_name"]}}</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Галузь</div>
                    <div class="panel-body text-center">{{ ($investor->economicActivities->getParent() != null ? $investor->economicActivities->getParent()->name : '')."\n". $investor->economicActivities->name }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Регіон інвестування</div>
                    <div class="panel-body text-center">{{ $investor->region }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Етап проекту</div>
                    <div class="panel-body text-center">
                        {!! $investor->stage_project !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Планова рентабельність проекту</div>
                    <div class="panel-body text-center">{!! $investor->plan_rent !!}
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Період реалізації інвестиційного проекту</div>
                    <div class="panel-body text-center">{!!$investor->duration_project!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Сума, яку готові інвестувати</div>
                    <div class="panel-body text-center">
                        <?= number_format($investor["investor_cost"], 0, '.', ' ') ?> $
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-primary one-row-pannel">
                    <div class="panel-heading text-center">Термін повернення вкладених коштів</div>
                    <div class="panel-body text-center">{!! $investor->term_refund !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="btn-toolbar">
            @if(Auth::check() && Auth::user()->id == $investor->author_id)
                @if($investor->status == 0)
                    <div class="btn-group pull-lef">
                        <a href="{{ route('investor.edit', ['id'=>$investor->id]) }}" class="btn-primary btn">Оновити</a>
                    </div>
                    <div class="btn-group pull-lef">
                        <a href="{{ route('investor.delete', ['id'=>$investor->id]) }}" onclick="return confirm('Вы точно хотите удалить проэкт?')" class="btn-danger btn">Видалити</a>
                    </div>
                @endif
            @else
                <div class="btn-group pull-right">
                    <a href="#" id="offer-project" data-toggle="modal" data-target="#myModal" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Запропонувати проект</span>
                    </a>
                </div>
            @endif
        </div>
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
                    <h4 class="modal-title">Выберите проэкт на рассмотрение</h4>
                </div>
                <div class="modal-body">
                   <table>
                       <thead>
                            <tr>
                                <th colspan="2">Вашы проэкты</th>
                            </tr>
                       </thead>
                       @forelse($avaibleProjects as $item)
                           @empty
                           <tr>
                               <td colspan="2"> У вас нет ни одного опубликованного проэкта,вы можете подать проэкт воспользовавшись кнопкой ниже</td>
                           </tr>
                       @endforelse
                   </table>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('designer.create') }}" class="btn btn-success pull-left">Подать проэкт</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </div>

        </div>
    </div>

@stop
