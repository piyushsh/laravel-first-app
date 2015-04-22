@extends('app')

@section('content')

    <div class="container">
        <h1>{{$portfolio->title}}</h1>
        <p>{{$portfolio->description}}</p>
        <div class="row">
            <div class="col-xs-12">

            </div>
        </div>

        @if(Auth::check())
            <p><a href="{{url('portfolio/'.$portfolio->id.'/edit')}}">Edit</a></p>
        @endif
    </div>

@stop