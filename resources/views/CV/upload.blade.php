@extends('app')

@section('content')

    <div class="container">
        <h1>Upload your CV</h1>
        <ul>
        @foreach($errors as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
        {!! Form::open(['url'=>'cv', 'enctype'=> 'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('cv','CV File:') !!}
            {!! Form::input('file','cv',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Upload CV', ['class'=>'btn btn-primary form-control']) !!}
        </div>


        {!! Form::close() !!}
    </div>
@stop