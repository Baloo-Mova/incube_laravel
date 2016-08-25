@extends('frontend.layouts.template')

@section('content')
    <div class="col-md-12 text-center">
        <h1> {{ $exception->getMessage() }} </h1>
    </div>
@stop