@extends('app')

@section('content')

    <div class="container">
        <h1>Write a New Article</h1>

        <hr>

        {!! Form::model($article = new \App\Article, ['url'=>'articles', 'files' => 'true']) !!}
            @include('articles.form', ['submitButtonText'=> 'Add Article'])

        {!! Form::close() !!}

        @include('errors.list')
    </div>

    @stop
