@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Проект. Ідентифікаційний номер: {{ $designer->id }}</h2>
        </div>

        <h2 class="text-center">{{ $designer->name}} </h2>
        <div class="row all-questions">
            <div class="col-md-8">
                <div class="text-center owl-carousel owl-theme" id="owl-demo">
                    @foreach($files as $item)
                        <img class="img-responsive"
                             src="{{ route('images.show', ['id'=> $item,'height'=>'max','width'=>'max']) }}"
                             alt="">
                    @endforeach
                </div>
                @if(Auth::check() && Auth::user()->can('edit', $designer))
                    <hr/>
                    <div class="btn-toolbar">
                        <div class="btn-group">
                            <a href="{{ route('designer.edit', ['id'=>$designer->id]) }}"
                               class="btn btn-primary ">Оновити</a>
                            <a href="{{ route('designer.delete', ['id'=>$designer->id]) }}"
                               onclick="return confirm('Вы точно бажаєте видалити цей проект?')"
                               class="btn btn-danger">Видалити</a>
                        </div>
                    </div>
                    <hr/>
                @endif
                <div class="product-info">
                    <div class="tab-pane fade in active" id="service-one">
                        <section class="product-info">

                            <label>Мета проекту</label>
                            <p>  {!! $designer->idea !!}</p>

                            <label>Дійсна ситуація</label>
                            <p> {!! $designer->current_situation !!}</p>

                            <label>Етап проекту</span></label>
                            <p>  {{$designer->stage->name }}</p>

                            <label>Стислий опис проекту</label>
                            <p> {!! $designer->description !!}</p>

                            <label>Проблема чи можливість</label>
                            <p> {!! $designer->problem !!}</p>

                            <label>Рішення(продукт чи послуга)</label>
                            <p> {!! $designer->solution !!}</p>

                            <label>Конкуренція</label>
                            <p>  {!! $designer->competition !!}</p>

                            <label>Іноваційні аспекти та переваги проекту</label>
                            <p>  {!! $designer->benefits !!}</p>

                            <label>Фінансова частина / Бізнес-модель</label>
                            <p>  {!! $designer->buisness_model !!}</p>

                            <label>Цільове призначення інвестицій</label>
                            <p>   {!! $designer->money_target !!}</p>

                            <label>Пропозиції інвестору</label>
                            <p>   {!! $designer->investor_interest !!}</p>

                            <label>Опис ризиків</label>
                            <p>   {!! $designer->risks !!}</p>

                            {{--<label>Контактні дані</label>
                            <p>   {!! $designer->contacts !!}</p>--}}
                            <div>
                                <label>Веб-сайт</label>
                                <p><a href="#">{{ $designer->site }}</a></p>
                            </div>
                            <div>
                                <label>YouTube посилання</label>
                                <p><a href="#">{{ $designer->youtube_link }}</a></p>
                            </div>
                            <label>Інше</label>
                            {!! $designer->other !!}

                        </section>
                    </div>
                </div>
            </div>

            <div class="col-md-4" id="col">
                <div class="panel panel-primary affix-top" id="fix-div">
                    <div class="text-center">
                        <label class="title-border">Галузь</label>
                        @if(!$designer->economicActivities->isChildren())
                            <p>{{ $designer->economicActivities->name }}</p>
                        @else
                            <p><b>{{ $designer->economicActivities->parent->name }}</b>:
                                <span style="margin-left: 20px">{{ $designer->economicActivities->name }}</span>
                            </p>
                        @endif

                        <label class="title-border">Країна</label>
                        <p>{{ $designer->country->name }}</p>
                        <input type="hidden" value="{{ $designer->id }}" id="id">
                        @if(isset($designer->city))
                            <label class="title-border">Регіон</label>
                            <p>{{ $designer->city->name }}</p>
                        @endif

                        @if(isset($designer->money))
                            <label class="title-border">Вартість проекту</label>
                            <p><?= number_format($designer["money"], 0, '.', ' ') ?> $ </p>
                        @endif

                        @if(Auth::check() && Auth::user()->can('offer', $designer))
                            <div class="text-center">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#investor_modal">
                                    <span><i class="fa fa-dollar"></i> Інвестувати </span>
                                </a>
                            </div>
                            <br>
                            <div class="text-center">
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#executor_modal">
                                    <span><i class="fa fa-user"></i> Запропонувати резюме</span>
                                </a>
                            </div>
                            <br>
                        @endif
                    </div>
                </div>
            </div>
            </div>
            @if(Auth::check() && Auth::user()->can('edit', $designer))
                <div class="row">
                    <h2 class="text-center">Пропозицiї</h2>
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
                        @forelse($designer->offers as $item)
                            <tr>
                                <td class="text-center">
                                    {{$item->id}}
                                </td>
                                <td class="text-center">
                                    {{ $item->form_type_id == 5 ? $item->second_name." ".$item->first_name." ".$item->last_name : $item->name }}
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
                                    <a href="{{route('delete.offer',['rec'=>$item->id, 'send'=>$designer->id])}}" title="receiver_table_id"
                                       aria-label="Receiver_table_id{{$item->id}}-{{$designer->id}}"
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
            @endif
            @if(Auth::check() && Auth::user()->can('offer', $designer))
                <div id="investor_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div id="investor_overlay">
                                <img class="spinner" src="{{ asset('img/spinner.gif') }}">
                            </div>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="row-fluid user-row">
                                    <img src="{{url('/img/'.'logo.png')}}" class="img-responsive" alt="log">
                                </div>
                                <h4 class="modal-title text-center title-border">Оберіть свою інвестиційну заявку</h4>
                            </div>
                            <div class="modal-body">
                                <h2 class="text-center">
                                    Ваші інвестиційні заявки
                                </h2>
                                <div class="information alert" style="display: none"></div>

                                <table class="table table-hover offerProjects" id="investor-offer">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse(Auth::user()->getAllInvestor() as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center"> У вас немае опублiкованих інвестиційних заявок</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('investor.create') }}" class="btn btn-success pull-left">Новий проект</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="executor_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div id="executor_overlay">
                                <img class="spinner" src="{{ asset('img/spinner.gif') }}">
                            </div>
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="row-fluid user-row">
                                    <img src="{{url('/img/'.'logo.png')}}" class="img-responsive" alt="log">
                                </div>
                                <h4 class="modal-title text-center title-border">Оберіть своє резюме</h4>
                            </div>
                            <div class="modal-body">
                                <h2 class="text-center">
                                    Ваше резюме
                                </h2>
                                <div class="information alert" style="display: none"></div>

                                <table class="table table-hover offerProjects" id="executor-offer">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse(Auth::user()->getAllExecutor() as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->second_name." ".$item->first_name." ".$item->last_name }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center"> У вас немае опублiкованих резюме</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('executor.create') }}" class="btn btn-success pull-left">Нове резюме</a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрити</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
@stop
@section('js')
    <script>
        $(document).ready(function () {

            $("#owl-demo").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds

                items: 1,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]

            });

            $('#investor-offer tbody tr').on('click', function () {
                var td = $(this).find('td');
                var id = td[0].innerText;
                var name = td[1].innerText;
                if (confirm("Ви впевнені, що хочете подати наступний проект - \"" + name + "\" ?")) {
                    $("#investor_overlay").show();
                    $.ajax({
                        url: '{{ route('create.offer') }}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'receiver_id': $('#id').val(),
                            'sender_id': id,
                        },
                        success: function (response, code) {
                            var info = $('#investor_modal .information');
                            info.text(response.text);
                            info.removeClass('alert-success').removeClass('alert-danger');
                            info.addClass('alert-' + response.status);
                            info.show();
                            $('#investor_overlay').hide();
                        }
                    })
                }
            });

            $('#investor_modal').on('hidden.bs.modal', function () {
                $.each($('.information'),function(val,item){
                    $(item).hide();
                });
            })
            //Executor
            $('#executor-offer tbody tr').on('click', function () {
                var td = $(this).find('td');
                var id = td[0].innerText;
                var name = td[1].innerText;
                if (confirm("Ви впевнені, що хочете подати наступне резюме - \"" + name + "\" ?")) {
                    $("#executor_overlay").show();
                    $.ajax({
                        url: '{{ route('create.offer') }}',
                        method: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'receiver_id': $('#id').val(),
                            'sender_id': id,
                        },
                        success: function (response, code) {
                            var info = $('#executor_modal .information');
                            info.text(response.text);
                            info.removeClass('alert-success').removeClass('alert-danger');
                            info.addClass('alert-' + response.status);
                            info.show();
                            $('#executor_overlay').hide();
                        }
                    })
                }
            });

            $('#executor_modal').on('hidden.bs.modal', function () {
                $.each($('.information'),function(val,item){
                    $(item).hide();
                });
            })

        });
    </script>
@stop
