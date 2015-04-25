@extends('app')

@section('content')

    <div class="container">
        <h1>{{$portfolio->title}}</h1>
        <a href="{{$portfolio->portfolio_url}}" target="_blank">
            <img src="{{asset($portfolio->image_url)}}" class="portfolio_image img-responsive">
        </a>
        <p>{{$portfolio->description}}</p>

        @if(Auth::check())
            <p><a href="{{url('portfolio/'.$portfolio->id.'/edit')}}">Edit</a> <a href="{{url('portfolio/'.$portfolio->id.'/delete')}}">Delete</a></p>
        @endif
    </div>

@stop