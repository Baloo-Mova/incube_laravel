@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Заявка на вирішення питання(проблеми). Ідентифікаційний номер: {{ $problem->id }}</h2>
        </div>

        <hr/>

        <h2 class="text-center">{{ $problem->name}} </h2>

        <div class="row">
            <div class="col-md-8">
                <div>
                    <img class="img-responsive preview-image"
                         src="{{ route('images.show', ['id'=> (empty($problem->logo)? 'empty' : $problem->logo),'height'=>'max','width'=>'max']) }}"
                         alt="">
                </div>
                @if(Auth::check() && Auth::user()->can('edit', $problem))
                    <div class="btn-toolbar">
                        <hr/>
                        <div class="btn-group pull-left">
                            <a href="{{ route('problem.edit', ['id'=>$problem->id]) }}"
                               class="btn-primary btn">Оновити</a>
                            <a href="{{ route('problem.delete', ['id'=>$problem->id]) }}"
                               onclick="return confirm('Ви впевнені, що хочете видалити цю проблему?')"
                               class="btn-danger btn">Видалити</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr/>
                    </div>
                @endif

                <div class="description">
                    <h4 class="text-center">Опис питання</h4>
                    {!!$problem->description!!}
                </div>
            </div>
            <div class="col-md-4" id="col">
                <div class="panel panel-primary affix-top" id="fix-div">
                    <div class="text-center">
                        <h4 class="title-border">Галузь</h4>
                        @if(!$problem->economicActivities->isChildren())
                            <p>{{ $problem->economicActivities->name }}</p>
                        @else
                            <p>{{ $problem->economicActivities->parent->name }}:</p>
                            <div class="clearfix"></div>
                            <span style="margin-left: 20px">{{ $problem->economicActivities->name }}</span>
                        @endif
                    </div>
                    <input type="hidden" value="{{ $problem->id }}" id="id">
                    <div class="text-center">
                        <h4 class="title-border">Країна</h4>
                        <p>{{ $problem->country->name }}</p>
                    </div>
                    @if(isset($problem->city))
                        <div class="text-center">
                            <h4 class="title-border">Регіон</h4>
                            <p>{{ $problem->city->name }}</p>
                        </div>
                    @endif
                    @if(Auth::check() && Auth::user()->can('offer', $problem))
                        <div class="text-center">
                            <a href="#" class="btn btn-primary"> <span><i class="fa fa-dollar"></i> Інвестувати </span>
                            </a>
                        </div>
                        <br>
                        <div class="text-center">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#designer_modal">
                                <span><i class="fa fa-user"></i> Запропонувати проект</span>
                            </a>
                        </div>
                        <br>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::check() && Auth::user()->can('edit', $problem))
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
                    @forelse($problem->offers as $item)
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
        @if(Auth::check() && Auth::user()->can('offer', $problem))
            <div id="designer_modal" class="modal fade" role="dialog">
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

                            <table class="table table-hover offerProjects" id="designer-offer">
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
            <div id="designer_modal" class="modal fade" role="dialog">
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

                            <table class="table table-hover offerProjects" id="designer-offer">
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
                                        <td colspan="2" class="text-center"> У вас немае опублiкованих проэктiв</td>
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
        @endif
    </div>
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
                            var info = $('#designer_modal .information');
                            info.text(response.text);
                            info.removeClass('alert-success').removeClass('alert-danger');
                            info.addClass('alert-' + response.status);
                            info.show();
                            $('#overlay').hide();
                        }
                    })
                }
            });

            $('#designer_modal').on('hidden.bs.modal', function () {
                $.each($('.information'),function(val,item){
                     $(item).hide();
                });
            })
        });
    </script>
@endsection