@extends('app')

@section('content')

    <div class="col-xs-12 col-lg-6 col-lg-offset-5">
        <div class="container">
            <h2>Contact Piyush</h2>
            <p>I am currently employed fulltime and therefor can't help you with programming problems. I highly recommend visitng StackOverflow for all your programming related questions, even for questions about funnelweb or websync.</p>
            <p>I do take on a few small subcontracting jobs, but can afford to be quite selective considering I'm already employed fulltime. I will only take on jobs that are particularly relevant to my hobbies (ie: fun for me) and/or when I can trade some computer work for bicycle parts, camping stuff or other toys.</p>

            <h3>Leave a message for Piyush</h3>
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
                {!! Form::submit('Contact Piyush', ['class'=>'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop