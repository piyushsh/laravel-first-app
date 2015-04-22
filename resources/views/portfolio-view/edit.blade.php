@extends('app')

@section('content')

    <div class="container">
        {!! Form::model($portfolio, [ 'method' => 'PATCH', 'action' => ['PortfolioController@update', $portfolio->id]] ) !!}
        @include('errors.portfolio-list')
        @include('portfolio-view.form', ['submitButtonText'=>'Update Portfolio'])
        {!! Form::close() !!}
    </div>

@stop