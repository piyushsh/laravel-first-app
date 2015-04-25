@extends('app')

@section('content')
<div class="container">
    <h1>{{$article->title}}</h1>
    <img src="{{asset($article->image_url)}}" class="blog_image img-responsive">
    <p>{{$article->body}}</p>

    @if(!$article->tags->isEmpty())
    <!--h1>Tags</h1>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
    </ul-->
    @endif



    @if(Auth::check())

        <p><a href="{{action('ArticlesController@edit',[$article->id])}}">Edit</a> <a href="{{url('articles/delete/'.$article->id)}}">Delete</a></p>

    @endif

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['url' => 'comment']) !!}
    {!! Form::hidden('article_id',$article->id) !!}
    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comment','Comment:') !!}
        {!! Form::textarea('comment',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Submit Comment',['class'=>'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}



    <hr>
    @foreach($article->comments as $comment)
        <div>
            <p>{{$comment->name}}<br>{{$comment->comment}}<br>{{$comment->email}}</p>
        </div>
        <hr>
    @endforeach
</div>

@stop