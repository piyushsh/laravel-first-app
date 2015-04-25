@extends('app')

@section('content')

    <div class="container">
        {!! Form::open(['url'=>'portfolio', 'files' => 'true']) !!}
        @include('errors.portfolio-list')

        @include('portfolio-view.form', ['submitButtonText'=>'Add Portfolio'])
        {!! Form::close() !!}
    </div>

@stop