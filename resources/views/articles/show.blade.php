@extends('app')

@section('content')

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
    @stop