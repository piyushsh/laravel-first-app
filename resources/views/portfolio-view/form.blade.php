<div class="row">
    <div class="col-xs-12 col-lg-6">
        <div class="form-group">
            {!! Form::label('title','Title: ') !!}
            {!! Form::text('title',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description: ') !!}
            {!! Form::textarea('description',null, ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="col-xs-12 col-lg-6">

        <div class="form-group">
            {!! Form::label('portfolio_url','URL: ') !!}
            {!! Form::text('portfolio_url',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image','URL: ') !!}
            {!! Form::input('file','image',null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('deployed_date','Deployed Date: ') !!}
            {!! Form::input('date','deployed_date',date('Y-m-d'), ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('published_at','Published At: ') !!}
            {!! Form::input('date','published_at',date('Y-m-d'), ['class'=>'form-control']) !!}
        </div>

    </div>
</div>
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class'=>'btn btn-primary form-control']) !!}
</div>