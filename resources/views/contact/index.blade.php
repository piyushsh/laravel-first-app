@extends('app')

@section('content')
    <div class="row">

        <div class="col-xs-12 col-lg-6 col-lg-offset-5">
            <div class="container">
                <h2>Contact Piyush</h2>
                <p>I am pursuing Masters' Degree in Computer Science from University College Cork, Ireland. </p>
                <p>I'll be interested in small subcontracting jobs, but can afford to be quite selective considering I'm acquired with my college work as well.</p>

                <h3>Leave a message for me!</h3>
                {!! Form::open(['url'=> 'contact']) !!}
                @include('errors.list')
                <div class="row">

                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            {!! Form::label('name','Name: ') !!}
                            {!! Form::text('name',null, ['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email','Email: ') !!}
                            {!! Form::text('email',null, ['class'=>'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-xs-12 col-lg-6">
                        <div class="form-group">
                            {!! Form::label('contact','Contact: ') !!}
                            {!! Form::text('contact',null, ['class'=>'form-control']) !!}
                        </div>

                    </div>

                    <div class="col-xs-12">
                        <div class="form-group">
                            {!! Form::label('query','Query: ') !!}
                            {!! Form::textarea('query',null, ['class'=>'form-control']) !!}
                        </div>
                    </div>


                </div>
                <div class="form-group">
                    {!! Form::submit('Contact me!', ['class'=>'btn btn-primary form-control']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop