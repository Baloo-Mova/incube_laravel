@extends('frontend.layouts.template')

@section('content')
    <div class="container">
        <div class="row page-title text-center">
            <h2>Резюме. Ідентифікаційний номер: {{ $executor->id }}</h2>
        </div>
        <div class="row">
            <div class="col-md-12 toppad">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{$executor->second_name." ".$executor->first_name." ".$executor->last_name}}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center">
                                <img alt="User Pic"
                                     src="{{ route('images.show', ['id'=> (empty($executor->logo)? 'empty' : $executor->logo),'height'=>'max','width'=>'max']) }}"
                                     class="img-responsive">
                                <p>
                                    Дата створення
                                </p>
                                <p class=" text-info">{{ $executor->created_at }} </p>
                            </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>День народження</td>
                                        <td>{{$executor->date_birth }}</td>
                                    </tr>
                                    <tr>
                                        <td>Досвід роботи</td>
                                        <td>{!!$executor->experience!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Освіта</td>
                                        <td>{!!$executor->education!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Практики та стажування</td>
                                        <td> {!!$executor->internship!!} </td>
                                    </tr>
                                    <tr>
                                        <td>Участь у проектах</td>
                                        <td>{!! $executor->participation_projects!!}</td>
                                    </tr>
                                    <tr>
                                        <td>Здібності та уміння</td>
                                        <td>{!! $executor->description !!}</td>
                                    </tr>
                                    <tr style="display:none">
                                        <td>Контактні дані(адреса, телефон,ел.пошта)</td>
                                        <td>{!!$executor->contacts!!}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        @if(Auth::check() && Auth::user()->can('offer', $executor))
                            <a data-original-title="Надіслати повідомлення" data-toggle="tooltip"
                               class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i> Надіслати
                                повідомлення</a>
                        @endif
                        @if(Auth::check() && Auth::user()->can('edit', $executor))
                            <div class="btn-group pull-right">
                                <a href="{{route('executor.edit',['executor'=>$executor->id])}}"
                                   class="btn-primary btn">Редагувати</a>
                                <a href="{{ route('executor.delete', ['id'=>$executor->id]) }}" class="btn-danger btn"
                                   onclick="return confirm('Ви впевнені, що хочете видалити це резюме?')">Видалити</a>
                            </div>
                            <div class="clearfix"></div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style>
        .panel {
            padding: 0;
        }
    </style>
@endsection