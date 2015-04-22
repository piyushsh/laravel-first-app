@extends('app')

@section('content')
<div class="container">
    <h1>{{$article->title}}</h1>
    <p>{{$article->body}}</p>

    @if(!$article->tags->isEmpty())
    <h1>Tags</h1>
    <ul>
        @foreach($article->tags as $tag)
            <li>{{$tag->name}}</li>
        @endforeach
    </ul>
    @endif

    @if(Auth::check())

        <p><a href="{{action('ArticlesController@edit',[$article->id])}}">Edit</a></p>

    @endif
</div>

@stop